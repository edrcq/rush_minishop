<?php 
session_start();

require_once(__DIR__ . '/../../php/init.php');

if (isset($_POST['email']) && isset($_POST['password'])) {
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
        $_SESSION['error'] = ['from' => 'login', 'message' => 'Bad email format'];
        header('Location: ../index.php?p=login');
        die();
    }
    
    $user = $UserManager->getByEmail($_POST['email']);
    if ($user->id === "") {
        $_SESSION['error'] = ['from' => 'register', 'message' => 'You don\'t have an account'];
        header('Location: ../index.php?p=login');
        die();
    }

    if ($user->password != hash('sha512', $_POST['password'])) {
        $_SESSION['error'] = ['from' => 'login', 'message' => 'Bad password'];
        header('Location: ../index.php?p=login');
        die();
    }

    $_SESSION['user'] = $user->id;
    $_SESSION['connected'] = true;
    $_SESSION['admin'] = false;

    if ($user->role > 1) {
        $_SESSION['admin'] = true;
    }

    header('Location: ../index.php?p=products');
    die();
}
header('Location: ../index.php?p=home');
die();

?> 