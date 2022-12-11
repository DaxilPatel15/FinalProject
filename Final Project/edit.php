<!--Name:Daxil Patel-->
<!--Student ID:200520270-->

<?php
//adding the database file
include "database.php";
$customerObj = new database();

session_start();
if(!isset($_SESSION['ID'])){
    header('Location:signin.php');
    exit();
}
else{
// adding if statement for update
if (isset($_GET['updatefeedbackID']) && !empty($_GET['updatefeedbackID'])) {
    $updatefeedbackID = $_GET['updatefeedbackID'];
    $customer = $customerObj->displayfeedbackRecordByID($updatefeedbackID);
}
if(isset($_POST['Update'])){
    $customerObj->updatefeedbackRecord($_POST);
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
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
<?php require ('header.php'); ?>
<section class="page-section cta">

    <div class="cta-inner bg-faded text-center rounded">
        <h2 class="section-heading mb-5">



        </h2>
        <form class="form1" action="edit.php" method="POST">



            <div class="form-floating">
                <!-- adding input for FirstName -->
                <input type="text" class="form-control" id="fname" name="ufname" value="<?php echo $customer['fname'] ?>" >
                <label for="fname">Name</label>
            </div>
            <div class="form-floating">
                <!-- adding input for LastName -->
                <input type="text" class="form-control" id="rating" name="urating" value="<?php echo $customer['rating'] ?>" required="please enter valid value" >
                <label for="rating">Rate Us</label>
            </div>
            <!-- adding input for Email -->
            <div class="form-floating">
                <input type="text" class="form-control" id="coment" name="ucoment" value="<?php echo $customer['coment'] ?>" >
                <label for="coment">Add your Comment</label>
            </div>

            <input type="hidden" name="fb_ID" value="<?php echo $customer['fb_ID']; ?>">
            <input class="w-100 btn btn-lg btn-primary" name="Update" value="Update" type="submit">

        </form>

    </div>
</section>
<section class="page-section cta-1">


</section>


<?php require ('./footer.php'); ?>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>
</html>
<?php
}
?>
