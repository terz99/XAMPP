<?php

if(!isset($_SESSION["admin"])){
    echo "<script>window.open('admin_login.php', '_self')</script>";exit();
}

include("includes/db.php");

unset($_SESSION["admin"]);

echo "<script>window.open('index.php', '_self');</script>";

 ?>
