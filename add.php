<?php

include_once("Connections/connection.php");
$con = connection();

if(isset($_POST['submit'])){

    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $mname = $_POST['middlename'];
    $bday = $_POST['birthday'];
    $sex = $_POST['sex'];

    $sql = "INSERT INTO `patient_list`(`first_name`, `last_name`,`middle_name`, `birthday`, `sex`) VALUES ('$fname','$lname','$mname','$bday','$sex')";
    $con->query($sql) or die ($con->error);

    echo header ("location: index.php");
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
        <input type="text" name="firstname" id="firstname">
       
        <label>Last Name</label>
        <input type="text" name="lastname" id="lastname">

        <label>Middle Name</label>
        <input type="text" name="middlename" id="middlename">

        <label>Birthday</label>
        <input type="varchar" name="birthday" id="birthday">

        <label>Sex</label>
    <select name="sex" id="sex">
        <option value = "Male">Male</option>
        <option value = "Female">Female</option>
    </select>


    <input type="submit" name="submit" value="Submit Patient">

</form>

    <a href = "index.php"> Back </a>
</body>
</html>