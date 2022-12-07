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

$result = mysqli_query($conn, "SELECT * FROM APPOINTMENTS AS A WHERE A.Time = '$time' AND A.Appointment_ID='$appointmentID' AND A.Date='$Date' AND A.Advisor_ID='$advisorID'");

if(mysqli_num_rows($result) == 1)
{   
    $sql = "INSERT INTO APPOINTMENTS VALUES ('$advisor_ID', '$appointmentID', $date', '$time', '$user_ID')";
    if(!mysqli_query($conn,$sql))
    {
        die('Error');
    }
    echo "Mental Health Appointment has been booked successfully";
}
else
{
    echo "The time and date you have chosen is not avaliable, or you have already booked this appointment. ";
    echo "Please try a different date and time.";
}
mysqli_close($conn);
echo '<br> <a href="bookMHapp.php">Back</a> <br>';
?>