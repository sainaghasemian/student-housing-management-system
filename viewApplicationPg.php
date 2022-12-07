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
        font-size: 30px;
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
    <h1>View Existing Housing Application</h1>
</header>

<body>
    
    <?php
    include 'databaseConnect.php';

    session_start();

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $user_ID = $_SESSION["studentID"];
    $result = mysqli_query($conn,"SELECT * FROM APPLICATIONS AS A WHERE A.studentID = $user_ID");
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

    $approved = "Approved";

    if ($row[10] == $approved){
        $result = mysqli_query($conn, "SELECT * FROM `Lives In` WHERE StudentID = '$user_ID'");
        $row1 = mysqli_fetch_array($result);
        $result = mysqli_query($conn, "SELECT * FROM ROOMS WHERE `Room#` = '$row1[1]' AND Building_Name = '$row1[2]'");
        $row1 = mysqli_fetch_array($result); 
        echo "Room #: ";
        echo $row1[0];
        echo " --- Building Name: ";
        echo $row1[1];
        echo " --- Rent Per Semester: $";
        echo $row1[2];
        echo " --- Number of Bathrooms: ";
        echo $row1[3];

        $result = mysqli_query($conn, "SELECT * FROM `Parks In` WHERE StudentID = '$user_ID'");
        $row1 = mysqli_fetch_array($result);
        $result = mysqli_query($conn, "SELECT * FROM `Parking Spots` WHERE Spot_Number = '$row1[0]' AND Lot_Number = '$row1[1]'");
        $row1 = mysqli_fetch_array($result); 

        echo " --- Parking Spot Number: ";
        echo $row1[0];
        echo " --- Parking Lot: ";
        echo $row1[1];
    }
        
    mysqli_close($conn);
        
    ?>

    
<body>        

<br>
<a href="viewHousingApps.php">Back</a>
<a href="logoutpg.php">Logout</a>
<br>
<html>
