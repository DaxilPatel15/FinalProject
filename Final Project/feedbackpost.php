<!--Name:Daxil Patel-->
<!--Student ID:200520270-->

<?php
include "database.php";
//adding database to make connection
$customerObj = new database();
if (isset($_POST['post'])) {
$customerObj->insertfeedbackData($_POST);
}
//to insert data from th user
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
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
<!--    including global header-->
    <?php require ('header.php'); ?>
    <section class="page-section cta">

    <div class="cta-inner bg-faded text-center rounded">
        <h2 class="section-heading mb-5">


            <span class="section-heading-lower">FeedBack</span>
        </h2>
        <form class="form1" action="feedbackpost.php"  method="post">



          <div class="form-floating">
            <!-- adding input for FirstName -->
            <input type="text" class="form-control" id="fname" name="fname" placeholder="Add your name" required="">
            <label for="fname">Name</label>
          </div>
          <div class="form-floating">
            <!-- adding input for LastName -->
            <input type="text" class="form-control" id="rating" name="rating" placeholder="rate us" required="">
            <label for="rating">Rate Us</label>
          </div>
        <!-- adding input for Email -->
          <div class="form-floating">
            <input type="text" class="form-control" id="coment" name="coment" placeholder="add your comment" required="">
            <label for="coment">Add your Comment</label>
          </div>


          <input class="w-100 btn btn-lg btn-primary" name="post" value="post" type="submit">


        </form>
    </div>
  </section>

<!--including global footer -->
<?php require ('./footer.php'); ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>

<!--end of file-->
