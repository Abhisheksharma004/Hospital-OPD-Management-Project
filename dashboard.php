<?php

  session_start();
  if (!isset($_SESSION['username'])) {
    // code...
    header('location:adminlog.php');
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Hospital OPD Project | Jyoti Info Tech. Software & IT Solutions.</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
  <div class="wrapper">
    <nav>
      <input type="checkbox" id="show-search">
      <input type="checkbox" id="show-menu">
      <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
      <div class="content">
      <div class="logo"><a href="#">Dashboard</a></div>
        <ul class="links">
          <li><a href="dashboard.php">Home</a></li>
          <li>
            <a href="#" class="desktop-link">Consultancy Pt.</a>
            <input type="checkbox" id="show-features">
            <label for="show-features">Features</label>
            <ul>
              <li><a href="addOPD.php">Add New OPD Pt.</a></li>
              <li><a href="addrenueopd.php">Add Renewal OPD Pt.</a></li>
              <li><a href="viewOPD.php">Viwe OPD Pt.</a></li>
              <li><a href="viewrenueopd.php">View Renewal OPD Pt.</a></li>
            </ul>
          </li>

          <li>
            <a href="#" class="desktop-link">Emargency Pt.</a>
            <input type="checkbox" id="show-features">
            <label for="show-features">Features</label>
            <ul>
              <li><a href="addEMG.php">Add Emg. Pt.</a></li>
              <li><a href="viewEMG.php">Viwe Emg. Pt.</a></li>
              <li><a href="adddischarge.php">Discharge Pt.</a></li>
              <li><a href="viewDischarge.php">View Discharge Pt.</a></li>
            </ul>
          </li>

          <li>
            <a href="#" class="desktop-link">OT. Pt.</a>
            <input type="checkbox" id="show-features">
            <label for="show-features">Features</label>
            <ul>
              <li><a href="#">Add OT. Pt.</a></li>
              <li><a href="#">Viwe OT. Pt.</a></li>
            </ul>
          </li>

          <li>
           
         <?php 
            if($_SESSION['isAdmin']){
              ?>
              <a href="#" class="desktop-link">Setting's</a>
              <?php
            }
          ?>
         

            <input type="checkbox" id="show-features">
            <label for="show-features">Features</label>
            <ul>
              <li><a href="addDoctor.php">Add Doctor</a></li>
              <li><a href="viewDoctor.php">Viwe Doctor</a></li>
              <li><a href="addStaff.php">Add Users</a></li>
              <li><a href="viewStaff.php">Viwe Users</a></li>
              <li><a href="others.php">Other</a></li>
            </ul>
          </li>
          <li><a href="adminlogout.php">Logout</a></li>
        </ul>
      </div>
      <label for="" class="someone-class">Some One There</label>
    </nav>
  </div>

  <div class="dummy-text">
  <?php 
            if($_SESSION['isAdmin']){
              ?>
                <h3 style="background-color: red; color: #fff;">Profile Of Admin</h3>
              <?php
            }else{
              ?>
              <h3 style="background-color: red; color: #fff;">Profile Of Users</h3>
            <?php
            }
          ?>
    <h1 style="background-color: green; color: #fff;"><?php
        echo $_SESSION['username'] ;
        ?>  
        
    </h1>


  <h2>WelCome To Hospital OPD Management System Project.</h2>
    <h2>By:-</h2>
    <h2>Jyoti Info Tech. Software & IT Solutions.</h2>
  </div>

</body>
</html>
