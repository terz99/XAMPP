<?php
if(!isset($_SESSION["admin"])){
    echo "<script>window.open('admin_login.php', '_self')</script>";exit();
}

include("includes/db.php");

$catId = $_GET["delete_cat"];

$delete = "DELETE FROM categories WHERE id='$catId'";
$runDelete = mysqli_query($con, $delete);

if($runDelete){
    echo "<script>alert('Category delete successfully!');
    window.open('index.php?view_cats', '_self')</script>";
}

 ?>
