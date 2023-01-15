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

  if (isset($_POST['usersubmit'])) {
    // code...
    $name = mysqli_real_escape_string($con, $_POST['username']);
    $doj = mysqli_real_escape_string($con, $_POST['userdoj']);
    $fname = mysqli_real_escape_string($con, $_POST['userfname']);
    $email = mysqli_real_escape_string($con, $_POST['useremail']);
    $mobile = mysqli_real_escape_string($con, $_POST['usermobile']);
    $password = mysqli_real_escape_string($con, $_POST['userpassword']);
    $cpassword = mysqli_real_escape_string($con, $_POST['usercpassword']);
    $address = mysqli_real_escape_string($con, $_POST['useraddress']);
    $idcard = mysqli_real_escape_string($con, $_POST['useridcard']);
    
    // $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

    $emailquery = " select * from users where email='$email' ";
    $query = mysqli_query($con,$emailquery);

    $emailcount = mysqli_num_rows($query);

    if ($emailcount>0) {
      // code...
      ?>
        <script>
            alert("User Email Already Exiset");
        </script>
        <?php
    }else{
      if ($password === $cpassword) {
        // code...
         $insertquery = "insert into users(name, doj, fname, email, mobile, password, cpassword, address, idcard) values('$name', '$doj', '$fname', '$email', '$mobile', '$password', '$cpass', '$address', '$idcard')";

         $iquery = mysqli_query($con, $insertquery);

         if($iquery){
        ?>
        <script>
            alert("Inserted Sucessfuly");
        </script>
        <?php
    }else{
        ?>
        <script>
            alert("Inserted Not Sucessfuly");
        </script>
        <?php
    }


      }else{
        ?>
        <script>
            alert("Password Not Match");
        </script>
        <?php
      }
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
      <h1>Add User's</h1>
    </div>
    <div class="dummy-text-2">
      <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="dummy-text-3">
          <input class="input-field" type="text" name="username" placeholder="Full Name Of User.*"/>
          <label class="input-field" style="border: none;">Date Of Joining</label>
          <input class="input-field" type="date" name="userdoj"/>
        </div>

        <div class="dummy-text-3">
          <input class="input-field" type="text" name="userfname" placeholder="Father's Name*"/>
          <input class="input-field" type="email" name="useremail" placeholder="Enter Email Id*"/>
          <input class="input-field" type="tel" name="usermobile" placeholder="Mobile Number*"/>
        </div>

        <div class="dummy-text-3">
          <input class="input-field" type="text" name="userpassword" placeholder="Password*"/>
          <input class="input-field" type="text" name="usercpassword" placeholder="Conform Password*"/>
        </div>
        
        <div class="dummy-text-3">
          <input class="input-field" type="text" name="useraddress" placeholder="Address*"/>
          <input class="input-field" type="text" name="useridcard" placeholder="Id Proof If Any Adhar/Voter*"/>
         
        </div>

        
        <input class="input-btn" type="submit" name="usersubmit" value="Submit"/>
      </form>

    </div>
  </div>

</body>
</html>
