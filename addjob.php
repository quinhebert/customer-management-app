<?php
include 'connect.php';

$custid=$_GET['custid'];

if(isset($_POST['submit'])){

    $type=$_POST['jobtype'];
    $description=$_POST['jobdescription'];
    $techid=$_POST['techid'];
    date_default_timezone_set('America/Bogota');
    $date=date('Y-m-d');

    $sql="INSERT INTO job VALUES(NULL, '$date', '$type', '$description', '$techid', '$custid')";
    $result = $conn->query($sql);

    if($result) {
        header('location:jobs.php?custid='.$custid.'');
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
            <h1 class="my-5">Enter Job Information</h1>
            <div class=mb-3>
                <label for="jobtype" class="form-label">Job Type</label>
                <select class="form-select" aria-label="Default select example" name="jobtype" required>
                    <option value="">Choose Job Type</option>
                    <option value="Repair">Repair</option>
                    <option value="Installation">Installation</option>
                    <option value="Maintenance">Maintenance</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="jobdescription" class="form-label">Description</label>
                <input type="text" class="form-control" id="jobdescription" name="jobdescription" placeholder="enter job description" required>
             </div>
             <div class="mb-3">
                <label for="jobtechnician" class="form-label">Technician</label>
                <select class="form-select" aria-label="Default select example" name="techid" required>
                    <option value="">Choose Technician</option>
                    <?php
                    $sql="SELECT * FROM technician";
                    $result = $conn->query($sql);
                    if($result){
                        while($row=mysqli_fetch_assoc($result)){
                            $tech=$row['name'];
                            $techid=$row['techid'];
                            echo '<option value="'.$techid.'">'.$tech.'</option>';
                        }
                    }

                    ?>
                </select>
             </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>

  </body>
</html>