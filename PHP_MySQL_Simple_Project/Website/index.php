<html>

<style type="style/css">
	body{
		text-align: center;
		padding-bottom: 100px;
		padding-top: 50px;
	}
	#footer {
	   position:fixed;
	   bottom:0;
	   width:100%;
	   height:60px;
	   background:#6cf;
	}
	header{
		position: absolute;
		top:0;
		width: 100%;
		height: 60px;
		background: #6af;
		padding-bottom: 20px;
	}
</style>

<header>
	<h1> University Housing Database System </h1>
</header>

<body>
<form action="add.php" method="post">
   Name: <input type="text" name="name"><br>
   E-mail: <input type="text" name="email"><br>
   <input type="submit" value="add">
</form>

</body>
</html>


