<h1 class="text-2xl font-bold mb-6 mt-4">Perfil</h1>

<div class="space-y-4">
    <p>Bem vindo, <?= $_SESSION['user']['nome']?></p>

    <a href="/filmes/criar" class="bg-violet-600 px-4 py-2 rounded inline-block">
        Adicionar novo filme
    </a>
</div>