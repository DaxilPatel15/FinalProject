<?php
require 'header.php';
session_start();
if(!isset($_SESSION['user_id'])){
  header('location:signin.php');
  exit();
}else{
  require'database.php';
  $sql = "Select * From php_users";
  $result = $conn->query($sql);
  echo'<section class="person-row">';
  echo'<table class = "table table-striped">
        <tr>
        <th>FirstName</th>
        <th>LastName</th>
        <th>Email</th>
        <th>PhoneNumber</th>
        </tr>';
        foreach ($result as $row) {
          echo '<tr>
            <td>' .$row['fname']. '</td>
            <td>' .$row['lname']. '</td>
            <td>' .$row['email']. '</td>
            <td>' .$row['telNumber']. '</td>
          </tr>';
          echo'<table>';
          echo '<a href="logout.php" class="btn btn-warning">Logout</a>';
          echo'</table>';
          $conn = null;
        }
  require 'footer.php';
}

 ?>
