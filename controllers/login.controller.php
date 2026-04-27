<?php
$pdo = Database::getConnection();

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);

    $user = $stmt->fetch();

    if( $user && password_verify($senha, $user['senha'])){
        $_SESSION['user'] = $user;
        header('location: /home');
        exit();
    }

    echo "Login inválido";

}

view('login');