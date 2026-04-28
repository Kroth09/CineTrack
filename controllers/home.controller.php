<?php
$pdo = Database::getConnection();

$search = $_GET['search'] ?? '';

if($search){
    $stmt = $pdo->prepare("
    SELECT
        filmes.*,
        COALESCE(AVG(uf.nota), 0) as media,
        COUNT(uf.nota) as total
    FROM filmes
    LEFT JOIN usuarios_filmes uf
        ON uf.filme_id = filmes.id
    WHERE filmes.titulo LIKE?
    GROUP BY filmes.id");

    $termo = "%$search%";
    $stmt->execute([$termo]);

} else{
    $stmt = $pdo->query("
    SELECT
        filmes.*,
        COALESCE(AVG(uf.nota), 0) as media,
        COUNT(uf.nota) as total
    FROM filmes
    LEFT JOIN usuarios_filmes uf
        ON uf.filme_id = filmes.id
    GROUP BY filmes.id");
}

$filmes = $stmt->fetchAll();



view('home', ['filmes' => $filmes]);