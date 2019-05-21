 <?php
        session_start();
        
        if (!isset($_SESSION['id'])) {
            header('Location: /');
        }
        
        $message = "Error";
        
       if (isset($_POST)) {
            
            if (isset($_POST['email'], $_POST['password'])) {
                include_once('functions.php');
            
                if (login($_POST['email'], $_POST['password'])) {
                    $message = true;
                    //"login";
                } else {
                    $message = false;
                    //"no login";
                }
            }
        }
   if ($message == true) {
    echo $message;
    }else
    {
        echo "Serverfehler bei der Anmeldung";
    } 


?>