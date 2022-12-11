<!--Name:Daxil Patel-->
<!--Student ID:200520270-->

<?php
// using session start to show the login page first to view the view page
session_start();
if(!isset($_SESSION['ID'])){
    header('Location:signin.php');
    exit();
}
else {
//    including database
    require "database.php";
    $customerObj = new database();


// adding delete to delete the record that were inserted
    if (isset($_GET['deletedID']) && !empty($_GET['deletedID'])) {
        $deletedID = $_GET['deletedID'];
        $customerObj->deleteRecord($deletedID);

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
  <?php
  require('header.php');
  ?>
<div class="container mt-3">
    <h2>Registration Details</h2>
    <?php
    // adding msg statement to give infromation about the update,inserted and deleted data.

    if (isset($_GET['msg2']) == "update") {
        echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>X</button>
              Your Registration updated successfully
            </div>";
    }
    if (isset($_GET['msg3']) == "delete") {
        echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>X</button>
              Record deleted successfully
            </div>";
    }

    ?>
<!--using table to arrange the information properly-->
    <table class="table">
        <thead>
        <tr>

            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Telephone</th>
            <th>Passwrd</th>
            <th>Edit/Remove Data</th>



        </tr>
        </thead>
        <tbody>

        <?php
        $customers = $customerObj->displayData();
        foreach ($customers as $customer) {
        ?>
<!--                using displaydata to display the entered data -->
        <tr>

            <td><?php echo $customer['FirstName']; ?></td>
            <td><?php echo $customer['LastName']; ?></td>
            <td><?php echo $customer['Email']; ?></td>
            <td><?php echo $customer['Telephone']; ?></td>
            <td><?php echo $customer['Passwrd']; ?></td>

            <td> <div class="col-md-2">
                    <a href="update.php?updateID=<?php echo $customer['ID'];?>">
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"></a>
                </div>

                <div class="col-md-2">
                    <a href="view.php?deletedID=<?php echo $customer['ID'];?>">
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Remove"></a>
                </div></td>
        </tr>
        <?php
      }
?>
        </tbody>
    </table>
    <button type="button" class="btn btn-primary"><a href="logout.php" style="color: #41250b;
    text-decoration: none;">Log Out</a></button>
</div>
<?php require'footer.php'?>
</body>
</html>
<?php
        }

?>
<!--end of file-->
