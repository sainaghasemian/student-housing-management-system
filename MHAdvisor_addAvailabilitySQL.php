<?php
include 'databaseConnect.php';

session_start();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$time = $_POST["Time"];
$date = $_POST["Date"];
$advisorID = $_SESSION["employeeID"];


$result = mysqli_query($conn, "SELECT * FROM APPOINTMENTS WHERE Advisor_ID = '$advisorID' AND Time = '$time' AND Date = '$date'");
if (mysqli_num_rows($result) > 0){ 
    header("Location: MHAdvisor_addAvailability.php");
}

else{
    mysqli_query($conn, "INSERT INTO `Appointments` (`Advisor_ID`, `Date`, `Time`) 
    VALUES ('$advisorID', '$date', '$time')");
    header("Location: MHAdvisor_loginpg.php");
}

mysqli_close($conn);

?>