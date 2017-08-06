<!DOCTYPE>

<?php

include("includes/db.php");

$proId = $_GET["edit_product"];

$getPro = "SELECT * FROM products WHERE id='$proId'";
$runGetPro = mysqli_query($con, $getPro);
$product = mysqli_fetch_array($runGetPro);

$proTitle = $product["title"];
$proCat = $product["cat"];
$proBrand = $product["brand"];
$proImage = $product["image"];
$proKeywords = $product["keywords"];
$proDesc = $product["descr"];
$proPrice = $product["price"];

$getCat = "SELECT title FROM categories WHERE id='$proCat'";
$getBrand = "SELECT title FROM brands WHERE id='$proBrand'";
$runGetCat = mysqli_query($con, $getCat);
$runGetBrand = mysqli_query($con, $getBrand);
$cat = mysqli_fetch_array($runGetCat);
$brand = mysqli_fetch_array($runGetBrand);
$catTitle = $cat["title"];
$brandTitle = $brand["title"];

?>
<html>
	<head>
		<title>Edit a Product</title>

<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>
        tinymce.init({selector:'textarea'});
</script>
	</head>

<body bgcolor="skyblue">


	<form action="" method="post" enctype="multipart/form-data">

		<table align="center" width="795" border="2" bgcolor="#187eae">

			<tr align="center">
				<td colspan="7"><h2>Edit a Product Here</h2></td>
			</tr>

			<tr>
				<td align="right"><b>Product Title:</b></td>
				<td><input type="text" name="product_title" size="60"
                    value="<?php echo $proTitle; ?>"/></td>
			</tr>

			<tr>
				<td align="right"><b>Product Category:</b></td>
				<td>
				<select name="product_cat" >
					<option value="<?php echo $proCat; ?>"><?php echo $catTitle; ?></option>
					<?php
		$get_cats = "select * from categories";

		$run_cats = mysqli_query($con, $get_cats);

		while ($row_cats=mysqli_fetch_array($run_cats)){

		$cat_id = $row_cats['id'];
		$cat_title = $row_cats['title'];

		echo "<option value='$cat_id'>$cat_title</option>";


	}

					?>
				</select>


				</td>
			</tr>

			<tr>
				<td align="right"><b>Product Brand:</b></td>
				<td>
				<select name="product_brand" >
					<option value="<?php echo $proBrand; ?>"><?php echo $brandTitle; ?></option>
					<?php
		$get_brands = "select * from brands";

	$run_brands = mysqli_query($con, $get_brands);

	while ($row_brands=mysqli_fetch_array($run_brands)){

		$brand_id = $row_brands['id'];
		$brand_title = $row_brands['title'];

	echo "<option value='$brand_id'>$brand_title</option>";


	}

					?>
				</select>


				</td>
			</tr>

			<tr>
				<td align="right"><b>Product Image:</b></td>
				<td><input type="file" name="product_image" />
                <img src="product_images/<?php echo $proImage; ?>" width="60" height="60"></td>
			</tr>

			<tr>
				<td align="right"><b>Product Price:</b></td>
				<td><input type="text" name="product_price" value="<?php echo $proPrice; ?>" /></td>
			</tr>

			<tr>
				<td align="right"><b>Product Description:</b></td>
				<td><textarea name="product_desc" cols="20" rows="10"><?php echo $proDesc; ?></textarea></td>
			</tr>

			<tr>
				<td align="right"><b>Product Keywords:</b></td>
				<td><input type="text" name="product_keywords" size="50"
                    value="<?php echo $proKeywords; ?>" /></td>
			</tr>

			<tr align="center">
				<td colspan="7"><input type="submit" name="edit_product" value="Edit Product Now"/></td>
			</tr>

		</table>


	</form>


</body>
</html>
<?php

if(isset($_POST["edit_product"])){

    $newTitle = $_POST["product_title"];
    if(empty($newTitle)){ $newTitle = $proTitle; }

    $newCat = $_POST["product_cat"];
    if(empty($newCat)){ $newCat = $proCat; }

    $newBrand = $_POST["product_brand"];
    if(empty($newBrand)){ $newBrand = $proBrand; }

    $newPrice = $_POST["product_price"];
    if(empty($newPrice)){ $newPrice = $proPrice; }

    $newDesc = $_POST["product_desc"];
    if(empty($newDesc)){ $newDesc = $proDesc; }

    $newKeywords = $_POST["product_keywords"];
    if(empty($newKeywords)){ $newKeywords = $proKeywords; }

    $newImage = $_FILES["product_image"]["name"];
    $newImageTmp = $_FILES["product_image"]["tmp_name"];
    if(!empty($newImage)){
        move_uploaded_file($newImageTmp, "product_images/$newImage");
    } else {
        $newImage = $proImage;
    }

    $update = "UPDATE products SET title='$newTitle', cat='$newCat', brand='$newBrand',
    price='$newPrice', descr='$newDesc', keywords='$newKeywords', image='$newImage' WHERE
    id='$proId'";
    $runUpdate = mysqli_query($con, $update);

    if($runUpdate){
        echo "<script>alert('Edition successful!');
        window.open('index.php?view_products', '_self');</script>";
    }
}

?>
