<?php
include "conn.php";

$sql = "SELECT * FROM tb_ajax";
$result = $conn->query($sql);

if($result){
    $output = "<table>
                <tr class=heading>
                <td>ID</td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Delete Record</td>
                <td>Update Record</td>
                </tr>";
             while($row=mysqli_fetch_assoc($result)){
             $output.= "<tr class = summary>
                        <td>$row[id]</td>
                        <td>$row[fname]</td>
                        <td>$row[lname]</td>
                        <td><button class = delete-btn id=$row[id]>Delete</td>
                        <td><button class = update-button id=$row[id]>Update</td>
                        </tr>";
             }
             $output.= "</table>";    
    echo $output;   
    }else{
        echo "<h2>Unable to fetch Data, please try again Later</h2>";
    }

?>