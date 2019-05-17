<?php

/* check if email is already registered */

//connect to db using mysqli
require_once('database.php');
$conn = open();
if (!empty($_POST['email']))
{
    $email = $conn->real_escape_string($_POST['email']);
    $query = "SELECT id FROM user WHERE email = '{$email}' LIMIT 1;";
    $results = $conn->query($query);
    if($results->num_rows == 0)
    {
        echo "true";  
    }
    else
    {
        echo "false"; 
    }
}
else
{
    echo "false"; 
}

?>