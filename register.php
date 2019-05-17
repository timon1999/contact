
    <?php
    require_once('database.php');
    require_once('functions.php');
    $conn = open();

     //vorname validation serverseitig
     $check_firstname=check($_POST['firstname'], 1, 30, 'Vorname');
     if (!$check_firstname['valid']) {
       $error = $error . $check_firstname['message'] . '<br>';
     }

     //nachname validation serverseitig
    $check_lastname=check($_POST['lastname'], 1, 30, 'Nachname');
    if (!$check_lastname['valid']) {
      $error = $error . $check_lastname['message'] . '<br>';
    }

    //mail validation serverseitig
    $check_mail=check($_POST['email'], 1, 100, 'E-Mail');
    if (!$check_mail['valid']) {
      $error = $error . $check_mail['message'] . '<br>';
    }

    //passwort validation serverseitig
    $check_password=check($_POST['password'], 8, 30, 'Passwort');
    if (!$check_password['valid']) {
      $error = $error . $check_password['message'] . '<br>';
    }

    //passwort validation serverseitig
    $check_confirmpassword=check($_POST['passwordconfirmpassword'], 8, 30, 'Passwort');
    if (!$check_confirmpassword['valid']) {
      $error = $error . $check_confirmpassword['message'] . '<br>';
    }

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
            $_POST["gender"]="ERROR";
            break;
    }


    $sql = "INSERT INTO user (email, password) VALUES ('" . $_POST['email'] . "', '" . password_hash($_POST['password'], PASSWORD_DEFAULT) . "')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    
    

    file_put_contents('test.text', $_POST, FILE_APPEND | LOCK_EX);
