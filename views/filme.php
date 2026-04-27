<div class="max-w-4xl mx-auto mt-10 bg-zinc-800 p-6 rounded border-2 border-violet-700">

    <div class="flex gap-6">

        <img
                src="/<?= $filme['imagem'] ?>"
                class="w-1/3 h-64 object-cover rounded"
        >

        <div class="space-y-4">
            <h1 class="text-2xl font-bold"><?= $filme['titulo'] ?></h1>

            <div class="text-sm text-gray-400">
                <?= $filme['autor'] ?>
            </div>

            <div class="text-yellow-400">
                ⭐️⭐️⭐️⭐️⭐️
            </div>

            <p class="text-sm leading-relaxed">
                <?= $filme['descricao'] ?>
            </p>
        </div>

    </div>

</div>

<form method="POST" action="/meus-filmes/adicionar">
    <input type="hidden" name="filme_id" value="<?= $filme['id'] ?>">
    <button class="bg-violet-600 pc-4 py-2 rounded">
        Adicionar aos meus filmes
    </button>
</form>

<a href="/home" class="inline-block mb-4 text-sm underline">Voltar</a>