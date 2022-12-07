<html>
<style type="text/css">
    body{
        text-align: left;
        padding-bottom: 100px;
        background: #F6F3E7;
        padding-top: 120px;
        font-size: 20px;
        color: #755E4A;
    }
    header{
        margin-top: -120;
        padding: -50px;
        font-size: 50px;
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
    <h1>Add Availability Page</h1>
</header>

<body>
    <h2>Add New Availability Of Appointments For Students To Book In<h2>
    <h3>Enter The Date[DD/MM/YYYY] And Time[00:00AM/PM - 00:00AM/PM] You Wish To Open Availability<h3> 
    
    <?php
    include 'databaseConnect.php';

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $result = mysqli_query($conn,"SELECT * FROM APPOINTMENTS AS A WHERE A.Student_ID IS NULL");
    echo "<table border= '1'>
    <tr> 
    <th> Advisor Id</th>
    <th> Appointment ID</th>
    <th> Date</th>
    <th> Time</th>
    <th> Student ID</th>
    </tr>";

    while($row = mysqli_fetch_array($result)) 
    {
        echo "<tr>";
        echo "<td>" . $row[0] . "</td>";
        echo "<td>" . $row[1] . "</td>";
        echo "<td>" . $row[2] . "</td>";
        echo "<td>" . $row[3] . "</td>";
        echo "<td>" . $row[4] . "</td>";
        echo "</tr>";
                
    }

    echo"</table>";

        
    mysqli_close($conn);
        
    ?>

    
<body>        

<form action="MHAdvisor_addAvailablitySQL.php" method="post">
    Date: <input type="text" name="Date" min="7/12/2022" required><br>
    Time: <input type="text" name="Time" required><br>
    <input type="submit" value="Enter New Availablity">
</form>
<br>
<a href="MHAdvisor_loginpg.php">Back</a>
<a href="logoutpg.php">Logout</a>
<br>
<html>
