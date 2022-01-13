<?php
//Make connection to database
include 'connect.php';

//if the form is submitted, add the new customer to the database
if(isset($_POST['submit'])){
    $name=$_POST['customerName'];
    $email=$_POST['customerEmail'];
    $phone=$_POST['customerPhone'];
    $address=$_POST['customerAddr'];

    $sql="INSERT INTO customer VALUES(NULL, '$name', '$email', '$phone', '$address')";
    $result = $conn->query($sql);

    //go back to the customer display page
    if($result) {
        header('location:customers.php');
    }
}


?>


<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Desormeaux's</title>
  </head>
  <body>
    <div class="container my-5">
        <form method="post" autocomplete="off">
            <h1>Enter New Customer's Information</h1>
            <div class="mb-3">
                <label for="customerName" class="form-label">Customer Name</label>
                <input type="text" class="form-control" id="customerName" name="customerName" placeholder="enter name" required>
             </div>
             <div class="mb-3">
                <label for="customerEmail" class="form-label">Customer Email</label>
                <input type="email" class="form-control" id="customerEmail" name="customerEmail" placeholder="enter email" required>
             </div>
             <div class="mb-3">
                <label for="customerPhone" class="form-label">Customer Phone Number</label>
                <input type="text" class="form-control" id="customerPhone" name="customerPhone" placeholder="xxx-xxx-xxxx" required>
             </div>
             <div class="mb-3">
                <label for="customerAddr" class="form-label">Customer Address</label>
                <input type="text" class="form-control" id="customerAddr" name="customerAddr" placeholder="enter address (street, city, state, zip code)" required>
             </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>


  </body>
</html>