<?php
include 'databaseConnect.php';

session_start();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$fName = $_POST["fName"];
$mInit = $_POST["mInit"];
$lName = $_POST["lName"];
$YOS = $_POST["yearID"];
$postalCode = $_POST["postalCode"];
$city = $_POST["city"];
$province = $_POST["provinceID"];
$country = $_POST["country"];
$street = $_POST["streetName"];
$user = $_SESSION['studentID'];

echo $fName;
echo $mInit;
echo $lName;
echo $YOS;
echo $postalCode;
echo $city;
echo $province;
echo $country;
echo $street;
echo $user;

$result = mysqli_query($conn,"SELECT * FROM APPOINTMENTS AS A WHERE A.Student_ID IS NULL");

    
mysqli_close($conn);
    
?>