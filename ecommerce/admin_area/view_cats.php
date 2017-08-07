<table width="795" align="center" bgcolor="pink">

    <tr align="center">
        <td colspan="4"><h2>All Categories</h2></td>
    </tr>

    <tr bgcolor="skyblue">
        <th>ID#</th>
        <th>Title</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    <?php

    include("includes/db.php");

    $getCats = "SELECT * FROM categories";
    $runGetCats = mysqli_query($con, $getCats);

    while($cats=mysqli_fetch_array($runGetCats)){

        $catId = $cats["id"];
        $catTitle = $cats["title"];


     ?>

     <tr align="center">
         <td><?php echo $catId; ?></td>
         <td><b><?php echo $catTitle; ?></b></td>
         <td><a href="index.php?edit_cat=<?php echo $catId; ?>">Edit</a></td>
         <td><a href="#" onclick="return confirm('Are you sure?')">Delete</a></td>
     </tr>

     <?php } ?>

</table>
