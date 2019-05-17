<?php
function check($value, $minlenght, $maxlength, $name) {
    $value = escape($value);
    if (isset($value)) {
      if (strlen($value) >= $minlenght && strlen($value) <= $maxlength) {
        return array('valid' => true, 'message' => $name . ' Sucess');
      } else {
        // TODO Ausgabe Fehlermeldung
        return array('valid' => false, 'message' => $name . ': Mindestens '. $minlenght . ' und maximal ' . $maxlength . ' Zeichen! Eingegebene Zeichenlänge: ' . strlen($value) );
      }
    }
    // TODO Ausgabe Fehlermeldung
    return array('valid' => false, 'message' => $name . ': Keine Eingabe!');
  }

  function escape($value)
  {
    // TODO Spezielle Zeichen Escapen > Script Injection verhindern
    return trim(htmlspecialchars($value));
  }
