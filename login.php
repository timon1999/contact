<?php
session_start();

if (isset($_SESSION['id'])) {
    header('Location: /');
}

if ($_POST) {
    if (isset($_POST['email'], $_POST['password'])) {
        include_once('database.php');
        include_once('functions.php');
        $email = escape($_POST['email']);
        $query = 'SELECT id, password, email FROM user WHERE email = ' . $email . ';';
        if ($result = $conn->query($sql) === TRUE) {
            while ($row = $result->fetch_assoc()) {
                
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        die('Parameters missing'):
    }
}

?>