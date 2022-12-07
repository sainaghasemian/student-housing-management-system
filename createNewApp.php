<html>
<style type="text/css">
	body{
		text-align: left;
		padding-bottom: 100px;
		background: #F6F3E7;
		padding-top: 120px;
	}
	header{
        margin-top: -180;
  		padding: -50px;
        text-align: center;
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
	<h1>Create New Application</h1>
</header>
<body>
    <h2> New Student Housing Application <h2>
    <form action="insertNewApp.php" method="post">
	First name: <input type="text" name="fName" required><br><br>
	Middle initial: <input type="text" name="mInit" required><br><br>
	Last name: <input type="text" name="lName" required><br><br>
   	Year of Study: <input type="text" name="yearID" required><br><br>
    Postal Code: <input type="text" name="postalCode" required><br><br>
	City: <input type="text" name="city" required><br><br>
    Province: <input type="text" name="provinceID" required><br><br>
	Country: <input type="text" name="country" required><br><br>
    Street name: <input type="text" name="streetName" required><br><br>
   <input type="submit" value="Submit" />
   <input type="button" name = "Cancel" value="Cancel" onClick = "window.location='./viewHousingApps.php';"/>
	

</body>
</html>