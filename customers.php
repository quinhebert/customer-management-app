
<?php
//Make connection to database

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

<div class="container">
    <button class="btn btn-primary my-5"><a href="addcustomer.php" class="text-light text-decoration-none">Add Customer</a></button>
    <button class="btn btn-secondary my-5"><a href="addtechnician.php" class="text-light text-decoration-none">Add Technician</a></button>
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
        // List all customers and their related info from the database

        $sql="SELECT * FROM customer";
        $result= $conn->query($sql);
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

        ?>

        

        </tbody>
    </table>
</div>
    
</body>
</html>