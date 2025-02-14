<?php

if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['UserLogin'])){
    echo "Welcome ".$_SESSION['UserLogin'];
} else{
    echo "Welcome Guest";
}

include_once("connections/connection.php");
$con = connection();

$sql = "SELECT * FROM patient_list ORDER BY id DESC";
$patientlist = $con->query($sql) or die ($con->error);
$row = $patientlist->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Patient Registration System</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <h1>(PRS)Patient Registration Sytem</h1>
    <br/>
    <br/>

    <form action="result.php" method="get">
        <input type="text" name="search" id="search">
        <button type="submit">Search</button>
</form>


    <?php if(isset($_SESSION['UserLogin'])){?>
    <a href ="logout.php">Logout</a>
    <?php } else{ ?>

        <a href ="login.php">Login</a>
    <?php } ?>
    <a href ="add.php">Add New</a>
    <table>  
        <thead>
        <tr>
            <th></th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Middle Name</th>
            <th>Birthday</th>
            <th>Sex</th>
            <th>Date Added</th>
        </tr>
        </thead>
        <tbody>
        <?php do{ ?>
        <tr>
            <td><a href = "details.php?ID=<?php echo $row['id'];?>">View</a></td> 
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['last_name']; ?></td>
            <td><?php echo $row['middle_name']; ?></td>
            <td><?php echo $row['birthday']; ?></td>
            <td><?php echo $row['sex']; ?></td>
            <td><?php echo $row['added_at']; ?></td>
        </tr>
        <?php }while($row = $patientlist->fetch_assoc()) ?>
        </tbody>
    </table>
</body>
</html>