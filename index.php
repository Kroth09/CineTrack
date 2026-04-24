<?php
require 'dados.php';
require 'functions.php';


$routes = [
    '' => 'home.controller',
    'home' => 'home.controller',
];
$uri = $_SERVER['PATH_INFO'] ?? '/';

$pagina = trim($uri, '/');

if(array_key_exists($pagina, $routes)) {
    $route = $routes[$pagina];
    require "controllers/{$route}.php";
} else{
    http_response_code(404);
    view('404');
    exit();
}
?>