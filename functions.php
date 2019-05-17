<?php
function check($value, $minlenght, $maxlength, $name) {
    $value = escape($value);
    if (isset($value)) {
      if (strlen($value) >= $minlenght && strlen($value) <= $maxlength) {
        return array('valid' => true, 'message' => $name . ' Sucess');
      } else {
        return array('valid' => false, 'message' => $name . ': Mindestens '. $minlenght . ' und maximal ' . $maxlength . ' Zeichen! Eingegebene Zeichenlänge: ' . strlen($value) );
      }
    }
    return array('valid' => false, 'message' => $name . ': Keine Eingabe!');
  }

  function escape($value)
  {
    return trim(htmlspecialchars($value));
  }

function login($email, $password) {
  require_once('database.php');
  $conn = open();
  $stmt = $conn->prepare("SELECT * FROM user WHERE email = ? LIMIT 1;");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  // check if there is one result
  if($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    // asign id & password
    $id = $row['id'];
    $db_password = $row['password'];

    // check if password matches
    if (password_verify($password, $db_password)) {
      return true;
    }
  } else {
    die();
  }
  return false;
  
}