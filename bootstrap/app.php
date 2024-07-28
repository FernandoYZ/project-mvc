<?php

use Core\Router;
use Core\Database;
use Core\Middleware;
use Core\ExceptionHandler;
use Dotenv\Dotenv;

// Cargar autoload y archivos de configuración
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../core/Autoload.php';
require_once __DIR__ . '/../app/helpers.php';

// Cargar variables de entorno
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Cargar configuración
$config = require_once __DIR__ . '/../config/app.php';
$dbConfig = require_once __DIR__ . '/../config/database.php';

// Configuración global
$GLOBALS['config'] = array_merge($config, ['database' => $dbConfig]);

// Inicializar base de datos
$database = new Database($GLOBALS['config']['database']);

// Inicializar enrutador
$router = new Router($database);

// Registrar middleware
Middleware::register('auth', App\Http\Middleware\Authenticate::class);
Middleware::register('guest', App\Http\Middleware\Guest::class);

// Registrar manejador de excepciones
$exceptionHandler = new ExceptionHandler();
$router->setExceptionHandler($exceptionHandler);

// Cargar rutas
require_once __DIR__ . '/../routes/web.php';
require_once __DIR__ . '/../routes/auth.php';

// Inicializar la aplicación
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
