<?php

include 'db_con.php';

$idres = $_GET['id'];

$deletequery = " SELECT * FROM adopd ";
$barcodefont = "barcode.ttf";
$font = "font2.ttf";
$name = "Abhishek";
$image = imagecreatefromjpeg("print.jpg");
$color = imagecolorallocate($image, 19, 21, 22);


imagettftext($image, 30, 0, 200, 200, $color, $font, $name);

imagejpeg($image);
imagedestroy($image);
?>