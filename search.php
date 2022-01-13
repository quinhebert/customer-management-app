<?php
//The search box has not been implemented yet

include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desormeaux's</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <form action="POST">
        <label for="search">Search</label>
        <input type="text" name="search">
        <input type="submit" name="submit">
    </form>
</body>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Cust. No.</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
            </tr>
        </thead>
        <tbody>

        <?php

    if(isset($_POST['submit'])) {
        $phone = $_POST['search'];
        $sql = "SELECT * FROM customer WHERE phone=$phone";
        $result=$conn->query($sql);
    
        if($result){
            while($row=mysqli_fetch_assoc($result)){
                $id=$row['custid'];
                $name=$row['name'];
                $email=$row['email'];
                $phone=$row['phone'];
                $address=$row['address'];
                echo '<tr>
                <th scope="row">'.$id.'</th>
                <td>'.$name.'</td>
                <td>'.$email.'</td>
                <td>'.$phone.'</td>
                <td>'.$address.'</td>
                <td>
                <button class="btn btn-primary"><a href="edit.php?editid='.$id.'" class="text-light text-decoration-none">Edit</a></button>
                <button class="btn btn-danger"><a href="delete.php?deleteid='.$id.'" class="text-light text-decoration-none">Delete</a></button>
                <button class="btn btn-dark"><a href="addjob.php?custid='.$id.'" class="text-light text-decoration-none">Add Job</a></button>
                <button class="btn btn-secondary"><a href="jobs.php?custid='.$id.'" class="text-light text-decoration-none">Job History</a></button>
                </td>
            </tr>';
            }
        }
    }
    ?>
</html>


