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
                }

                 ?>

            </div>

        </div>

    </body>
</html>
