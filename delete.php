<?php
include 'connect.php';

//delete the customer and job history for the deleteid provided
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="DELETE FROM job WHERE custid=$id";
    $result=$conn->query($sql);

    $sql="DELETE FROM customer WHERE custid=$id";
    $result = $conn->query($sql);
    if($result){
        header('location:customers.php');
    }
    else{
        die(mysqli_error($conn));
    }
}

?>