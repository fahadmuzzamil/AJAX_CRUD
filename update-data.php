<?php
include "conn.php";
$id = $_POST["id"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];

$sql = "UPDATE `tb_ajax` SET fname = '$fname', lname = '$lname' WHERE id = '$id'";
$result = $conn->query($sql);
?>