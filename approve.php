<?php
  include 'connection.php';
  include 'access.php';

  $id=$_GET['approveid'];
  $status="Approved";
  $sql="UPDATE `appointment` SET `status` = '$status' WHERE `appointment`.`id`=$id";

    $result=mysqli_query($con,$sql);

    if ($result) {
      
      header('location:booking.php');
    } else {
      die(mysqli_error($con));
    }

?>