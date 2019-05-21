<?php
    session_start();
    if (!isset($_SESSION['id'])) {
        echo "<script>alert('Bitte anmelden!');document.location='login.html'</script>";
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>

    <p>Willkommen </p>
    
    <button class="btn btn-danger btn-logout" type="button" id="logout" href="login.html">Abmelden</button>

</body>

    <script src="dist/js/jquery-3.4.1.min.js"></script>
    <script src="dist/js/jquery.validate.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="js/sha512.min.js"></script>
    <script src="js/login.js"></script>

</html>