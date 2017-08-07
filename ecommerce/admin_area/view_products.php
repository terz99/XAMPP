

<table width="795" bgcolor="pink" align="center" padding="10" margin="10">

    <tr align="center">
        <td colspan="6"><h2>View Products</h2></td>
    </tr>

    <tr align="center" bgcolor="skyblue">
        <th>ID#</th>
        <th>Name</th>
        <th>Image</th>
        <th>Price</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    <?php

    include("includes/db.php");

    $getPro = "SELECT * FROM products";
    $runGetPro = mysqli_query($con, $getPro);

    while($products=mysqli_fetch_array($runGetPro)){

        $proId = $products["id"];
        $proTitle = $products["title"];
        $proImage = $products["image"];
        $proPrice = $products["price"];


     ?>

    <tr align="center">
        <td><?php echo $proId; ?></td>
        <td><?php echo $proTitle ?></td>
        <td><img src="product_images/<?php echo $proImage; ?>" width="60" height="60"></td>
        <td>$<?php echo $proPrice ?></td>
        <td><a href="index.php?edit_product=<?php echo $proId; ?>">Edit</a></td>
        <td><a href="index.php?delete_product=<?php echo $proId; ?>"
            onclick="return confirm('Are you sure you want to delete this item?')">Delete</a></td>
    </tr>

    <?php } ?>

</table>
