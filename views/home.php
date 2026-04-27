<main class="text-white mx-auto max-w-5xl space-y-5">
    <h1 class="mt-6 font-bold text-lg">Explorar</h1>
    <form class="w-full flex space-x-2">
        <input
            type="text"
            name="search"
            class="flex-1 bg-gray-100 text-gray-900 rounded-lg focus:outline-none px-2 py-1 text-sm"
            placeholder="Pesquisar...">
        <button type="submit">🔎</button>
    </form>

    <!--Filmes-->
    <section class="grid-cols-1 md:grid-cols-2 grid gap-4">
        <!--        Loop para exibir todos os Filmes-->
        <?php foreach ($filmes as $filme) : ?>
<!--        componente que carrega meus livros-->
            <?php require 'views/components/card.php'; ?>
        <?php endforeach;?>

    </section>

</main>
</body>