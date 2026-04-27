<?php if(!empty($_SESSION['errors'])): ?>

    <div class="bg-red-500 text-wite p-2 rounded">
        <?php foreach($_SESSION['errors'] as $campo => $msgs): ?>
            <?php foreach ($msgs as $msg): ?>
                <div><?= $msg ?></div>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form method="post" action="/register" class="space-y-4 max-w-md mx-auto mt-10">
    <input name="nome" type="text" placeholder="Nome" class="w-full p-2 rounded bg-zinc-800 text-wite">
    <input name="email" type="email" placeholder="Email" class="w-full p-2 rounded bg-zinc-800 text-wite">
    <input name="senha" type="password" placeholder="Senha" class="w-full p-2 rounded bg-zinc-800 text-wite">
    <button type="submit" class="bg-violet-600 px-4 py-2 rounded">Registrar</button>
</form>

<?php unset($_SESSION['errors']); ?>