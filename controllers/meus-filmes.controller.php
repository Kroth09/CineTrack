<?php

$pdo = Database::getConnection();

$usuarioID = $_SESSION['user']['id'] ?? null;

if( ! $usuarioID ) {
    header("Location: /login");
    exit();
}

$stmt = $pdo->prepare("
    SELECT filmes.*
    FROM filmes
    INNER JOIN usuarios_filmes uf 
        ON uf.filme_id = filmes.id
    WHERE uf.usuario_id = ?
");

$stmt->execute([$usuarioID]);

$filmes = $stmt->fetchAll();

view('/meus-filmes', ['filmes' => $filmes]);