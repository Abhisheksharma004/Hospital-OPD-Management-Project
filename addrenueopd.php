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

if (isset($_POST['renusubmit'])) {
    // code...
    $invoiceid = mysqli_real_escape_string($con, $_POST['renuinvoice']);
    $olddate = mysqli_real_escape_string($con, $_POST['renuolddate']);
    $ptname = mysqli_real_escape_string($con, $_POST['renuptname']);
    $prname = mysqli_real_escape_string($con, $_POST['renuprname']);
    $age = mysqli_real_escape_string($con, $_POST['renuage']);
    $mobile = mysqli_real_escape_string($con, $_POST['renucontact']);
    $gender = mysqli_real_escape_string($con, $_POST['renugender']);
    $dr = mysqli_real_escape_string($con, $_POST['renudr']);
    $fees = mysqli_real_escape_string($con, $_POST['renufee']);
    $date = mysqli_real_escape_string($con, $_POST['renudate']);
    $user = $_SESSION['username'] ;
    

    $insertquery = " insert into renewalopd(invoiceid, olddate, name, prname, age, contact, gender, doctor, fees, date, user) values('$invoiceid', '$olddate', '$ptname', '$prname', '$age', '$mobile', '$gender', '$dr', '$fees', '$date', '$user') ";

    $res = mysqli_query($con, $insertquery);
   
      if ($res) {
        // code...

        ?>

          <script>
            alert("Renewal OPD Sucessfuly");
            location.replace("viewrenueopd.php");
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
      <h1>Add Renewal OPD</h1>
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
          $serchquery = "SELECT * FROM adopd WHERE invoiceid='$searchid'";
          $queryrun = mysqli_query($con, $serchquery);
        
          if(mysqli_num_rows($queryrun) > 0){
            while($rows = mysqli_fetch_array($queryrun)){
              ?>

                  <div class="dummy-text-3">
                  <input class="input-field" type="text" value="<?php echo $rows['invoiceid']; ?>" name="renuinvoice"/>
                    <input class="input-field" type="text" value="<?php echo $rows['date']; ?>" name="renuolddate"/>
                    <input class="input-field" type="text" value="<?php echo $rows['ptname']; ?>" name="renuptname" placeholder="Pt. Name*"/>
                  </div>
                  <div class="dummy-text-3">
                    <input class="input-field" type="text" value="<?php echo $rows['parname']; ?>" name="renuprname" placeholder="Parient's Name*"/>
                    <input class="input-field" type="text" value="<?php echo $rows['age']; ?>" name="renuage" placeholder="Age*"/>
                    <input class="input-field" type="number" value="<?php echo $rows['contact']; ?>" name="renucontact" placeholder="Contact*"/>
                  </div>
                  <div class="dummy-text-3">
                    <select class="input-field" name="renugender" id="">
                      <option class="input-field-opt" value="<?php echo $rows['gender']; ?>"><?php echo $rows['gender']; ?></option>
                    </select>
                    <select class="input-field" name="renudr" id="">
                      <option class="input-field-opt" value="<?php echo $rows['doctor']; ?>"><?php echo $rows['doctor']; ?></option>
                    </select>
                    <select class="input-field" name="renufee" id="">
                      <option class="input-field-opt" value="<?php echo $rows['fees']; ?>"><?php echo $rows['fees']; ?></option>
                      <option class="input-field-opt" value="NA">Free</option>
                    </select>
                  
                  </div>

                  <div class="dummy-text-3">
                    <input class="input-field" type="text" value="<?php echo date('d/m/Y'); ?>" name="renudate" placeholder="Parient's Name*"/>
                  </div>
                  <input class="input-btn" type="submit" name="renusubmit" value="Save"/>

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
