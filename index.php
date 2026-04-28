<?php
session_start();
require __DIR__ . '/database/Database.php';
require __DIR__ . '/functions.php';


$routes = [
    '' => 'home.controller',
    'home' => 'home.controller',
    'filme' => 'filme.controller',
    'perfil' => 'perfil.controller',
    'filmes/criar' => 'criar-filme.controller',

    'login' => 'login.controller',
    'logout' => 'logout.controller',
    'register' => 'register.controller',
    'meus-filmes' => 'meus-filmes.controller',
    'meus-filmes/adicionar' => 'adicionar-filme.controller',
    'meus-filmes/remover' => 'remover-filme.controller',
    'avaliar' => 'avaliar-filme.controller',
    ];
$uri = trim($_SERVER['PATH_INFO'] ?? '', '/');

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