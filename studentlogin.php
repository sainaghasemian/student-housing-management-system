<html>
<style type="text/css">
	body{
		text-align: center;
		padding-bottom: 100px;
		background: #F6F3E7;
		padding-top: 120px;
	}
	header{
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
	<h1> Student Login</h1>
</header>

<body>
	<form action="stafflogin.php" method="post">
   Student ID: <input type="text" name="studentID" required><br><br>
   Password: <input type="password" name="Password" required><br><br>
   <input type="submit" value="Submit" />
   <input type="button" name = "Cancel" value="Cancel" onClick = "window.location='./index.php';"/>
</form>
<tr>
		<th><a href="studentloginpg.php"><button>Submit</button></a></th>
<tr>

</body>
</html>
