<table width="795" bgcolor="pink" align="center">

    <tr align="center">
        <td colspan="4"><h2>All Brands</h2></td>
    </tr>

    <tr align="center" bgcolor="skyblue">
        <th>ID#</th>
        <th>Title</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    <?php

    include("includes/db.php");

    $getBrands = "SELECT * FROM brands";
    $runGetBrands = mysqli_query($con, $getBrands);

    while($brands=mysqli_fetch_array($runGetBrands)){

        $brandId = $brands["id"];
        $brandTitle = $brands["title"];

     ?>

     <tr align="center">
         <td><?php echo $brandId; ?></td>
         <td><b><?php echo $brandTitle; ?></b></td>
         <td><a href="index.php?edit_brand=<?php echo $brandId; ?>">Edit</a></td>
         <td><a href="index.php?delete_brand=<?php echo $brandId; ?>">Delete</a></td>
     </tr>

     <?php } ?>

</table>
