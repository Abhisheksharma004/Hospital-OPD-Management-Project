<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $db_name = "opddb";

    $con = mysqli_connect($server,$user,$password,$db_name);

    if($con){
        ?>
        <script>
            alert("Connection Sucessfuly");
        </script>
        <?php
    }else{
        ?>
        <script>
            alert("Connection Not Sucessfuly");
        </script>
        <?php
    }
?>