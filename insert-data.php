<?php
include "conn.php";

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$sql= "INSERT INTO tb_ajax(fname, lname) VALUES('$fname', '$lname')";
$result = $conn->query($sql);

if($result){echo "hsabdnas";};
?>