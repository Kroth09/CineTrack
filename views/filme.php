<div class="max-w-4xl mx-auto mt-10">

    <div class="bg-zinc-800 p-6 rounded border-2 border-violet-700">
    <div class="flex gap-6">

        <img
                src="/<?= $filme['imagem'] ?>"
                class="w-1/3 h-64 object-cover rounded"
        >

        <div class="space-y-4">
            <h1 class="text-2xl font-bold"><?= $filme['titulo'] ?></h1>

            <div class="text-sm text-gray-400">
                <?= $filme['diretor'] ?>
            </div>

            <div class="text-yellow-400 text-lg">
                <?= number_format($avaliacao['media'], 1)?> ⭐️
                <span class="text-sm text-gray-400">
                (<?= $avaliacao['total'] ?> avaliações)
                </span>
            </div>

            <p class="text-sm leading-relaxed">
                <?= $filme['descricao'] ?>
            </p>
        </div>

    </div>
    </div>

<!--    comentarios-->
    <?php if(isset($_SESSION['user']) && $jaAdicionado): ?>

        <form method="post" action="/avaliar" class="mt-6 space-y-3">
            <input type="hidden" name="filme_id" value="<?= $filme['id'] ?>">

            <div>
                <label>Nota:</label>
                <select name="nota" class="ml-2 bg-zinc-800 border p-2 rounded">
                    <option value="1">1 ⭐️</option>
                    <option value="2">2 ⭐️</option>
                    <option value="3">3 ⭐️</option>
                    <option value="4">4 ⭐️</option>
                    <option value="5">5 ⭐️</option>
                </select>
            </div>

            <div>
                <textarea name="comentario"
                          placeholder="Comentário"
                          class="w-full p-2 rounded bg-zinc-800">
                </textarea>
            </div>

            <button type="submit" class="bg-green-600 px-4 py-2 rounded">
                Avaliar
            </button>

        </form>
    <?php endif; ?>

<!--    botão -->

    <?php if(isset($_SESSION['user'])): ?>
        <?php if($jaAdicionado): ?>
            <form method="post" action="/meus-filmes/remover">
                <input type="hidden" name="filme_id" value="<?= $filme['id'] ?>">
                <button class="bg-violet-600 px-4 py-2 rounded mt-4">
                    Remover dos meus filmes
                </button>
            </form>

        <?php else: ?>

            <form method="post" action="/meus-filmes/adicionar">
                <input type="hidden" name="filme_id" value="<?= $filme['id'] ?>">
                <button class="bg-violet-600 px-4 py-2 rounded mt-4">
                    Adicionar aos meus filmes
                </button>
            </form>
        <?php endif; ?>
    <?php endif; ?>

    <h2 class="text-xl font-bold mt-10 mb-4">Comentários</h2>
    <?php if(empty($comentarios)): ?>
        <p class="text-gray">Nenhum comentário ainda.</p>
    <?php else: ?>
        <div class="space-y-4">
            <?php foreach($comentarios as $c): ?>
                <div class="bg-zinc-800 p-4 rounded border border-zinc-700">
                    <div class="flex justify-between text-sm text-gray-400">
                        <span><?= $c['nome'] ?></span>
                        <span><?= $c['nota'] ?> ⭐️</span>
                    </div>

                    <p class="mt-2 text-sm">
                        <?= $c['comentario'] ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <a href="/home" class="inline-block mb-4 text-sm underline mt-6">Voltar</a>

</div>


