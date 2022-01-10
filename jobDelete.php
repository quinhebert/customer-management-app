<?php
include 'connect.php';

$id=$_GET['custid'];

if(isset($_GET['deleteid'])){
    $jobid=$_GET['deleteid'];

    $sql="DELETE FROM job WHERE jobid=$jobid";
    $result = $conn->query($sql);

    if($result){
        header('location:jobs.php?custid='.$id.'');
    }
}

?>