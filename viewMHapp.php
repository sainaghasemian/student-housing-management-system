<?php
include 'databaseConnect.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = mysqli_query($conn,"SELECT * FROM APPOINTMENTS");
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
    echo "<td>" . $row['Advisor_ID'] "</td>";
    echo "<td>" . $row['Appointment_ID'] "</td>";
    echo "<td>" . $row['Date'] "</td>";
    echo "<td>" . $row['Time'] "</td>";
    echo "<td>" . $row['Student_ID'] "</td>";
    echo "</tr>";
            
}

echo"</table>";

    
mysqli_close($conn);
    
?>