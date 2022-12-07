<?php
include 'databaseConnect.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$advisorID = $_POST["Advisor_ID"];
$appointmentID = $_POST["Appointment_ID"];
$date = $_POST["Date"];
$time = $_POST["Time"];
$user_ID = $_SESSION['studentID']; 

$result = mysqli_query($conn, "SELECT * FROM APPOINTMENTS AS A WHERE A.Advisor_ID = '$advisorID' AND A.Appointment_ID='$appointmentID' AND A.Date='$date' AND A.Time='$time' AND A.Student_ID IS NULL");

$sql1 = "DELETE FROM APPOINTMENTS WHERE ('$advisorID', '$appointmentID', '$date', '$time')";

$sql = "INSERT INTO APPOINTMENTS VALUES ('$advisorID', '$appointmentID', '$date', '$time', $user_ID')";
    
echo "Mental Health Appointment has been booked successfully";


echo "The appointment you have chosen is not avaliable, or you have already booked this appointment. ";
echo "Please try a different appointment date and time.";

mysqli_close($conn);
echo '<br> <a href="bookMHapp.php">Back</a> <br>';
?>