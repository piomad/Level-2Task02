<?php
session_start();

if (isset($_SESSION['adminAuthId'])) {
    session_destroy();
    header('Location: login.php');
}