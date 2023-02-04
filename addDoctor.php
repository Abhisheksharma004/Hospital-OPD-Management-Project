<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dropdown Menu with Search Box | CodingNepal</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/addOPD.css">

  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
  <div class="wrapper">
    <nav>
      <input type="checkbox" id="show-search">
      <input type="checkbox" id="show-menu">
      <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
      <div class="content">
      <div class="logo"><a href="#">Admin Dashboard</a></div>
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
          <li><a href="adminlogout.php">Logout</a></li>
          
        </ul>
      </div>
      <label for="" class="someone-class">Some One There</label>
    </nav>
  </div>

  <div class="dummy-text">
    <div class="dummy-text-1">
      <h1>Add Doctor</h1>
    </div>
    <div class="dummy-text-2">
      <form action="" method="POST">
        <div class="dummy-text-3">
          <input class="input-field" type="date" name="doj" placeholder="Date Of Joining" />
        </div>

        <div class="dummy-text-3">
          <input class="input-field" type="text" name="drname" placeholder="Dr. Name*"/>
          <input class="input-field" type="text" name="drsp" placeholder="Specialist*"/>
          <input class="input-field" type="text" name="degree" placeholder="Qualification*"/>
        </div>

        <div class="dummy-text-3">
          <input class="input-field" type="number" name="drfee" placeholder="fees"/>
          <input class="input-field" type="text" name="dradd" placeholder="Address*"/>
          <input class="input-field" type="number" name="drcon" placeholder="Contact*"/>
        </div>

        <div class="dummy-text-3">
        
        </div>

        
        <input class="input-btn" type="submit" name="adddr" value="Submit"/>
      </form>

    </div>
  </div>

</body>
</html>
<?php

  include 'db_con.php';

  if (isset($_POST['adddr'])) {
    // code...
    $doj = $_POST['doj'];
    $drname = $_POST['drname'];
    $drsp = $_POST['drsp'];
    $degree = $_POST['degree'];
    $drfee = $_POST['drfee'];
    $dradd = $_POST['dradd'];
    $drcon = $_POST['drcon'];

    $insertdeta = " insert into doctors(doj, drname, specialist, qualification, fees, address, contact) values('$doj', '$drname', '$drsp', '$degree', '$drfee','$dradd', '$drcon') ";

    $deta = mysqli_query($con, $insertdeta);

    if ($deta) {
      // code...
      ?>

        <script>
          alert("Add Doctor Success");
        </script>

      <?php
    }else{
      ?>

        <script>
          alert("Add Doctor Not Success");
        </script>

      <?php
    }

  }

?>