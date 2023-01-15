<?php

  session_start();

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Admin Registration Form | Jyoti Info Tech. SoftWare & IT Solutions </title>
    <link rel="stylesheet" href="css/adminreg.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php

  include 'db_con.php';

  if (isset($_POST['submit'])) {
    // code...
    $name = mysqli_real_escape_string($con, $_POST['admname']);
    $email = mysqli_real_escape_string($con, $_POST['admemail']);
    $mobile = mysqli_real_escape_string($con, $_POST['admmobile']);
    $password = mysqli_real_escape_string($con, $_POST['admpass']);
    $cpassword = mysqli_real_escape_string($con, $_POST['admcpass']);
    $isAdmin = 1;
    
    // $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

    $emailquery = " select * from adminreg where email='$email' ";
    $query = mysqli_query($con,$emailquery);

    $emailcount = mysqli_num_rows($query);

    if ($emailcount>0) {
      // code...
      ?>
        <script>
            alert("Email Already Exiset");
        </script>
        <?php
    }else{
      if ($password === $cpassword) {
        // code...
         $insertquery = "insert into users(name, email, mobile, password, cpassword, isAdmin) values('$name', '$email', '$mobile', '$password', '$cpass', '$isAdmin')";

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


  <div class="container">
    <div class="title">Admin Registration</div>
    <div class="content">
      <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name of Admin & Hospital</span>
            <input type="text" placeholder="Enter your name" name="admname" required>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" placeholder="Enter your username" name="admusername" >
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" name="admemail" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your number" name="admmobile" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="text" placeholder="Enter your password" name="admpass" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="text" placeholder="Confirm your password" name="admcpass" required>
          </div>
        </div>
        <div class="button">
          <input type="submit" name="submit" value="Register">
        </div>
      </form>
    </div>
  </div>

</body>
</html>
