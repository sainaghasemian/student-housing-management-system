<?php
include 'databaseConnect.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$user_ID = $_SESSION['studentID'];
$Advisor_ID = $_POST["Advisor_ID"];
$Appointment_ID = $_POST["Appointment_ID"];
$date = $_POST["Date"];
$time = $_POST["Time"];


$result = mysqli_query($conn, "SELECT * FROM APPOINTMENTS AS A WHERE A.Time = '$time' AND A.Appointment_ID='$Appointment_ID' AND A.Date='$Date' AND A.Advisor_ID='$Advisor_ID'");

 
$sql = "INSERT INTO APPOINTMENTS VALUES ('$Advisor_ID', '$Appointment_ID', $date', '$time')";
if(!mysqli_query($conn,$sql))
{
    echo "The time and date you have chosen is not avaliable, or you have already booked this appointment. ";
    echo "Please try a different date and time.";
}
echo "Mental Health Appointment has been booked successfully";

mysqli_close($conn);
echo '<br> <a href="bookMHapp.php">Back</a> <br>';
?>