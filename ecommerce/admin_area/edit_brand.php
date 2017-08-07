<?php

include("includes/db.php");

$brandId = $_GET["edit_brand"];

$getBrand = "SELECT * FROM brands WHERE id='$brandId'";
$runGetBrand = mysqli_query($con, $getBrand);
$brand = mysqli_fetch_array($runGetBrand);

$brandTitle = $brand["title"];

 ?>

<form action="" method="post" enctype="multipart/form-data">

    <table align="center" width="795" bgcolor="#187eae">

        <tr align="center">
            <td colspan="2"><h2>Edit Brand Here</h2></td>
        </tr>

        <tr>
            <td align="right"><b>Brand Title:</b></td>
            <td align="center"><input type="text" name="brand_title"
                value="<?php echo $brandTitle; ?>" size="50"></td>
        </tr>

        <tr align="center">
            <td colspan="2"><input type="submit" name="edit_brand" value="Edit"></td>
        </tr>

    </table>

</form>

<?php

if(isset($_POST["edit_brand"])){

    $newTitle = $_POST["brand_title"];
    if(empty($newTitle)){ $newTitle = $brandTitle; }

    $update = "UPDATE brands SET title='$newTitle' WHERE id='$brandId'";
    $runUpdate = mysqli_query($con, $update);

    if($runUpdate){
        echo "<script>alert('Brand successfully edited!');
        window.open('index.php?view_brands', '_self');</script>";
    }
}

 ?>
