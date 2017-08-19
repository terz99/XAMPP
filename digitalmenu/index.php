<?php

include("includes/db.php");
include ("functions/functions.php");

$result = $con->query("SELECT * FROM table_names");
$outp = array();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);

 ?>
