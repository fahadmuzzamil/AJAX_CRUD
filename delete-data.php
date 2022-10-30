<?php
include "conn.php";

$id= $_POST["id"];
$sql= "DELETE FROM tb_ajax WHERE id = '$id'";
$result = $conn->query($sql);

?>