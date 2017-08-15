<table width="795" bgcolor="pink" align="center" style="float: right;">

    <tr align="center">
        <td colspan="9"><h2>All Customers</h2></td>
    </tr>

    <tr align="center" bgcolor="skyblue">
        <th>ID#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>IP Address</th>
        <th>City</th>
        <th>Country</th>
        <th>Birthdate</th>
        <th>Gender</th>
    </tr>

    <?php

    include("includes/db.php");

    $getCustomers = "SELECT * FROM customers";
    $runGetCustomers = mysqli_query($con, $getCustomers);

    while($customer = mysqli_fetch_array($runGetCustomers)){

        $customerName = $customer["customer_name"];
        $customerId = $customer["customer_id"];
        $customerCity = $customer["customer_city"];
        $customerCountry = $customer["customer_country"];
        $customerGender = $customer["customer_gender"];
        $customerBirth = $customer["customer_birthdate"];
        $customerIp = $customer["customer_ip_address"];
        $customerAddress = $customer["customer_address"];
        $customerEmail = $customer["customer_email"];

     ?>

     <tr id="customer_row" align="center">
         <td><?php echo $customerId; ?></td>
         <td><?php echo $customerName; ?></td>
         <td><?php echo $customerEmail; ?></td>
         <td><?php echo $customerAddress; ?></td>
         <td><?php echo $customerIp; ?></td>
         <td><?php echo $customerCity; ?></td>
         <td><?php echo $customerCountry; ?></td>
         <td><?php echo $customerBirth; ?></td>
         <td><?php echo $customerGender; ?></td>
     </tr>

     <?php } ?>

</table>
