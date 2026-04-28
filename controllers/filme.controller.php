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

$usuarioID = $_SESSION['user']['id'] ?? null;

$jaAdicionado = false;

if(!$filme) {
    http_response_code(404);
    view('404');
    exit();
}

if($usuarioID) {
    $stmt = $pdo->prepare("
    SELECT id FROM usuarios_filmes
    WHERE usuario_id = ? and filme_id = ?");

    $stmt->execute([$usuarioID, $id]);
    $jaAdicionado = (bool) $stmt->fetch();

}


$stmt = $pdo->prepare("
    SELECT AVG(nota) as media, COUNT(nota) as total
    FROM usuarios_filmes
    WHERE filme_id = ? AND nota is NOT NULL");
$stmt->execute([$id]);
$avaliacao = $stmt->fetch();


$minhaAvaliacao = null;

if($usuarioID) {
    $stmt = $pdo->prepare("
        SELECT nota, comentario
        FROM usuarios_filmes
        WHERE usuario_id = ? and filme_id = ?");

    $stmt->execute([$usuarioID, $id]);
    $minhaAvaliacao = $stmt->fetch();
}

$stmt = $pdo->prepare("
    SELECT
        COALESCE(AVG(nota),0) as media,
        COUNT(nota) as total
    FROM usuarios_filmes
    WHERE filme_id = ?");

$stmt->execute([$id]);
$avaliacao = $stmt->fetch();

$stmt = $pdo->prepare("
    SELECT 
        uf.comentario,
        uf.nota,
        u.nome
    FROM usuarios_filmes uf
    JOIN usuarios u ON u.id = uf.usuario_id
    WHERE uf.filme_id = ?
    AND uf.comentario is NOT NULL
    ORDER BY uf.id DESC");

$stmt->execute([$id]);
$comentarios = $stmt->fetchAll();

 view('filme', ['filme' => $filme,
                     'jaAdicionado' => $jaAdicionado,
                     'avaliacao' => $avaliacao,
                     'minhaAvaliacao' => $minhaAvaliacao,
                     'comentarios' => $comentarios]);