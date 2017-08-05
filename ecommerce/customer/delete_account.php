<br>
<div style="float:left;">

    <h2 style="text-align:center; margin-left:75px;">Do you really want to DELETE your account?</h2>
    <form name="delete_form" action="" method="post"
    enctype="multipart/form-data">

        <div style="float:center;">
            <a href="delete.php" onclick="return confirm('Are you sure?')">
                <button type="button">Yes</button></a>
            <input type="submit" name="no" value="No">
        </div>

    </form>

</div>

<?php

    if(isset($_POST["no"])){
        echo "<script>window.open('my_account.php', '_self');</script>";
    }



 ?>
