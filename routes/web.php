<?php

global $router;

$router->get('/', function () {
    return view('welcome');
});
