<?php
$pdo = Database::getConnection();

$search = $_GET['search'] ?? '';

if($search){
    $stmt = $pdo->prepare("
    select * from filmes
    where titulo like ?");
    $termo = "%$search%";
    $stmt->execute([$termo]);
} else{
    $stmt = $pdo->query("select * from filmes");
}

//$stmt = $pdo->query("SELECT * FROM filmes");
$filmes = $stmt->fetchAll();

//dd($filmes);

view('home', ['filmes' => $filmes]);