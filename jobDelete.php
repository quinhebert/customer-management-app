<?php
//make connection to the database
include 'connect.php';

$id=$_GET['custid'];

//delete the job, related to the deleteid
if(isset($_GET['deleteid'])){
    $jobid=$_GET['deleteid'];

    $sql="DELETE FROM job WHERE jobid=$jobid";
    $result = $conn->query($sql);

    //go back to the job history for the customer using the customer id
    if($result){
        header('location:jobs.php?custid='.$id.'');
    }
}

?>