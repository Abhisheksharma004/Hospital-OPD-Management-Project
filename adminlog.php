<?php 
  session_start();
 ?>


<!DOCTYPE html>
<!-- Jyoti Info Tech. Software & IT Solutions. -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Hospital OPD Project | Jyoti Info Tech. Software & IT Solutions.</title>
  <!-- <link rel="stylesheet" href="css/style.css"> -->
  <link rel="stylesheet" href="css/logpage.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
<?php

  include 'db_con.php';

  if (isset($_POST['adlog'])) {
    // code...
    $email =  $_POST['aduser'];
    $password = $_POST['adpassword'];

    $email_search = " select * from users where email='$email' ";
    $query = mysqli_query($con,$email_search);

    $email_count = mysqli_num_rows($query);
    if ($email_count) {
      // code...
      $email_pass = mysqli_fetch_assoc($query);

      $db_pass = $email_pass['cpassword'];


       $_SESSION['username'] = $email_pass['name'];
       $_SESSION['isAdmin'] = $email_pass['isAdmin'];

      $pass_decode = password_verify($password, $db_pass);

      if ($pass_decode) {
        // code...
        ?>
        <script>
            alert("Login Successful");
            location.replace("dashboard.php");
        </script>
        <?php
      }else{
        ?>
        <script>
            alert("Invalid Password Please Type Right Password");
        </script>
        <?php
      }
    }else{
      ?>
        <script>
            alert("Invalid Email Please Type Right Email Id");
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
      <div class="logo"><a href="#">Hospital OPD Project | Jyoti Info Tech.</a></div>
        <ul class="links">
          <li><a href="index.php">Home</a></li>
          <!-- <li>
            <a href="#" class="desktop-link">Features</a>
            <input type="checkbox" id="show-features">
            <label for="show-features">Features</label>
            <ul>
              <li><a href="#">Drop Menu 1</a></li>
              <li><a href="#">Drop Menu 2</a></li>
              <li><a href="#">Drop Menu 3</a></li>
              <li><a href="#">Drop Menu 4</a></li>
            </ul>
          </li> -->
          <li>
            <a href="adminlog.php" class="desktop-link">Login</a>
            <input type="checkbox" id="show-services">
            <label for="show-services">Services</label>
          </li>
          <li><a href="#">Feedback</a></li>
        </ul>
      </div>
    </nav>
  </div>

  <div class="dummy-text">
    <div class="dummy-text-1">
      <h1>LogIn</h1>
    </div>
    <div class="dummy-text-2">
      <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
        <input class="input-field" type="text" name="aduser" placeholder="Enter Email Id*" require/>
        <input class="input-field" type="password" name="adpassword" placeholder="Enter Password*" require/><br>
        <input class="input-btn" type="submit" name="adlog" value="LogIn"/>
      </form>

    </div>
  </div>

</body>
</html>
