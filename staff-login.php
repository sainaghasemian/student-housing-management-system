<?php
include 'databaseConnect.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$employee_ID = $_POST['employeeID'];
$password = $_POST['Password'];
if (isset($_POST['admin'])) {
    echo "here";
    $sql = "SELECT * FROM ADMINISTRATORS AS A WHERE A.EmployeeID = '$employee_ID' AND A.Password = '$password'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1)
    {
        $_SESSION["emloyeeID"] = $employee_ID;
        $_SESSION["Password"] = $password;
        $_SESSION['Login As Administrator'] = 'true';
        header("Location: adminloginpg.php");
    }
    else
    {
        header("Location: stafflogin.php");
        
    }
}
else if (isset($_POST['mhadvisor'])) {
    $sql = "SELECT * FROM `Mental Health Advisors` AS M WHERE M.EmployeeID = '$employee_ID' AND M.Password = '$password'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1)
    {
        $_SESSION["emloyeeID"] = $employee_ID;
        $_SESSION["Password"] = $password;
        $_SESSION['Login As Mental Health Advisor'] = 'true';
        header("Location: MHAdvisor_loginpg.php");
    }
    else
    {
        header("Location: stafflogin.php");
        
    }
}

mysqli_close($conn);
?>
