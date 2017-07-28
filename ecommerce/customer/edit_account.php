<?php

$customerId = $_SESSION["customer_id"];

$getCustomer = "SELECT * FROM customers WHERE customer_id='$customerId'";
$runGetCustomer = mysqli_query($con, $getCustomer);
$customer = mysqli_fetch_array($runGetCustomer);

 ?>

<div style="float:left;">

    <form action="" method="post"
    enctype="multipart/form-data">

          <br>
          <table align="center" width="750">

              <tr align="center">
                  <td colspan="2"><h2>Edit Account</h2></td>
              </tr>

              <tr>
                  <td align="right">Full Name:</td>
                  <td colspan="8"><input type="text" name="customer_name"
                      value="<?php echo $customer['customer_name'] ?>" required></td>
              </tr>

              <tr>
                  <td align="right">Email:</td>
                  <td colspan="8"><input type="text" name="customer_email"
                      value="<?php echo $customer['customer_email'] ?>" required></td>
              </tr>

              <tr>
                  <td align="right">Country:</td>
                  <td colspan="8"><select name="customer_country">
                      <?php

                      $getCountries = "SELECT * FROM countries";
                      $runGetCountries = mysqli_query($con, $getCountries);

                      while($countries_row=mysqli_fetch_array($runGetCountries)){

                          $country_name = $countries_row["country_name"];

                          echo "<option>$country_name</option>";
                      }

                       ?>
                  </select></td>
              </tr>

              <tr>
                  <td align="right">City:</td>
                  <td colspan="8"><input type="text" name="customer_city"
                      value="<?php echo $customer['customer_city'] ?>" required></td>
              </tr>

              <tr>
                  <td align="right">Address:</td>
                  <td colspan="8"><input type="text" name="customer_address"
                      value="<?php echo $customer['customer_address'] ?>" required></td>
              </tr>

              <tr>
                  <td align="right">Birthdate:</td>
                  <td colspan="8"><input type="date" name="customer_birthdate"
                      value="<?php echo $customer['customer_birthdate'] ?>"></td>
              </tr>

              <tr>
                  <td align="right">Gender:</td>
                  <td colspan="8"><select name="customer_gender">
                      <option>Male</option>
                      <option>Female</option>
                      <option>Other</option>
                  </select></td>
              </tr>

              <tr align="center">
                  <td colspan="2" style="padding:10px;">
                      <input type="submit" name="edit_account" value="Edit Account">
                  </td>
              </tr>

          </table>

    </form>

</div>

<?php

if(isset($_POST["edit_account"])){

    $newName = $_POST["customer_name"];
    $newEmail = $_POST["customer_email"];
    $newCity = $_POST["customer_city"];
    $newCountry = $_POST["customer_country"];
    $newAddress = $_POST["customer_address"];
    $newBirthdate = $_POST["customer_birthdate"];
    $newGender = $_POST["customer_gender"];

    $editCustomer = "UPDATE customers SET customer_name='$newName', customer_email='$newEmail',
    customer_city='$newCity', customer_country='$newCountry', customer_address='$newAddress',
    customer_birthdate='$newBirthdate' WHERE customer_id='$customerId'";
    $runEditCustomer = mysqli_query($con, $editCustomer);

    if($runEditCustomer){
        echo "<script>alert('Account edited successfully!');
         window.open('my_account.php', '_self');</script>";
    }
}

 ?>
