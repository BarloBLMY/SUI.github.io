<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $lastnameErr = "";
$name = $email = $gender = $comment = $lastname = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $lastnameErr = " Last Name is required";
  } else {
    $lastname = test_input($_POST["website"]);
    // check if lastname only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {
      $lastnameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["comment"])) {
    $commentErr = "Comment is required";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

<span class="error">*<?php echo $nameErr;?> </span>
<span class="error">* <?php echo $lastnameErr;?></span>
<span class="error"><?php echo $emailErr;?></span>
<span class="error"><?php echo $commentErr;?></span>

?>
 <?php
 echo "<h2>Your Input:</h2>"
 echo $name;
 echo "<br>";
 echo $email;
 echo "<br>";
 echo $comment;
 echo "<br>";
 echo $gender;
 ?>