<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dropdown Menu with Search Box | CodingNepal</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/viewOPD.css">

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

  <center><h1 style="padding-top: 75px; background-color:#4d5b72 ; color:#fff;">Renewal OPD Pt. List</h1></center>
  <table class="design-table" style="background-color:#171c24;">
          <tr>
            <th>ID</th>
            <th>Patient Id</th>
            <th>New Date</th>
            <th>OLD Date</th>
            <th>Pt. Name</th>
            <th>Parent Name</th>
            <th>Age</th>
            <th>Contact</th>
            <th>Gender</th>
            <th>Doctor's</th>
            <th>Fees</th>
            <th>User Operator</th>
            <th colspan="3";>Action</th>
          </tr>
          <tbody>

            <?php
              include 'db_con.php';

              $selectquery = " select * from renewalopd ORDER BY id DESC";

              $query = mysqli_query($con, $selectquery);

              $nums = mysqli_num_rows($query);

              while ($res = mysqli_fetch_array($query)) {
                // code...
                  ?>


                <tr>
                 <td> <?php echo $res['id']; ?> </td>
                 <td> <?php echo $res['invoiceid']; ?> </td>
                 <td> <?php echo $res['date']; ?> </td>
                 <td> <?php echo $res['olddate']; ?> </td>
                 <td> <?php echo $res['name']; ?> </td>
                 <td> <?php echo $res['prname']; ?> </td>
                 <td> <?php echo $res['age']; ?> </td>
                 <td> <?php echo $res['contact']; ?> </td>
                 <td> <?php echo $res['gender']; ?> </td>
                 <td> <?php echo $res['doctor']; ?> </td>
                 <td> <?php echo $res['fees']; ?> </td>
                 <td> <?php echo $res['user']; ?> </td>

                 <td><a href="opdprint.php?id=<?php echo $res['id']; ?>" title="OPD Print"><i class="fas fa-print opdprint"></i></a></td>
                 <td><a href="" title="UPDATE"><i class="fas fa-edit billprint"></i></a></td>
                 <td><a href="opddelete.php?id=<?php echo $res['id']; ?>" title="DELETE"><i class="fas fa-trash"></i></a></td>
                </tr>
            <?php 
               
              }


            ?>

          </tbody>
        </table>

</body>
</html>
