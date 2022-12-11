
<!--Name:Daxil Patel-->
<!--Student ID:200520270-->

<?php
// adding database file to make connection

    require "database.php";
    $customerObj = new database();


// adding delete to delete the record that were inserted
    if (isset($_GET['deletefeedbackID']) && !empty($_GET['deletefeedbackID'])) {
        $deletefeedbackID = $_GET['deletefeedbackID'];
        $customerObj->deletefeedbackRecord($deletefeedbackID);

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




    <body class="text-center">
      <?php require('header.php');  ?>
<?php
      if (isset($_GET['msg3']) == "delete") {
          echo "<div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert'>×</button>
                Record deleted successfully
              </div>";

      }


      if (isset($_GET['msg4']) == "feedbackinsert") {
          echo "<div class='alert alert-success alert-dismissible'>
               <button type='button' class='close' data-dismiss='alert'>×</button>
               Your Feedback added successfully
           </div>";
      }

?>


<main>




<div class="container mt-5">

    <div class="row d-flex justify-content-center">

        <div class="col-md-7">

            <div class="card p-3 py-4">


                <?php
                $customers = $customerObj->displayfeedbackData();
                foreach ($customers as $customer) {
                    ?>
<!--                        using above statement to display the page content-->
                <div class="text-center mt-3">
<!--                    For name-->
                  <p hidden><?php echo $customer['fb_ID']; ?></p>

                    <h5 class="mt-2 mb-0"><?php echo $customer['fname']; ?></h5>
                    <span class="bg-secondary p-1 px-4 rounded text-white"> &#11088; <?php echo $customer['rating']; ?>/10</span>
<!--for user to enter the rating for feedback-->
                    <div class="px-4 mt-1">
<!--                        for user to add commnet on the feedback-->
                        <p class="fonts"><?php echo $customer['coment']; ?> </p>

                    </div>



                    <div class="buttons">
                             <!--giving link for edit page to update the comment-->
                        <button class="btn btn-outline-primary px-4"><a href="edit.php?updatefeedbackID=<?php echo $customer['fb_ID'];?>">Edit FeedBack</a></button>
                        <button class="btn btn-outline-primary px-4"><a href="feedback.php?deletefeedbackID=<?php echo $customer['fb_ID'];?>">Delete</a></button>
                        <!--including delete button to delete the comment-->
                    </div>


                </div>


                <?php
                }
                ?>

            </div>

        </div>

    </div>

</div>
<button type="button" class="btn btn-primary"><a href="feedbackpost.php" style="color: #41250b;
text-decoration: none;">Add Feedback</a></button>
<button type="button" class="btn btn-primary"><a href="logout.php" style="color: #41250b;
text-decoration: none;">Log Out</a></button>
</main>
      <?php require('footer.php');?>
</body>
</html>
<!--end of file-->

