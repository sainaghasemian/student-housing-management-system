<?php
include 'databaseConnect.php';

session_start();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = $_SESSION['studentID'];
$status = $_POST["status"];

$result = mysqli_query($conn,"SELECT * FROM APPLICATIONS WHERE StudentID = '$user'");

$row = mysqli_fetch_array($result);

$YOS = $row[1];
$postalCode = $row[2];
$province = $row[3];
$country = $row[4];
$streetName = $row[5];
$city = $row[6];
$fName = $row[7];
$mInit = $row[8];
$lName = $row[9];

mysqli_query($conn,"DELETE FROM APPLICATIONS WHERE StudentID = '$user'");

$building;

if ($status == "A"){
    mysqli_query($conn, "INSERT INTO `Applications` (`StudentID`, `Year_of_Study`, `Postal_Code`, `Province`, `Country`, `StreetName`, `City`, `Fname`, `Minit`, `Lname`, `Status`) 
    VALUES ('$user', '$YOS', '$postalCode', '$province', '$country', '$street', '$city', '$fName', '$mInit', '$lName', 'Approved')");
    
    $result = mysqli_query($conn, "SELECT * FROM ROOMS");
    while (true){
        $row = mysqli_fetch_array($result);
        $result2 = mysqli_query($conn, "SELECT * FROM `Lives In` WHERE `Room#` = '$row[0]' AND Building_Name = '$row[1]'");
        if (mysqli_num_rows($result2) != $row[4]){
            mysqli_query($conn, "INSERT INTO `Lives In` (`StudentID`, `Room#`, `Building_Name`) VALUES ('$user', '$row[0]', '$row[1]')");
            $building = $row[1];
            break;
        }
    }

    $result = mysqli_query($conn, "SELECT * FROM `Parking Spots`");
    while (true){
        $row = mysqli_fetch_array($result);
        $result2 = mysqli_query($conn, "SELECT * FROM `Parks In` AS PI, `Parking Lots` AS PL WHERE PI.Spot_Number = '$row[0]' AND PI.Lot_Number = '$row[1]' AND PI.Lot_Number = PL.LotNumber AND PL.Building_Name = '$building'");
        if (mysqli_num_rows($result2) == 0){
            mysqli_query($conn, "INSERT INTO `Parks In` (`Spot_Number`, `Lot_Number`, `StudentID`) VALUES ('$row[0]', '$row[1]', '$user')");
            break;
        }
    }
}
else{
    mysqli_query($conn, "INSERT INTO `Applications` (`StudentID`, `Year_of_Study`, `Postal_Code`, `Province`, `Country`, `StreetName`, `City`, `Fname`, `Minit`, `Lname`, `Status`) 
    VALUES ('$user', '$YOS', '$postalCode', '$province', '$country', '$street', '$city', '$fName', '$mInit', '$lName', 'Declined')");
}

header("Location: adminloginpg.php");

?>