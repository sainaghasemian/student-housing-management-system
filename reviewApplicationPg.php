<html>
<style type="text/css">
    body{
        text-align: left;
        padding-bottom: 100px;
        background: #ffffff;
        padding-top: 120px;
        font-size: 15px;
        color: #755E4A;
    }
    header{
        margin-top: -120;
        padding: -50px;
        font-size: 20px;
        font-weight: 50;
        background-image: linear-gradient(to left, #feaf7f, #b393d3);
        color: transparent;
        background-clip: text;
        -webkit-background-clip: text;
    }   
    input{
        font-size: 23px;
        font-weight: 90;
        background-color: #f7e6d9;
        box-shadow: 0 0 0 2px #DEB8A0;
        transition: all .9s ease;
        align: top;
    }
</style>
<header>
    <h1>Review Students Housing Applications</h1>
</header>

<body>
    
    <?php
    include 'databaseConnect.php';

    session_start();

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $result = mysqli_query($conn,"SELECT * FROM APPLICATIONS WHERE Status = 'Submitted Pending Approval'");
    
    if (mysqli_num_rows($result) == 0){
        header("Location: noApplications.php");
    }
    
    echo "<table border= '1'>
    <tr> 
    <th> Student Id</th>
    <th> Year of Study</th>
    <th> Postal Code</th>
    <th> Province</th>
    <th> Country</th>
    <th> Street Name</th>
    <th> City</th>
    <th> First Name</th>
    <th> Middle Initial</th>
    <th> Last Name</th>
    <th> Status</th>
    </tr>";

    $row = mysqli_fetch_array($result);

    $_SESSION['studentID'] = $row[0];

    echo "<tr>";
    echo "<td>" . $row[0] . "</td>";
    echo "<td>" . $row[1] . "</td>";
    echo "<td>" . $row[2] . "</td>";
    echo "<td>" . $row[3] . "</td>";
    echo "<td>" . $row[4] . "</td>";
    echo "<td>" . $row[5] . "</td>";
    echo "<td>" . $row[6] . "</td>";
    echo "<td>" . $row[7] . "</td>";
    echo "<td>" . $row[8] . "</td>";
    echo "<td>" . $row[9] . "</td>";
    echo "<td>" . $row[10] . "</td>";
    echo "</tr>";

    echo"</table>";

        
    mysqli_close($conn);
        
    ?>

    <h2>Enter "A" or "D" in the text box below to accept or decline the application, respectively.<h2>
    <form action="changeAppStatus.php" method="post">
    Accept/Decline: <input type="text" name="status" required><br><br>
    <input type="submit" value="Submit" />
<body>
<br>
<a href="adminloginpg.php">Back</a>
<a href="logoutpg.php">Logout</a>
<br>
<html>