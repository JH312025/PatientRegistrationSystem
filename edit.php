<?php

include_once("Connections/connection.php");
$con = connection();
$id = $_GET['ID']; 

$sql = "SELECT * FROM patient_list WHERE id = '$id'";
$patientlist = $con->query($sql) or die ($con->error);
$row = $patientlist->fetch_assoc();

if(isset($_POST['submit'])){

    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $mname = $_POST['middlename'];
    $bday = $_POST['birthday'];
    $sex = $_POST['sex'];

    $sql = "UPDATE patient_list SET first_name = '$fname', last_name = '$lname', middle_name = '$mname', birthday = '$bday', sex = '$sex' WHERE id = '$id'";

    $con->query($sql) or die ($con->error);

    echo header ("Location: details.php?ID=".$id);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form action="" method="post">
        <label>First Name</label>
        <input type="text" name="firstname" id="firstname" value ="<?php echo $row['first_name'];?>">
       
        <label>Last Name</label>
        <input type="text" name="lastname" id="lastname" value ="<?php echo $row['last_name'];?>">

        <label>Middle Name</label>
        <input type="text" name="middlename" id="middlename" value ="<?php echo $row['middle_name'];?>">

        <label>Birthday</label>
        <input type="varchar" name="birthday" id="birthday" value ="<?php echo $row['birthday'];?>">

        <label>Sex</label>
    <select name="sex" id="sex">
    <option value="Male" <?php echo ($row['sex'] == "Male")? 'Selected' : '';?>>Male </option>
    <option value="Female" <?php echo ($row['sex'] == "Female")? 'Selected' : '';?>>Female </option>
    </select>


    <input type="submit" name="submit" value="Update">

</form>

    <a href = "index.php"> Back </a>
</body>
</html>