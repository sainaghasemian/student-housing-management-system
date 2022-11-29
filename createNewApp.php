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
    <form action="createNewApp.php" method="post">
	Name: <input type="text" name="fandLName" required><br><br>
   	Year of Study: <input type="text" name="yearID" required><br><br>
    Postal Code: <input type="password" name="postalCode" required><br><br>
    Province: <input type="password" name="provinceID" required><br><br>
    Address: <input type="password" name="addressID" required><br><br>
   <input type="submit" value="Submit" />
   <input type="button" name = "Cancel" value="Cancel" onClick = "window.location='./viewHousingApps.php';"/>
	

</body>
</html>