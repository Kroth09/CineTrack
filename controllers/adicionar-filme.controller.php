<?php
$pdo = Database::getConnection();

$usuarioID = $_SESSION['user']['id'];

$filmeID = $_POST['filme_id'];
//dd($filmeID);

$stmt = $pdo->prepare("
    SELECT id FROM usuarios_filmes
    WHERE usuario_id = ? AND filme_id = ?
    ");
$stmt->execute([$usuarioID, $filmeID]);

if(!$stmt->fetch()){
    $stmt = $pdo->prepare("
    INSERT INTO usuarios_filmes (usuario_id, filme_id)
    VALUES ( ?, ?)
    ");
    $stmt->execute([$usuarioID, $filmeID]);
}

header("Location: /meus-filmes");
exit();