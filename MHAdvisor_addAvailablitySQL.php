<?php
include 'databaseConnect.php';

session_start();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$result = mysqli_query($conn, "SELECT * FROM APPOINTMENTS WHERE TimeN = '$time'");
echo "k";
echo "$time";
echo "k";
$row = mysqli_fetch_array($result);


$advisorID = $_SESSION["Advisor_ID"];
$date = $row[2];
$time = $row[3];
$student_ID = $row[4];

mysqli_query($conn, "INSERT INTO `Appointments` ('Advisor_ID','Appointment_ID`, 'DateN', 'TimeN', 'studentID') 
VALUES ('$advisorID', '$appointmentID', '$date', '$time', '$student_ID', 'New appointment has been successfully added.')");

mysqli_close($conn);

?>