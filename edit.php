<?php
include 'connect.php';

$id=$_GET['editid'];
$sql="SELECT * FROM customer WHERE custid=$id";
$result = $conn->query($sql);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$email=$row['email'];
$phone=$row['phone'];
$address=$row['address'];

if(isset($_POST['submit'])){
    $name=$_POST['customerName'];
    $email=$_POST['customerEmail'];
    $phone=$_POST['customerPhone'];
    $address=$_POST['customerAddr'];

    $sql="UPDATE customer SET custid=$id, name='$name', email='$email', phone='$phone', address='$address' WHERE custid=$id";
    $result = $conn->query($sql);

    if($result) {
        header('location:customers.php');
    }
    else {
        die(mysqli_error($conn));
    }
}


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Desormeaux's</title>
  </head>
  <body>
    <div class="container my-5">
        <form method="post" autocomplete="off">
            <h1>Edit Customer Profile for <?php echo $name ?></h1>
            <div class="mb-3">
                <label for="customerName" class="form-label">Customer Name</label>
                <?php echo '<input type="text" class="form-control" id="customerName" name="customerName" placeholder="enter name" value="'. $name.'">' ?>
             </div>
             <div class="mb-3">
                <label for="customerEmail" class="form-label">Customer Email</label>
                <input type="email" class="form-control" id="customerEmail" name="customerEmail" placeholder="enter email" value=<?php echo $email; ?>>
             </div>
             <div class="mb-3">
                <label for="customerPhone" class="form-label">Customer Phone Number</label>
                <input type="text" class="form-control" id="customerPhone" name="customerPhone" placeholder="xxx-xxx-xxxx" value=<?php echo $phone; ?>>
             </div>
             <div class="mb-3">
                <label for="customerAddr" class="form-label">Customer Address</label>
                <?php echo '<input type="text" class="form-control" id="customerAddr" name="customerAddr" placeholder="enter address (street, city, state, zip code)" value= "'.$address.'">' ?>
             </div>

            <button type="submit" class="btn btn-primary" name="submit">Edit</button>
        </form>
    </div>


  </body>
</html>