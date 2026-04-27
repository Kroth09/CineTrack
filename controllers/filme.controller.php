<?php
 $pdo = Database::getConnection();

// 1. Pegar ID

$id = $_GET['id'] ?? null;

// 2. Validação simples se o id existe
if(!$id) {
    http_response_code(404);
    view('404');
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM filmes WHERE id = ?");
$stmt->execute([$id]);

$filme = $stmt->fetch();

if(!$filme) {
    http_response_code(404);
    view('404');
    exit();
}

 view('filme', ['filme' => $filme]);