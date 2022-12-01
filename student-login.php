<?php
include './databaseConnect.php'

session_start();
$con=OpenCon();
if(mysqli_connect_errno($con))
{
    echo "Failed connection to: " .mysqli_connect_error();
}

$ID = $_POST['studentID'];
$password = $_POST['Password'];
$sql = "SELECT * FROM STUDENTS AS S WHERE S.ID = '$ID' AND S.Password = '$password'";
$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result) == 1)
{
    $_SESSION["studentID"] = $ID;
    $_SESSION['Submit'] = 'true';
    header("Location: studentloginpg.php");

}
else{
    header("Location: studentlogin.php");
}

mysqli_close($con);
?>
