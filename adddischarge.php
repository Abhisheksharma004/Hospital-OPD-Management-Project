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

if (isset($_POST['dissubmit'])) {
    // code...
    $disinvoiceid = mysqli_real_escape_string($con, $_POST['disinvoice']);
    $disolddate = mysqli_real_escape_string($con, $_POST['disolddate']);
    $disptname = mysqli_real_escape_string($con, $_POST['disptname']);
    $disprname = mysqli_real_escape_string($con, $_POST['disprname']);
    $disage = mysqli_real_escape_string($con, $_POST['disage']);
    $dismobile = mysqli_real_escape_string($con, $_POST['discontact']);
    $disaddress = mysqli_real_escape_string($con, $_POST['disaddress']);
    $disdate = mysqli_real_escape_string($con, $_POST['disdate']);
    $discoment = mysqli_real_escape_string($con, $_POST['discoment']);
    $user = $_SESSION['username'] ;

    $insertquery = " insert into dischargetp(invoiceid, olddate, name, prname, age, contact, address, dischargedate, comment, user) values('$disinvoiceid', '$disolddate', '$disptname','$disprname', '$disage', '$dismobile', '$disaddress', '$disdate', '$discoment', '$user') ";

    $res = mysqli_query($con, $insertquery);
   
      if ($res) {
        // code...

        ?>

          <script>
            alert("Discharge Sucessfuly");
            location.replace("viewDischarge.php");
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
      <h1>Add Discharge Pt.</h1>
    </div>
    <div class="dummy-text-2">
      <form action="" method="post">
      <div class="dummy-text-3">
          <input class="input-field" type="text"  name="searchid" placeholder="Scan Or Type Pt. Id*" />
          <input class="input-btn" type="submit" name="search" value="Search"/> 
        </div>
      </form>
      <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">

      <?php
        
        if (isset($_POST['search'])) {
          $searchid = $_POST['searchid'];
          $serchquery = "SELECT * FROM ademg WHERE invoiceid='$searchid'";
          $queryrun = mysqli_query($con, $serchquery);
        
          if(mysqli_num_rows($queryrun) > 0){
            while($rows = mysqli_fetch_array($queryrun)){
              ?>

                  <div class="dummy-text-3">
                  <input class="input-field" type="text" value="<?php echo $rows['invoiceid']; ?>" name="disinvoice"/>
                    <input class="input-field" type="text" value="<?php echo $rows['date']; ?>" name="disolddate"/>
                    <input class="input-field" type="text" value="<?php echo $rows['ptname']; ?>" name="disptname" placeholder="Pt. Name*"/>
                  </div>
                  <div class="dummy-text-3">
                    <input class="input-field" type="text" value="<?php echo $rows['parname']; ?>" name="disprname" placeholder="Parient's Name*"/>
                    <input class="input-field" type="text" value="<?php echo $rows['age']; ?>" name="disage" placeholder="Age*"/>
                    <input class="input-field" type="number" value="<?php echo $rows['contact']; ?>" name="discontact" placeholder="Contact*"/>
                  </div>
                  <div class="dummy-text-3">
                  <input class="input-field" type="text" value="<?php echo $rows['address']; ?>" name="disaddress"/>
                  <input class="input-field" type="text" value="<?php echo date('d/m/Y'); ?>" name="disdate">
                  </div>

                  <div class="dummy-text-3">
                  <input class="input-field" type="text" name="discoment" placeholder="Comment...*" require>
                  </div>
                  <input class="input-btn" type="submit" name="dissubmit" value="Save"/>

              <?php
            }
          }else{
            echo "No Record Found...";
          }
        
        
        }
        
        ?>
      </form>

    </div>
  </div>

</body>
</html>
