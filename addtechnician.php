<?php
//make connection to the database
include 'connect.php';

//if the form is submitted, add the technician to the database
if(isset($_POST['submit'])){
    $name=$_POST['technicianName'];

    $sql="INSERT INTO technician VALUES(NULL, '$name')";
    $result = $conn->query($sql);

    //open the customer display page
    if($result) {
        header('location:customers.php');
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
            <h1>Enter New Technician's Information</h1>
            <div class="mb-3 my-5">
                <label for="technicianName" class="form-label">Technician Name</label>
                <input type="text" class="form-control" id="technicianName" name="technicianName" placeholder="enter name" required>
             </div>
             

            <button type="submit" class="btn btn-primary" name="submit">Add</button>
        </form>
    </div>


  </body>
</html>