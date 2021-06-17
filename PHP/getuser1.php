<?php
session_start();
$r = intval($_GET['r']);

$con = mysqli_connect('localhost','root','','school');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}


$sql="SELECT * FROM subjects WHERE subid = '".$r."'";
$result = mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$id=$row['tid'];
$sql1=mysqli_query($con,"SELECT * from teachers where tid=$id");
$row2=mysqli_fetch_assoc($sql1);

echo "Current teacher: ".$row2['tname']."";

mysqli_close($con);
?>