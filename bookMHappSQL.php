<?php
include 'databaseConnect.php';

session_start();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$advisorID = $_POST["Advisor_ID"];
$appointmentID = $_POST["Appointment_ID"];
$date = $_POST["DateN"];
$time = $_POST["TimeN"];
$user_ID = $_SESSION['studentID']; 

mysqli_query($conn, "DELETE FROM APPOINTMENTS WHERE Appointment_ID = '$appointmentID'");

mysqli_query($conn, "INSERT INTO `Appointments` ('Advisor_ID','Appointment_ID`, 'DateN', 'TimeN', 'studentID') 
VALUES ('$advisorID', '$appointmentID', '$date', '$time', '$user_ID', 'Mental Health Appointment has been booked successfully')");

mysqli_close($conn);
echo '<br> <a href="bookMHapp.php">Back</a> <br>';
?>