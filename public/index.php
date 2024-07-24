<?php 

require_once __DIR__ . '/../bootstrap/app.php';

$config = require_once __DIR__ . '/../config/app.php';

$app = new App($config);

$app -> handle($_SERVER['REQUEST_URI']);