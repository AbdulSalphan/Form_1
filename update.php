<?php
include ('database.php');
error_reporting(0);
//$sql = "select roll_no as 'roll number:', first_name as 'first name:', last_name as 'last name:' from table user_t";
$rn = $_GET['rn'];
$sql = "select * from user_t where roll_no = '$rn'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
//print_r($row);
?>
<html>
    <head>
        <title>Php form</title>
    </head>
    <body>
        <form action="" method="POST">
            <input type="hidden" name="roll_no" value="<?php echo $row['roll_no'] ?>"/>
            <p>first name: <input type="text" name="firstname" value="<?php echo $row['first_name'] ?>"/></p>
            <p>last name: <input type="text" name="lastname" value="<?php echo $row['last_name']?>"/></p>
            <input type="submit" name="submit" value="submit"/>
        </form>
    </body>
</html>    
<?php

if($_POST[submit])
{
    $roll_no = $_POST['roll_no'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
$sql = "UPDATE user_t SET first_name='$firstname',last_name='$lastname' WHERE roll_no = '$roll_no'";    

$data = mysqli_query($conn,$sql);

if($data)
{
    echo "<script>alert('Record updated')</script>";
}    
else
{
    echo "Failed to update record";
}
}
include 'Database_table.php';
?>