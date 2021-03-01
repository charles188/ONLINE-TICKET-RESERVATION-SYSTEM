<?php
include('../db.php');
$type=$_POST['type'];
$route=$_POST['route'];
$price=$_POST['price'];
$seat=$_POST['seat'];
$time=$_POST['time'];
$update=mysqli_query($conn,"INSERT INTO route (type, price, numseats, route, time)
VALUES
('$type','$price','$seat','$route','$time')");
header("location: route.php");
?>
