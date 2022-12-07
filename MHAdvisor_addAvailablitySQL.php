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
$student_ID = $_POST['studentID']; 


mysqli_query($conn,"DELETE FROM APPLICATIONS WHERE DateN = '$date'");
echo "why me";
mysqli_query($conn, "INSERT INTO `Appointments` ('Advisor_ID','Appointment_ID`, 'DateN', 'TimeN', 'studentID') 
VALUES ('$advisorID', '$appointmentID', '$date', '$time', '$student_ID', 'New appointment has been successfully added.')");

mysqli_close($conn);
    
?>