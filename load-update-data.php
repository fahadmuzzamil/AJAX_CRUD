<?php
include "conn.php";

$id= 13;
$sql= "SELECT * FROM tb_ajax WHERE id = '$id'";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
echo $row["fname"]. "<br>";
echo $row["lname"]. "<br>";
echo $row["id"]. "<br>";
if($result){
    if(mysqli_num_rows($result)){
    $row = mysqli_fetch_assoc($result);
    $output = "<input type=text placeholder= First-Name value=$row[fname] id=updated-fname max-length=100>";
    $output.= "<input type=text placeholder= Last-Name value =$row[lname] id=updated-lname max-length=100>";
    $output.= "<input type=submit value= Update class= updated-btn id=$row[id]>";
    echo $output;
    }
}
?>