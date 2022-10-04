<?php
    include 'connection.php';
    session_start();

    if ($_SESSION['valid'] != true) {
        $_SESSION['message'] = "Please login";
        header("Location:login.php");
    }else{
        $_SESSION['message'] = "";
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include 'links.php';?>
    <title>DASHBOARD</title>
  </head>
  <body>
    <nav class="nav-bar">
      <div class="logo-container">
        <a href="https://federalpolyilaro.edu.ng"><img class="logo" src="https://federalpolyilaro.edu.ng/images/header-logo.png" alt="FPI logo" height="70px" width="180px"></a>
      </div>
      <ul class="main-nav">
          <li><a class="active" href="login.php">Login</a></li>
          <li><a href="register.php">Register</a></li>
          <li><a href="appointment.php">Appointment</a></li>
      </ul> 
    </nav>
    <main>
      <a href="booking.php"><button>Manage Appointments</button></a>
      
   
      <div class="main-text">
        <h2 class="hero-main">Registration records</h2>
      </div>
      <div class="table-container">
      <table class="table" border="1px">
      <thead class="">
        <tr>
          <!-- <th scope="col">#</th> -->
          <th scope="col">MATRIC NO</th>
          <th scope="col">SURNAME</th>
          <th scope="col">OTHER NAMES</th>
          <th scope="col">PHONE NO</th>
          <th scope="col">MAC ADDRESS</th>
          <th scope="col">REGISTATION-STATUS</th>
          <th scope="col">ENTRY-DATE</th>
          <th scope="col">OPERATIONS</th>
        </tr>
      </thead>
      <tbody>




        <!-- php code to read from database and display-->
        <?php 
          $sql= "SELECT * from `studentRecord`";
          $result = mysqli_query($con,$sql);
          
          if($result){
            while ($row=mysqli_fetch_assoc($result)) {
              $id=$row['id'];
              $matric=$row['matric'];
              $surname=$row['surname'];
              $other=$row['other'];
              $phone=$row['phone'];
              $mac=$row['mac'];
              $status=$row['status'];
              $date=$row['date'];
              
              //<th scope="row">'.$id.'</th>
              echo ' <tr>
              
              <td><b>'.$matric.'</b></td>
              <td><b>'.$surname.'</b></td>
              <td><b>'.$other.'</b></td>
              <td><b>'.$phone.'</b></td>
              <td><b>'.$mac.'</b></td>
              <td><b>'.$status.'</b></td>
              <td><b>'.$date.'</b></td>
              <td>
              <a href="update.php?updateid='.$id.'"" ><button>UPDATE</button></a>
              <a href="delete.php?deleteid='.$id.'" ><button>DELETE</button></a>
              <a href="done.php?doneid='.$id.'" ><button>DONE</button></a>
              </td>
            </tr>' ;   
            }
          }
        ?>
      </div>
    </main>
    
    <?php include 'scripts.php'; ?>
  </body>
</html>