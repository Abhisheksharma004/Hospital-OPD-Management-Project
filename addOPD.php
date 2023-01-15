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

$read = " SELECT * FROM `adopd` ORDER BY invoiceid DESC LIMIT 1";

$result = mysqli_query($con,$read);

if ($result) {
  // code...
    $fetch = mysqli_fetch_assoc($result);

    $lastrollno = $fetch['invoiceid'];

    if ($lastrollno == null) {
      // code...
        $newrollno = "JIT04OPD0000";
    }else{

      $newrollno = str_replace("JIT04OPD", "", $lastrollno);

      $newrollno = str_pad($newrollno+1,4,0,STR_PAD_LEFT);

      $newrollno = "JIT04OPD". $newrollno;
      // die();

    }

}else{

  ?>

          <script>
            alert("Server Down");
          </script>

        <?php

}

if (isset($_POST['opdsubmit'])) {
    // code...
    $invoiceid = mysqli_real_escape_string($con, $_POST['invoiceid']);
    $date = mysqli_real_escape_string($con, $_POST['opddate']);
    $time = mysqli_real_escape_string($con, $_POST['opdtime']);
    $ptname = mysqli_real_escape_string($con, $_POST['opdptname']);
    $prname = mysqli_real_escape_string($con, $_POST['opdprname']);
    $age = mysqli_real_escape_string($con, $_POST['opdage']);
    $bp = mysqli_real_escape_string($con, $_POST['opdbp']);
    $address = mysqli_real_escape_string($con, $_POST['opdaddress']);
    $mobile = mysqli_real_escape_string($con, $_POST['opdcontact']);
    $gender = mysqli_real_escape_string($con, $_POST['opdgender']);
    $doctor = mysqli_real_escape_string($con, $_POST['opddr']);
    $fees = mysqli_real_escape_string($con, $_POST['opdfee']);
    

    $insertquery = " insert into adopd(invoiceid, date, ptname, parname, age, bp, address, contact, gender, doctor, fees) values('$invoiceid', '$date', '$ptname','$prname', '$age', '$bp', '$address', '$mobile', '$gender', '$doctor', '$fees') ";

    $res = mysqli_query($con, $insertquery);
   
      if ($res) {
        // code...

        ?>

          <script>
            alert("OPD Add Sucessfuly");
          </script>
          <?php
            header('location:viewOPD.php');
          ?>

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
              <li><a href="#">Add Renewal OPD Pt.</a></li>
              <li><a href="viewOPD.php">Viwe OPD Pt.</a></li>
              <li><a href="#">View Renewal OPD Pt.</a></li>
            </ul>
          </li>

          <li>
            <a href="#" class="desktop-link">Emargency Pt.</a>
            <input type="checkbox" id="show-features">
            <label for="show-features">Features</label>
            <ul>
              <li><a href="addEMG.php">Add Emg. Pt.</a></li>
              <li><a href="viewEMG.php">Viwe Emg. Pt.</a></li>
              <li><a href="#">Discharge Pt.</a></li>
              <li><a href="#">View Discharge Pt.</a></li>
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
      <h1>Add OPD Pt.</h1>
    </div>
    <div class="dummy-text-2">
      <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="dummy-text-3">
          <input class="input-field" type="text" value="<?php echo $newrollno; ?>" name="invoiceid" readonly />
          <input class="input-field" type="text" value="<?php echo date('d/m/Y'); ?>" name="opddate"/>
        </div>

        <div class="dummy-text-3">
          <input class="input-field" type="text" name="opdptname" placeholder="Pt. Name*"/>
          <input class="input-field" type="text" name="opdprname" placeholder="Parient's Name*"/>
          <input class="input-field" type="text" name="opdage" placeholder="Age*"/>
        </div>

        <div class="dummy-text-3">
          <input class="input-field" type="text" name="opdbp" placeholder="Blood Preser*"/>
          <input class="input-field" type="text" name="opdaddress" placeholder="Address*"/>
          <input class="input-field" type="number" name="opdcontact" placeholder="Contact*"/>
        </div>

        <div class="dummy-text-3">
          <select class="input-field" name="opdgender" id="">
            <option class="input-field-opt" value="NA">Gender*</option>
            <option class="input-field-opt" value="MALE">Male</option>
            <option class="input-field-opt" value="FEMALE">Female</option>
            <option class="input-field-opt" value="TRANSGENDER">Transgender</option>
          </select>
          <select class="input-field" name="opddr" id="">
            <option class="input-field-opt" value="NA">Doctor's*</option>
            <?php

              $selectquery = " select * from doctors ";

              $query = mysqli_query($con, $selectquery);

              $nums = mysqli_num_rows($query);
              while ($res = mysqli_fetch_array($query)) {
                // code...
                  ?>

                  <option class="input-field-opt" value=" <?php echo $res['drname']; ?> "><?php echo $res['drname']; ?></option>

            <?php 
               
              }

            ?>
          </select>
          <select class="input-field" name="opdfee" id="">
            <option class="input-field-opt" value="NA">Fees*</option>
            <?php

              // include 'db_con.php';

              $selectquery = " select * from doctors ";

              $query = mysqli_query($con, $selectquery);

              $nums = mysqli_num_rows($query);
              while ($res = mysqli_fetch_array($query)) {
                // code...
                  ?>

                  <option class="input-field-opt" value=" <?php echo $res['fees']; ?> "><?php echo $res['fees']; ?></option>

            <?php 
               
              }

            ?>
          </select>
         
        </div>

        
        <input class="input-btn" type="submit" name="opdsubmit" value="Save & Print"/>
      </form>

    </div>
  </div>

</body>
</html>
