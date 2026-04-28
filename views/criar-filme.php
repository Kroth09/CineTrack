<h1 class="text-2xl font-bold mb-6">Adicionar Filme</h1>

<form method="post" enctype="multipart/form-data" class="space-y-4 max-w-md">

    <input name="titulo" placeholder="Título" class="w-full p-2 rounded bg-zinc-800">

    <input name="diretor" placeholder="Diretor" class="w-full p-2 rounded bg-zinc-800">

    <select name="ano" class="w-full p-2 rounded bg-zinc-800">
        <?php for ($i = date('Y'); $i >= 1800; $i--): ?>
            <option value="<?= $i ?>"><?= $i ?></option>
        <?php endfor;?>
    </select>

    <input type="file" name="imagem" placeholder="Imagem" class="w-full p-2 rounded bg-zinc-800">

    <textarea name="descricao" placeholder="Descrição" class="w-full p-2 rounded bg-zinc-800"></textarea>

    <button class="bg-green-600 px-4 py-2 rounded">
        Salvar
    </button>
</form>