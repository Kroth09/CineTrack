<?php
function dump($d)
{
    echo '<pre style="background:#111; color:#fff; padding:12px; border-radius:6px;">';
    var_dump($d);
    echo '</pre>';
}

function view($view, $data = [])
{
    extract($data);

    ob_start();
    require __DIR__ . "/views/{$view}.php";
    $content = ob_get_clean();
    require __DIR__ . "/views/layouts/app.php";
}

?>