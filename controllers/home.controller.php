<?php

require  __DIR__ . "/../database/Database.php";

$pdo = Database::getConnection();

$stmt = $pdo->query("SELECT * FROM filmes");
$filmes = $stmt->fetchAll();

view('home', ['filmes' => $filmes]);