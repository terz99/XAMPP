<?php if(!isset($_SESSION["admin"])){
    echo "<script>window.open('admin_login.php', '_self')</script>";exit();
} ?>

<form action="" method="post" enctype="multipart/form-data">

    <table align="center" width="795" bgcolor="#187eae">

        <tr align="center">
            <td colspan="2"><h2>Insert New Category Here</h2></td>
        </tr>

        <tr>
            <td align="right"><b>Category Title:</b></td>
            <td align="center"><input type="text" name="cat_title"
                placeholder="Enter Category Title Here..." size="50" required></td>
        </tr>

        <tr align="center">
            <td colspan="2"><input type="submit" name="insert_cat" value="Insert"></td>
        </tr>

    </table>

</form>

<?php

if(isset($_POST["insert_cat"])){

    include("includes/db.php");

    $newCat = $_POST["cat_title"];

    $insert = "INSERT INTO categories (title) VALUES ('$newCat')";
    $runInsert = mysqli_query($con, $insert);

    if($runInsert){
        echo "<script>alert('Category inserted successfully!');
        window.open('index.php?insert_cat', '_self')</script>";
    }
}

 ?>
