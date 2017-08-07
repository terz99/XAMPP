<?php

include("includes/db.php");

$catId = $_GET["delete_cat"];

$delete = "DELETE FROM categories WHERE id='$catId'";
$runDelete = mysqli_query($con, $delete);

if($runDelete){
    echo "<script>alert('Category delete successfully!'); 
    window.open('index.php?view_cats', '_self')</script>";
}

 ?>
