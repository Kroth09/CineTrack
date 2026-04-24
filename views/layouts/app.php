<?php

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

<main class="mx-auto max-w-5xl text-white">
<!--    Carrega a parte do meu index-->
    <?= $content ?>



</main>
</html>
