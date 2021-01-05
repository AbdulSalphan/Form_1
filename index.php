<html>
    <head>
        <title>Php form</title>
    </head>
    <body>
        <form action="" method="POST" enctype = "multipart/form-data">
            <p>roll number: <input type="text" name="rollno" value=""/></p>
            <p>first name: <input type="text" name="firstname" value=""/></p>
            <p>last name: <input type="text" name="lastname" value=""/></p>
            <p>picture: <input type="file" name="uploads"></p>
            <input type="submit" name="submit" value="submit"/>
        </form>
    </body>
<?php
include 'database.php';
if(isset($_POST["submit"]))
{
$dbname = "user";
$roll_no = $_POST['rollno'];
$f_name  = $_POST['firstname'];
$l_name  = $_POST['lastname']; 
$filename = $_FILES["uploads"]["name"];
$temp = $_FILES["uploads"]["tmp_name"];
$image = "Images/".date('Y_M_d_H_i_s')."_".$filename;
move_uploaded_file($temp, $image);
if ($f_name == $l_name) {
  echo  "First name can't be last name";
} else {
    echo "Full Name is $f_name $l_name";
}
$sql = "INSERT INTO user_t(roll_no, first_name,last_name, picture, org_name) values('$roll_no','$f_name','$l_name','$image','$filename')";
if ($conn->query($sql) === TRUE) {
  echo "<br>New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}
include 'Database_table.php';
?>
</html>