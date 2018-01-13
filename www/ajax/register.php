<?php 
session_start();

require_once(__DIR__ . '/../../php/init.php');

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['rpassword'])) {
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
        $_SESSION['error'] = ['from' => 'register', 'message' => 'Bad email'];
        header('Location: ../index.php?p=register');
        die();
    }
    if ($_POST['password'] != $_POST['rpassword']) {
        $_SESSION['error'] = ['from' => 'register', 'message' => 'Bad repeat password'];
        header('Location: ../index.php?p=register');
        die();
    }
    $user_exist = $UserManager->getByEmail($_POST['email']);
    if ($user_exist->id != "") {
        $_SESSION['error'] = ['from' => 'register', 'message' => 'You already have an account'];
        header('Location: ../index.php?p=register');
        die();
    }

    $user = new User;
    $user->email = $_POST['email'];
    $user->password = hash('sha512', $_POST['password']);
    $user->role = 1;

    $id = $UserManager->add($user);

    if ($id > 0)
        $_SESSION['register'] = ['from' => 'register', 'message' => 'Thanks for your registration! ' . strval($user_exist->id)];
    else
        $_SESSION['error'] = ['from' => 'register', 'message' => 'Problem for add you in database, re-try or contact an administrator'];
    header('Location: ../index.php?p=register');
    die();
}
header('Location: ../index.php?p=register');
die();

?> 