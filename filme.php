<?php

require 'dados.php';

//Buscando o id passado pelo index
$id = $_REQUEST["id"];

//Função que pega p ID e busca o filme nos meus dados
$filtrado = array_pop(array_filter($filmes, function ($f) use ($id) {
    return $f['id'] == $id;
}));

$filme = $filtrado;



//echo "<pre>";
//var_dump($filme);
//echo "</pre>";




?>




<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CineTrack</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-zinc-900">
<header class="bg-violet-500 text-white">
    <nav class="mx-auto max-w-6xl flex justify-between  py-2">

        <ul class="flex w-full justify-between items-center py-4">
            <div class="font-bold tracking-wide text-xl">CineTrack</div>
            <ul class="flex gap-6">
                <li><a href="/home" class="hover:underline">Explorar</a></li>
                <li><a href="/meus-filmes" class="hover:underline">Meus Filmes</a></li>
                <li><a href="/logout" class="hover:underline">(Usuario)</a></li>
            </ul>
        </ul>

    </nav>
</header>

<!--Filme-->

<main class="text-white mx-auto max-w-5xl space-y-5">

    <div class="mx-auto max-w-screen-lg space-y-6">Filme: <?= $filme['nome'] ?></div>

    <section class="grid-cols-1 md:grid-cols-2 grid gap-4">
        <?php require 'views/components/card.php'; ?>
    </section>
</main>


</body>
</html>