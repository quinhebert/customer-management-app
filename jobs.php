<?php
//make connection to the database
include 'connect.php';

$id=$_GET['custid'];
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
    <button class="btn btn-primary my-5"><a href="customers.php" class="text-light text-decoration-none">Customers</a></button>
    <?php
     echo '<button class="btn btn-dark my-5"><a href="addjob.php?custid='.$id.'" class="text-light text-decoration-none">Add Job</a></button>'
    ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Type</th>
                <th scope="col">Description</th>
                <th scope="col">Technician</th>
            </tr>
        </thead>
        <tbody>

        <?php
        //list all of the jobs for the customer with the customer id 

        $sql="SELECT * FROM job WHERE custid=$id";
        $result= $conn->query($sql);
        if($result){
            while($row=mysqli_fetch_assoc($result)){
                $jobid=$row['jobid'];
                $date=$row['date'];
                $type=$row['type'];
                $description=$row['descrption'];
                $techid=$row['techid'];
                $sqlt="SELECT * FROM technician WHERE techid='$techid'";
                $resultt=$conn->query($sqlt);
                $rowt=mysqli_fetch_assoc($resultt);
                $technician = $rowt['name'];
                echo '<tr>
                <td>'.$date.'</td>
                <td>'.$type.'</td>
                <td>'.$description.'</td>
                <td>'.$technician.'</td>
                <td>
                <button class="btn btn-danger"><a href="jobDelete.php?deleteid='.$jobid.'&custid='.$id.'" class="text-light text-decoration-none">Delete</a></button>
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