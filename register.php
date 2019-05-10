
    <?php
    require_once('database.php');

    switch ($_POST['gender']) {
        case 1:
            $_POST["gender"]="Herr ";
            break;
        case 2:
            $_POST["gender"]="Frau ";
            break;
        case 3:
            $_POST["gender"]="Sonstiges ";
            break;
        default:
            $_POST["gender"]="ERROR Vallah ";
            break;
    }


    $sql = "INSERT INTO user (email, password) VALUES ('" . $_POST['email'] . "', '" . password_hash($_POST['password'], PASSWORD_DEFAULT) . "')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    
    echo 'Willkommen '.'<b>'.$_POST["gender"].'</b>'.'<b>'.$_POST["firstname"].' '.'</b>'.'<b>'.$_POST["lastname"].'</b>'.'<br>';
    echo 'Wir haben eine Bestätigungs Mail an: '.'<b>'.$_POST["email"].'</b>'.' gesendet. <br>';
    echo ' <br>';

    if($_POST["comment"]!="" && $_POST["comment"]!=" "){
    echo 'Der folgende <b>Kommentar</b> von Ihnen wird natürlich <b>Berücksichtigt</b>: <br>';
    echo '"'.$_POST["comment"].'"';
    }

    file_put_contents('test.text', $_POST, FILE_APPEND | LOCK_EX);
