<?php

  session_start();

?>


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


  <?php

include 'db_con.php';

error_reporting(0);

$read = " SELECT * FROM `ademg` ORDER BY invoiceid DESC LIMIT 1";

$result = mysqli_query($con,$read);

if ($result) {
  // code...
    $fetch = mysqli_fetch_assoc($result);

    $lastrollno = $fetch['invoiceid'];

    if ($lastrollno == null) {
      // code...
        $newrollno = "JIT04EMG0000";
    }else{

      $newrollno = str_replace("JIT04EMG", "", $lastrollno);

      $newrollno = str_pad($newrollno+1,4,0,STR_PAD_LEFT);

      $newrollno = "JIT04EMG". $newrollno;
      // die();

    }

}else{

  ?>

          <script>
            alert("Server Down");
          </script>

        <?php

}

if (isset($_POST['emgsubmit'])) {
    // code...
    $invoiceid = mysqli_real_escape_string($con, $_POST['invoiceid']);
    $date = mysqli_real_escape_string($con, $_POST['emgdate']);
    $ptname = mysqli_real_escape_string($con, $_POST['emgname']);
    $prname = mysqli_real_escape_string($con, $_POST['emgpname']);
    $age = mysqli_real_escape_string($con, $_POST['emgage']);
    $address = mysqli_real_escape_string($con, $_POST['emgaddress']);
    $mobile = mysqli_real_escape_string($con, $_POST['emgcontact']);
    

    $insertquery = " insert into ademg( invoiceid, date, ptname, parname, age, address, contact) values('$invoiceid', '$date', '$ptname','$prname', '$age', '$address', '$mobile') ";

    $res = mysqli_query($con, $insertquery);
   
      if ($res) {
        // code...

        ?>

          <script>
            alert("EMG Add Sucessfuly");
            location.replace("viewEMG.php");
          </script>
          

        <?php
      }else{


          ?>

          <script>
            alert("Server Down");
          </script>

        <?php
      }

  }





?>






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
      <h1>Add Emg. Pt.</h1>
    </div>
    <div class="dummy-text-2">
      <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="dummy-text-3">
          <input class="input-field" type="text" value="<?php echo $newrollno; ?>" name="invoiceid" readonly/>
          <input class="input-field" type="text" value="<?php echo date('d/m/Y'); ?>" name="emgdate"/>
        </div>

        <div class="dummy-text-3">
          <input class="input-field" type="text" name="emgname" placeholder="Pt. Name*"/>
          <input class="input-field" type="text" name="emgpname" placeholder="Parient's Name*"/>
          <input class="input-field" type="text" name="emgage" placeholder="Age*"/>
        </div>

        <div class="dummy-text-3">
          <input class="input-field" type="text" name="emgaddress" placeholder="Address*"/>
          <input class="input-field" type="number" name="emgcontact" placeholder="Contact*"/>
        </div>

       <!--  <div class="dummy-text-3">
          <select class="input-field" name="" id="">
            <option class="input-field-opt" value="">Gender*</option>
            <option class="input-field-opt" value="">Male</option>
            <option class="input-field-opt" value="">Female</option>
            <option class="input-field-opt" value="">Transgender</option>
          </select>
        </div> -->
        <input class="input-btn" type="submit" name="emgsubmit" value="Save & Print"/>
      </form>

    </div>
  </div>

</body>
</html>
