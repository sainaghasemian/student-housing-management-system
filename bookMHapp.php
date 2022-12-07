<?php
include 'databaseConnect.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
<html>
<style type="text/css">
    body{
        text-align: center;
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
    <h1>Book A New Mental Health Appointment</h1>
</header>

<body>        
<form action="bookMHappSQL.php" method="post">
    Advisor ID: <input type="number" name="advisorID" required><br>
    Appointment ID: <input type="number" name="appointmentID" required><br>
    Date: <input type="date" name="Date" required><br>
    Time: <input type="time" name="Time" min="9:00AM" max="4:00PM" required><br>
    <input type="submit" value="Book This Appointment">
</form>
<br>
<a href="appointmentsMainPg.php">Back</a>
<br>
<html>



