<?php
session_start();

if (isset($_SESSION['id'])) {
    header('Location: /');
}

$message = "";

if ($_POST) {
    if (isset($_POST['email'], $_POST['password'])) {
        include_once('functions.php');
        if (login($_POST['email'], $_POST['password'])) {
            $message = "login success";
        } else {
            $message "login invalid";
        }
    } else {
        die('Parameters missing');
    }
}


?>