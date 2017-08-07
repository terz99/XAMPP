<?php

include("includes/db.php");

$catId = $_GET["delete_brand"];

$delete = "DELETE FROM brands WHERE id='$catId'";
$runDelete = mysqli_query($con, $delete);

if($runDelete){
    echo "<script>alert('Brand delete successfully!');
    window.open('index.php?view_brands', '_self')</script>";
}

 ?>
