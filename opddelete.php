<?php

include 'db_con.php';

$idres = $_GET['id'];

$deletequery = " DELETE FROM adopd WHERE id=$idres ";

$query = mysqli_query($con,$deletequery);

if ($query) {
    ?>
    <script>
        alert("Delete OPD");
        location.replace("viewOPD.php");
    </script>
    
    <?php
}
else{
    ?>
    <script>
        alert("Server Down");
    </script>
    
    <?php

}

// header ('location:viewOPD.php');

?>