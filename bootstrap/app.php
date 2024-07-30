<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../core/Autoload.php';
require_once __DIR__ . '/../app/helpers.php';

use Core\Router;
use Core\Database;
use Core\Views;
use Core\ExceptionHandler;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$config = require_once __DIR__ . '/../config/app.php';
$dbConfig = require_once __DIR__ . '/../config/database.php';

$GLOBALS['config'] = array_merge($config, ['database' => $dbConfig]);

$databaseConfig = $GLOBALS['config']['database'];

$database = new Database($databaseConfig);
$views = new Views();
$router = new Router($database, $views);
$exceptionHandler = new ExceptionHandler();
$router->setExceptionHandler($exceptionHandler);

require_once __DIR__ . '/../routes/web.php';

$app = new App($GLOBALS['config'], $router, $database);
return $app;

class App {
    protected $config;
    protected $router;
    protected $database;

    public function __construct($config, $router, $database) {
        $this->config = $config;
        $this->router = $router;
        $this->database = $database;
    }

    public function handle($request) {
        $this->router->route($request);
    }
}
