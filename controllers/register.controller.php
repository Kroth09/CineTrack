<?php
require __DIR__ . "/../Validacao.php";

$pdo = Database::getConnection();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $erros = Validacao::validar([
        'nome' => ['required'],
        'email' => ['required', 'email'],
        'senha' => ['required', 'min:6'],
    ], $_POST);

    $nome = ucfirst(trim($_POST['nome']));
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);

    if($stmt->fetch()){
        $erros['email'][] = 'Email já cadastrado';
    }

    if(!empty($erros)){
        $_SESSION['errors'] = $erros;
        $_SESSION['old'] = $_POST;
        header('Location: /register');
        exit();
    }

    $senhaHash = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
    $stmt->execute([$nome, $email, $senhaHash]);

    $user = [
        'nome' => $nome,
        'email' => $email,
    ];

    $_SESSION['user'] = $user;


    header("Location: /home");
    exit();
}

view('register');