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
    require "views/$view.php";
    $content = ob_get_clean();
    require "views/layouts/app.php";
}

function dd($d){
    echo '<pre style="background:#111; color:#fff; padding:12px; border-radius:6px;">';
    var_dump($d);
    echo '</pre>';
    die();
}

?>