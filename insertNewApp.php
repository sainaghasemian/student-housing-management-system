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

mysqli_query($conn,"DELETE FROM APPLICATIONS WHERE StudentID = '$user'");

mysqli_query($conn, "INSERT INTO `Applications` (`StudentID`, `Year_of_Study`, `Postal_Code`, `Province`, `Country`, `StreetName`, `City`, `Fname`, `Minit`, `Lname`, `Status`) 
VALUES ('$user', '$YOS', '$postalCode', '$province', '$country', '$street', '$city', '$fName', '$mInit', '$lName', 'Submitted Pending Approval')");
  
header("Location: viewHousingApps.php");

mysqli_close($conn);
    
?>