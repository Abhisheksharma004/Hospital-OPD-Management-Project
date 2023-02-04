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
              <li><a href="viewrenueopd">View Renewal OPD Pt.</a></li>
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
      <h1>Admin ID Password List</h1>
    </div>
    <div class="dummy-text-2">
      <div class="dummy-text-3">
        <table class="design-table">
          <tr>
            <th>ID/SL No.</th>
            <th>Name of Admin & Hospital</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Password</th>
            <!-- <th>Conform Password</th> -->
            <th>Update</th>
            <th>Delete</th>
          </tr>
          <tbody>

            <?php
              include 'db_con.php';

              $selectquery = " select * from adminreg ";

              $query = mysqli_query($con, $selectquery);

              $nums = mysqli_num_rows($query);

              while ($res = mysqli_fetch_array($query)) {
                // code...
                  ?>


                <tr>
                 <td> <?php echo $res['id']; ?> </td>
                 <td> <?php echo $res['name']; ?> </td>
                 <td> <?php echo $res['username']; ?> </td>
                 <td> <?php echo $res['email']; ?> </td>
                 <td> <?php echo $res['mobile']; ?> </td>
                 <td> <?php echo $res['password']; ?> </td>
                 <!-- <td> <?php //echo $res['cpassword']; ?> </td> -->
                 <td><button>Update</button></td>
                 <td><button>Delete</button></td>
                </tr>
            <?php 
               
              }


            ?>

          </tbody>
          
        </table>
      </div>
    </div>
  </div>

</body>
</html>
