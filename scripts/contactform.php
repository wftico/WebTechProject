<?php
// define variables and set to empty values
$nameErr = $emailErr = $topicErr = $msgErr = "";
$name = $email = $topic = $msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Sie müssen einen Namen eingeben.";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Es sind nur Leerzeichen und Buchstaben erlaubt."; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Sie müssen eine E-Mail angeben.";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Ihre E-Mail hat ein falsches Format."; 
    }
  }
    
  if (empty($_POST["topic"])) {
    $topicErr = "Sie müssen einen Betreff eingeben.";
  } else {
    $topic = test_input($_POST["topic"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$topic)) {
      $topicErr = "Es sind nur Leerzeichen und Buchstaben erlaubt."; 
    }
  }

  if (empty($_POST["message"])) {
    $msg = "";
  } else {
    $msg = test_input($_POST["message"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>