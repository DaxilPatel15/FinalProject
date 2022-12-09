<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Final Project</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>




<?php

require 'database.php';
$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$Email = $_POST['Email'];
$Tel = $_POST['Telephone'];
$Passwrd = $_POST['Passwrd'];
$Confirmp = $_POST['Confirmp'];
$ok = true;
require 'header.php';
if(empty($FirstName)){
  echo'<p>First Name Required</p>';
  $ok = false;
}
if(empty($LastName)){
  echo'<p>Last Name Required</p>';
  $ok = false;
}
if(empty($Email)){
  echo'<p>Email Required</p>';
  $ok = false;
}
if(empty($Tel)){
  echo'<p>PhoneNumber Required</p>';
  $ok = false;
}
if((empty($Passwrd))|| ($Passwrd != $Confirmp)){
  echo'<p>Incorrect password</p>';
  $ok = false;
}

if($ok){
  $Passwrd = hash('sha512',$Passwrd);
  $sql = "insert into admins(FirstName,LastName,Email,Telephone,Passwrd) VALUES ( '$FirstName','$LastName','$Email','$Tel','$Passwrd')";
  $this->con->exec($sql);
  echo'<section class = "success-row">';
  echo'<div>';
  echo'<h3>Admin Saved</h3>';
  echo'</div>';
  echo'</section>';
  $con = null;
}

 ?>

 <section class = "row success-back-row" style="background-color: #F3F3F3">
   <div>
     <p>All done, Click the signin button to head towards sign in process</p>
     <a href="signin.php">Sign In</a>
   </div>

 </section>
<?php require 'footer.php'; ?>

</html>>