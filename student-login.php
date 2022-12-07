<?php
include 'databaseConnect.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
  
$user_ID = $_POST['studentID'];
$password = $_POST['Password'];
$sql = "SELECT * FROM STUDENTS AS S WHERE S.ID = '$user_ID' AND S.Password = '$password'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 1)
{
    $_SESSION["studentID"] = $user_ID;
    $_SESSION["Password"] = $password;
    $_SESSION['Submit'] = 'true';
    header("Location: studentloginpg.php");
}
else
{
    header("Location: studentlogin.php");
    
}

mysqli_close($conn);
?>
