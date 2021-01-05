<?php

$sql1 = "SELECT roll_no, first_name, last_name, picture FROM user_t";
$result = $conn->query($sql1);
?>
<html>
    <table>
        <tr>
            <th>roll_no</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>picture</th>
            <th>operation</th>
            <th>download</th>
        </tr>
        <?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>".$row["roll_no"]."</td><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td>    
        <td>"."<br><img src='".$row['picture']."' height = '40' width = '40'>". "</td>
        <td><a href = 'update.php?rn=$row[roll_no]'>Edit/<a href = 'delete.php?rn=$row[roll_no]' onclick='returncheckdelete()'>Delete</td>
        </tr>";
    }
} else {
    echo "No records found";
}
//<td><a href = 'index.php/$image as $filename' download>Download</td>
?>
    </table>    
 </html>