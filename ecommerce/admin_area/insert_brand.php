<?php if(!isset($_SESSION["admin"])){
    echo "<script>window.open('admin_login.php', '_self')</script>";exit();
} ?>

<form action="" method="post" enctype="multipart/form-data">

    <table align="center" width="795" bgcolor="#187eae">

        <tr align="center">
            <td colspan="2"><h2>Insert New Brand Here</h2></td>
        </tr>

        <tr>
            <td align="right"><b>Brand Title:</b></td>
            <td align="center"><input type="text" name="brand_title"
                placeholder="Enter Brand Title Here..." size="50" required></td>
        </tr>

        <tr align="center">
            <td colspan="2"><input type="submit" name="insert_brand" value="Insert"></td>
        </tr>

    </table>

</form>

<?php

if(isset($_POST["insert_brand"])){

    include("includes/db.php");

    $newBrand = $_POST["brand_title"];

    $insert = "INSERT INTO brands (title) VALUES ('$newBrand')";
    $runInsert = mysqli_query($con, $insert);

    if($runInsert){
        echo "<script>alert('Brand inserted successfully!');
        window.open('index.php?insert_brand', '_self')</script>";
    }
}

 ?>
