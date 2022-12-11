<!--Name:Daxil Patel-->
<!--Student ID:200520270-->

<?php
//including database file
include "database.php";
//using below method to send the data to database
$customerObj = new database();
if (isset($_POST['submit'])) {
$customerObj->insertData($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Final Project</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons -->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
<!--        including css file-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
<!--    including global header-->
    <?php require ('header.php'); ?>
    <section class="page-section cta">
        <?php  if (isset($_GET['msg5']) == "sameemail") {
        echo "<div class='alert alert-success alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert'>X</button>
            This Email is currently in use
        </div>";
        }
        ?>

    <div class="cta-inner bg-faded text-center rounded">
        <h2 class="section-heading mb-5">

            <span class="section-heading-upper">Cafe Coffee Day</span>
            <span class="section-heading-lower">REGISTRATION</span>
        </h2>
        <form class="form1" action="join.php"  method="post">



          <div class="form-floating">
            <!-- adding input for FirstName -->
            <input type="text" class="form-control" id="FirstName" name="FirstName" placeholder="Firstname" required="">
            <label for="FirstName">Firstname</label>
          </div>
          <div class="form-floating">
            <!-- adding input for LastName -->
            <input type="text" class="form-control" id="LastName" name="LastName" placeholder="Lastname" required="">
            <label for="LastName">Lastname</label>
          </div>
        <!-- adding input for Email -->
          <div class="form-floating">
            <input type="text" class="form-control" id="Email" name="Email" placeholder="name@example.com" required="">
            <label for="Email">Email</label>
          </div>
          <div class="form-floating">
              <!-- adding input for telephone -->
              <input type="tel" class="form-control" id="Telephone" name="Telephone"  placeholder="Telephone" required="">
              <label for="Telephone">Telephone Number</label>
          </div>
          <div class="form-floating">
            <!-- adding input for Password -->
            <input type="password" class="form-control" id="Passwrd" name="Passwrd"  placeholder="Password" required="">
            <label for="Passwrd">Password</label>
          </div>
          <div class="form-floating">
            <!-- adding input for confirm Password -->
            <input type="password" class="form-control" id="Confirmp" name="Confirmp"  placeholder="Confirm-Password" required="">
            <label for="Confirmp">Confirm Password</label>
          </div>

          <input class="w-100 btn btn-lg btn-primary" name="submit" value="submit" type="submit">

        <p class="address mb-5">
            <em>
                <strong>If you already have an account please click the below link</strong>
                <br />
                <a class="nav-link text-uppercase" href="signin.php">Login</a>
<!--                giving link for the signin page-->
            </em>
        </p>
        </form>
    </div>
  </section>



        <?php require ('./footer.php'); ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <script src="js/scripts.js"></script>
    </body>
</html>
<!--end of file-->
