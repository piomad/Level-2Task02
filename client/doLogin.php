<?php
require '../vendor/autoload.php';
session_start();

$userRepository = new \Acme\Users();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $authId = $userRepository->loginAsUser($login, $password);


    if (is_null($authId)) {
        $_SESSION['errors'] = 'Login or password is invalid';
        header('Location: ..\index.php');
    } else {
        $_SESSION['userId'] = $authId;
        header('Location: home.php');
    }
}


