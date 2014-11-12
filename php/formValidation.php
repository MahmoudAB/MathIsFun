<?php

function validate_form() {
    $warning = "";
	if ($_POST['fname'] === "") {
        $warning .= '<p>Empty field for "First name"</p>';
    }
	if ($_POST['lname'] === "") {
        $warning .= '<p>Empty field for "Last name"</p>';
    }
	if ($_POST['phone'] === "") {
        $warning .= '<p>Empty field for "Phone number"</p>';
    }
    if ($_POST['email'] === "") {
        $warning .= '<p>Empty field for "Email address"</p>';
    }
	if ($_POST['loginName'] === "") {
        $warning .= '<p>Empty field for "Login Name"</p>';
    }
    if ($_POST['passwrd1'] === "") {
        $warning .= '<p>Empty field for "Choose password"</p>';
    }
    if ($_POST['passwrd2'] === "") {
        $warning .= '<p>Empty field for "Confirm password"</p>';
    }
    if ($_POST['passwrd1'] !== $_POST['passwrd2']) {
        $warning .= '<p>Both passwords do not match</p>';
    }
    if (strlen($_POST['passwrd1']) < 8) {
        $warning .= '<p>Password must be at least 8 characters</p>';
    }
	if ($warning !== "") {
        echo $warning;
    } else {
       $f = "../db/users.txt";
		$fh = fopen($f, 'a') or die();
		$s = $_POST['loginName'].",".$_POST['passwrd'].",".$_POST['fname'].",".$_POST['lname'].",".$_POST['phone'].",".$_POST['email']."\n\n";
		fwrite($fh, $s);
		fclose($fh);
		header('Location: login.php?');
    }
}

?>
<!DOCTYPE html>
<html lang = "en">
<head>
 <link rel="stylesheet" href="../css/A3_1.css">
</head>
<body>
    <?php include 'header.php';?>
       <nav>
    <ul>
      <li><a href="../index.php">Home</a></li>
	  <li><a href="register.php">Register</a></li>
	  <li>Quiz Me
	    <ul>
	     <li><a href="addition.php">&raquo; Addition</a></li>
		 <li><a href="subtraction.php">&raquo; Subtraction</a></li>
		 <li><a href="multiplication.php">&raquo; Multiplication</a></li>
		 <li><a href="mix.php">&raquo; Mix</a></li>
	    </ul>
	  </li>
	  <li><a href="myStats.php">My stats</a></li>
	  <li><a href="contact.php">Contact us</a></li>
    </ul>
  </nav>
  <section>
            <?php
                validate_form();
            ?>
     </section>
  <?php include 'footer.php';?>
</body>
</html>
