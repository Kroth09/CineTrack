<h1 class="text-xl font-bold mb-6">Meus Filmes</h1>

<?php if (empty($filmes)) : ?>
    <p class="text-gray-400">Você ainda não adicionou nenhum filme.</p>
<?php endif; ?>

<div class="grid grid-cols-2 gap-4">
    <?php foreach ($filmes as $filme) : ?>

    <?php endforeach; ?>
</div>
