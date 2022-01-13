
<?php
//make connection to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "desormeauxs";

$conn=new mysqli($servername, $username, $password, $dbname)or
die("Connect failed: %s\n". $conn -> error);


?>