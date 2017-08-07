<?php

include("includes/db.php");

$catId = $_GET["edit_cat"];

$getCat = "SELECT * FROM categories WHERE id='$catId'";
$runGetCat = mysqli_query($con, $getCat);
$cat = mysqli_fetch_array($runGetCat);

$catTitle = $cat["title"];

 ?>

<form action="" method="post" enctype="multipart/form-data">

    <table align="center" width="795" bgcolor="#187eae">

        <tr align="center">
            <td colspan="2"><h2>Edit Category Here</h2></td>
        </tr>

        <tr>
            <td align="right"><b>Category Title:</b></td>
            <td align="center"><input type="text" name="cat_title"
                value="<?php echo $catTitle; ?>" size="50"></td>
        </tr>

        <tr align="center">
            <td colspan="2"><input type="submit" name="edit_cat" value="Edit"></td>
        </tr>

    </table>

</form>

<?php

if(isset($_POST["edit_cat"])){

    $newTitle = $_POST["cat_title"];
    if(empty($newTitle)){ $newTitle = $catTitle; }

    $update = "UPDATE categories SET title='$newTitle' WHERE id='$catId'";
    $runUpdate = mysqli_query($con, $update);

    if($runUpdate){
        echo "<script>alert('Category successfully edited!');
        window.open('index.php?view_cats', '_self');</script>";
    }
}

 ?>
