<form action="" method="post" enctype="multipart/form-data">

    <table align="center" bgcolor="skyblue" width="795">

        <tr align="center">
            <td colspan="4"><h2>Admin Login</h2></td>
        </tr>

        <tr align="center">
            <td style="padding-left:100px;" align="right" colspan="2"><b>Admin username:</b></td>
            <td style="padding-left:20px;"align="left" colspan="2"><input type="text" name="admin_username"
                placeholder="Enter username..."></td>
        </tr>

        <tr align="center">
            <td style="padding-left:100px;" align="right" colspan="2"><b>Admin password:</b></td>
            <td style="padding-left:20px;"align="left" colspan="2"><input type="password"
                name="admin_password"></td>
        </tr>

        <tr align="center">
            <td colspan="4"><input type="submit" name="admin_login" value="Admin Login"></td>
        </tr>

    </table>

</form>

<?php

if(isset($_POST["admin_login"])){

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
