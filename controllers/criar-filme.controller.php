<?php

$pdo = Database::getConnection();

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $diretor = $_POST['diretor'];
    $ano = $_POST['ano'];

    $imagem = null;

    if(isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0){

        $nomeOriginal = $_FILES['imagem']['name'];
        $extensao = pathinfo($nomeOriginal, PATHINFO_EXTENSION);

        //nome unico
        $novoNome = uniqid() . "." .$extensao;
        $caminho = __DIR__ . "/../public/images/filmes/" . $novoNome;
        move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho);
        $imagem = "public/images/filmes/" . $novoNome;
    }



    $stmt = $pdo->prepare("
    INSERT INTO filmes (titulo, descricao, diretor, ano, imagem)
    VALUES (?, ?, ?, ?, ?)");

    $stmt->execute([$titulo, $descricao, $diretor, $ano, $imagem]);

    header("location: /home");
    exit();
}

view('criar-filme');