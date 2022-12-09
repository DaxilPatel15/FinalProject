<?php
require 'database.php';
$Email = $_POST['email'];
$passwrd = hash('sha512',$_POST['password']);

$sql = "Select user_id from admins where Email = '$Email' AND passwrd = '$passwrd'";
$result = $this->con->query($sql);
$count = $result->rowCount();
if($count == 1){
  echo'<p>Your are succefully logged in</p>';
  foreach($result as $row){
    session_start();
    $_SESSION['user_id'] = $row['user_id'];
    Header('Location:display-person.php');
  }
}else {
  echo'<p>Some error occur while logging in</p>';
}
 ?>
