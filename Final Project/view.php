<?php
// Include database file
include 'database.php';
$customerObj = new database();


// Delete record from table
if (isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];
    $customerObj->deleteRecord($deleteId);
}
?>


<?php
include ('header.php')
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Records</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
    <h2>Registration Details</h2>

    <table class="table table-dark table-hover">
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
        <tr>

            <td><?php echo $customer['FirstName'] ?></td>
            <td><?php echo $customer['LastName'] ?></td>
            <td><?php echo $customer['Email'] ?></td>
            <td><?php echo $customer['Telephone'] ?></td>
            <td><?php echo $customer['Passwrd'] ?></td>

            <td> <div class="col-md-2">
                    <a href="update.php?updateID=<?php echo $customer['ID'];?>">
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"></a>
                </div>

                <div class="col-md-2">
                    <a href="view.php?deletedID=<?php echo $customer['ID'];?>">
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Remove"></a>
                </div></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>
