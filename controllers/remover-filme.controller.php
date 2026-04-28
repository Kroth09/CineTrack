<?php

$pdo = Database::getConnection();

$usuarioID = $_SESSION['user']['id'];
$filmeID = $_POST['filme_id'];

$stmt = $pdo->prepare("
    DELETE FROM usuarios_filmes
    WHERE usuario_id = ? and filme_id = ?");

$stmt->execute([$usuarioID, $filmeID]);

header("Location: /meus-filmes");
exit();