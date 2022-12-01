<?php
include 'databaseConnect.php';

if (mysqli_connect_errno($conn))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


$user_ID = $_POST['studentID'];
$password = $_POST['Password'];
$sql = "SELECT * FROM STUDENTS AS S WHERE S.ID = '$user_ID' AND S.Password = '$password'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 1)
{
    $_SESSION["studentID"] = $user_ID;
    $_SESSION['Submit'] = 'true';
    header("Location: studentloginpg.php");

}
else{
    header("Location: index.php");
}

mysqli_close($conn);
?>
