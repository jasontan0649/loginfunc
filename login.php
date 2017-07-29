<?php
$host = "localhost";
$rootsql = "user";
$db = "test";
$psw = "pass";

$con=mysqli_connect($host, $rootsql, $psw, $db);

if (isset($_POST["username"])) {
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$sql ="SELECT * FROM users WHERE username='".$user."' AND password='".$pass."'LIMIT 1";
	$result = mysqli_query($con, $sql);
	if (mysqli_num_rows($result)==1) {
		echo "You had logged in!!!";
		echo '"<a href="website">Click Here To Proceed</a>"';
		exit();
	}else {
		echo "You had entered incorrect password or username";
	}
}
?>

<html>
<head>
<title>Log In</title>
</head>
<body>
<center><h1 style="font-family:Arial;">Log In</h1></center>
<form method="post" action="login.php">
Username:<input type="text" name="username"></br>
Password:<input type="password" name="password"></br>
<input type="submit" name="submit" value="Log In">
</form>
<p>Register <a href=\register.php\>click here</a></p>
</body>
</html>
