<?php
session_start();

if (isset($_SESSION['id'])) {
    header('Location: /');
}


if ($_POST) {
    if (isset($_POST['email'], $_POST['password'])) {
        include_once('functions.php');
        if (login($_POST['email'], $_POST['password'])) {
            echo 'login success';
        } else {
            echo 'login invalid';
        }
    } else {
        die('Parameters missing');
    }
}


?>