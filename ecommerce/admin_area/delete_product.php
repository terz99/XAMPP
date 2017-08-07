<?php

include("includes/db.php");

$proId = $_GET["delete_product"];

$delete = "DELETE FROM products WHERE id='$proId'";
$runDelete = mysqli_query($con, $delete);

if($runDelete){
    echo "<script>alert('Product successfully deleted!');
    window.open('index.php?view_products', '_self');</script>";
}

 ?>
