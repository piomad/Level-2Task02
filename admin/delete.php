<?php
require "../vendor/autoload.php";

$userId = $_POST['id'];

$userRepository = new \Acme\Users();
$userRepository->deleteUser($userId);
header('Location: adminarea.php');



