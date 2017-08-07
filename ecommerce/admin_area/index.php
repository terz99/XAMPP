<!DOCTYPE>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Panel</title>
        <link rel="stylesheet" href="styles/styles.css" media="all">
    </head>
    <body>

        <div class="main_wrapper">

            <div id="header">

            </div>

            <div id="right">

                <h3 style="text-align:center;">Manage Content:</h3>

                <a href="index.php?insert_product">Insert Product</a>
                <a href="index.php?view_products">View Products</a>
                <a href="index.php?insert_cat">Insert Category</a>
                <a href="index.php?view_cats">View Categories</a>
                <a href="index.php?insert_brand">Insert Brand</a>
                <a href="index.php?view_brands">View Brands</a>
                <a href="index.php?view_customers">View Customers</a>
                <a href="index.php?view_orders">View Orders</a>
                <a href="index.php?view_payments">View Payments</a>
                <a href="index.php?logout">Admin Logout</a>

            </div>

            <div id="left">

                <?php

                if(isset($_GET["insert_product"])){
                    include("insert_product.php");
                } else if(isset($_GET["view_products"])){
                    include("view_products.php");
                } else if(isset($_GET["edit_product"])){
                    include("edit_product.php");
                } else if(isset($_GET["delete_product"])){
                    include("delete_product.php");
                } else if(isset($_GET["insert_cat"])){
                    include("insert_cat.php");
                } else if(isset($_GET["view_cats"])){
                    include("view_cats.php");
                } else if(isset($_GET["edit_cat"])){
                    include("edit_cat.php");
                } else if(isset($_GET["delete_cat"])){
                    include("delete_cat.php");
                }

                 ?>

            </div>

        </div>

    </body>
</html>
