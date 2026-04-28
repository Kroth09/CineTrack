<div class="bg-zinc-800 p-4 rounded border-violet-700 border-2 gap-4">

    <div class="flex gap-4 ">
        <img src="/<?= $filme['imagem']?>" class="w-1/3 object-cover rounded">
        <div class="space-y-2">
            <a href="/filme?id=<?= $filme['id'] ?>" class="font-semibold hover:underline"><?= $filme['titulo'] ?></a>
            <div class="text-xs italic"><?= $filme['diretor'] ?></div>
            <div class="text-yellow-400 text-lg">
                <?= number_format($filme['media'], 1)?> ⭐️
                <span class="text-sm text-gray-400">
                (<?= $filme['total'] ?> avaliações)
                </span>
            </div>
        </div>
        <div class="text-sm mt-4"><?= $filme['descricao']?></div>
    </div>

</div>