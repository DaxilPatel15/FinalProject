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
<body>
<?php
if (isset($_GET['msg1']) == "insert") {
    echo "<div class='alert alert-success alert-dismissible'>
         <button type='button' class='close' data-dismiss='alert'>×</button>
         Your Registration added successfully
     </div>";
}
?>
<section class = "row success-back-row" style="background-color: #F3F3F3">

   <div>
     <p>All done, Click the signin button to head towards sign in process</p>
     <a href="signin.php">Sign In</a>
   </div>

 </section>
<?php require 'footer.php'; ?>
</body>>
</html>
