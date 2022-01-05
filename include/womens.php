<?php
 include('../include/frontheader.php');

$select="SELECT * FROM product WHERE cattitle='1'";
$check=mysqli_query($conn,$select);
$data=mysqli_fetch_assoc($check);
echo"<pre>";print_r($data);
?>