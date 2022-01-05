<?php
include('../frontend/include/frontheader.php');
 $conn=mysqli_connect("localhost","root","","admindb");

$sel="SELECT * from product Where cattitle='1'";
$chk=mysqli_query($conn,$sel);
$dc=mysqli_fetch_assoc($chk);
echo"<pre>";
echo"($chk)";

?>