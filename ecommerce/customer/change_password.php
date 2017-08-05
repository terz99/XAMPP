<div style="float:left;">

    <form action="" method="post"
    enctype="multipart/form-data">

          <br>
          <table align="center" width="750">

              <tr align="center">
                  <td colspan="2"><h2>Change Password</h2></td>
              </tr>
              <tr>
                  <td align="right">Old Password:</td>
                  <td colspan="8"><input type="password" name="old_password"
                      required></td>
              </tr>

              <tr>
                  <td align="right">New Password:</td>
                  <td colspan="8"><input type="password" name="new_password"
                      required></td>
              </tr>

              <tr>
                  <td align="right">Confirm Password:</td>
                  <td colspan="8"><input type="password" name="confirm_password"
                      required></td>
              </tr>


              <tr align="center">
                  <td colspan="2" style="padding:10px;">
                      <input type="submit" name="change_password" value="Change Password">
                  </td>
              </tr>

          </table>

    </form>

</div>

<?php

if(isset($_POST["change_password"])){

    $userId = $_SESSION["customer_id"];
    $getUser = "SELECT customer_password FROM customers WHERE customer_id='$userId'";
    $runGetUser = mysqli_query($con, $getUser);
    $customer = mysqli_fetch_array($runGetUser);

    if((string)$_POST["old_password"] != (string)$customer["customer_password"]){
        echo "<script>alert('The old password is not correct!');
        window.open('my_account.php', '_self');</script>";
    }

    if((string)$_POST["new_password"] != (string)$_POST["confirm_password"]){
        echo "<script>alert('The passwords do not match!');
        window.open('my_account.php', '_self');</script>";
    } else {

        $newPass = $_POST["new_password"];
        $updateUser = "UPDATE customers SET customer_password='$newPass' WHERE customer_id='$userId'";
        $runUpdateUser = mysqli_query($con, $updateUser);

        if($runUpdateUser){
            echo "<script>alert('Password has been changed successfully!');
            window.open('my_account.php', '_self');</script>";
        }
    }
}

 ?>
