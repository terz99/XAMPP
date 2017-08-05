<?php

include("../functions/functions.php");
include("../includes/db.php");

function deleteUser(){

    global $con;

    $userId = $_SESSION["customer_id"];
    $deleteUser = "DELETE FROM customers WHERE customer_id='$userId'";
    $runDeleteUser = mysqli_query($con, $deleteUser);

    if($runDeleteUser){
        unset($_SESSION["customer_id"]);

        echo "<script>window.open('../index.php', '_self');</script>";
    }
}

deleteUser();

 ?>
