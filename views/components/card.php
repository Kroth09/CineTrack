<?php

require 'dados.php'

?>

<div class="bg-zinc-800 p-4 rounded border-violet-700 border-2 gap-4">

    <div class="flex gap-4 ">
        <div class="w-1/3 bg-blue-900" >imagem</div>
        <div class="space-y-2">
            <a href="/filme.php?id=<?= $filme['id'] ?>" class="font-semibold hover:underline"><?= $filme['nome'] ?></a>
            <div class="text-xs italic"><?= $filme['autor'] ?></div>
            <div class="text-xs italic">⭐️⭐️⭐️⭐️⭐️ Avaliações</div>
        </div>

    </div>
    <div class="text-sm mt-4"><?= $filme['descricao']?></div>
</div>