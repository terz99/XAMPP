<!DOCTYPE html>
<html>
    <head>
        <title>Admin Login</title>
        <link rel="stylesheet" href="styles/login.css">
        <script type="text/javascript" src="includes/login.js">

        </script>
    </head>
    <body>

          <div class="login">
        	<h1>Admin Login</h1>
            <form method="post">
            	<input type="text" name="admin_username" placeholder="Username" required>
                <input type="password" name="admin_password" placeholder="Password" required>
                <input class="btn btn-primary btn-block btn-large" type="submit"
                name="admin_login" value="Login">
            </form>
        </div>

    </body>
</html>

<?php

if(isset($_POST["admin_login"])){

    include("../functions/functions.php");
    include ("includes/db.php");

    $adminUser = $_POST["admin_username"];
    $adminPass = $_POST["admin_password"];

    if($adminUser === $ADMINUSER and $adminPass === $ADMINPASS){
        $_SESSION["admin"] = True;
        echo "<script>alert('Login successful!');
        window.open('index.php', '_self');</script>";
    } else {
        echo "<script>alert('Login failed!');</script>";
    }
}

 ?>
