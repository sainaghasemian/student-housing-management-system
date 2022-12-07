<?php

include 'databaseConnect.php';

session_start();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$appointmentID = $_POST["appointmentID"];

$result = mysqli_query($conn, "SELECT * FROM APPOINTMENTS WHERE Appointment_ID = '$appointmentID'");

$row = mysqli_fetch_array($result);

$advisorID = $row[0];
$date = $row[2];
$time = $row[3];
$user_ID = $_SESSION['studentID'];


mysqli_query($conn, "DELETE FROM APPOINTMENTS WHERE Appointment_ID = '$appointmentID'");

mysqli_query($conn, "INSERT INTO `Appointments` (`Advisor_ID`,`Appointment_ID`, `Date`, `Time`, `Student_ID`) 
VALUES ('$advisorID', '$appointmentID', '$date', '$time', '$user_ID')");

mysqli_close($conn);

header("Location: appointmentsMainPg.php");
?>