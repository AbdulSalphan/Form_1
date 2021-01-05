<?php
include ('database.php');

$roll_no = $_GET['rn'];
$query = "delete from user_t where roll_no = '$roll_no'";
        
$data = mysqli_query($conn, $query);
if($data)
{
    echo "Record deleted successfully";
}
 else   
 {
     echo "Record can't be deleted";
 }
 include 'Database_table.php';
?>