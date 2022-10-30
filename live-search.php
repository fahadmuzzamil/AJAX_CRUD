<?php
include "conn.php";

$search = $_POST["search"];
$sql = "SELECT * FROM tb_ajax WHERE fname LIKE '%$search%' OR lname LIKE '%$search%'";

$result = $conn->query($sql);
if(mysqli_num_rows($result)>0){
    $output= " <table>
               <tr class=heading>
               <td>ID</td>
               <th>First Name</th>
               <th>Last Name</th>
               <th>Delete Name</th>
               <th>Update Name</th>
               </tr>";
               while($row = mysqli_fetch_assoc($result)){
                $output .= "<tr class = summary>
                            <td>$row[id]</td>
                            <td>$row[fname]</td>
                            <td>$row[lname]</td>
                            <td><button class= delete-btn data-dlt-id=$row[id]>Delete</button></td>
                            <td><button class= update-button data-updt-id=$row[id]>Update</button></td>
                            </tr>";
               }
    $output .= "</table>";         
    echo $output;
}else{
    echo "<h2>No result found</h2>";
}
?>