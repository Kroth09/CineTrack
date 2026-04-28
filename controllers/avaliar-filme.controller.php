<?php

$pdo = Database::getConnection();

$usuarioID = $_SESSION['user']['id'] ?? null;
$filmeID = $_POST['filme_id'] ?? null;
$nota = $_POST['nota'] ?? null;

$comentario = $_POST['comentario'] ?? null;

//atualiza a avaliacao

$stmt = $pdo->prepare("
    UPDATE usuarios_filmes
    SET nota = ?,comentario = ?
    WHERE usuario_id = ? AND filme_id = ?");

$stmt->execute([$nota, $comentario, $usuarioID, $filmeID]);

header("Location: /filme?id=$filmeID");
exit();