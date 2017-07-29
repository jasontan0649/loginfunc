<?php  
$host = "localhost";
$rootsql = "user";
$db = "test";
$psw = "pass";

$con=mysqli_connect($host, $rootsql, $psw, $db);

if(!empty($_POST['username']) && !empty($_POST['password']))  
{  
	    $username = mysqli_real_escape_string($con, $_POST['username']);  
	    $password = mysqli_real_escape_string($con, $_POST['password']); 
	    $password2 = mysqli_real_escape_string($con, $_POST['password2']); 
	if ($password == $password2) 
	{
		
	     $checkusername = mysqli_query($con, "SELECT * FROM users WHERE username = '".$username."'");  
	       
	     if(mysqli_num_rows($checkusername) == 1)  
	     {  
	        echo "Username is taken. Please reload and try again";  
	     }  
	     else  
	     {  
	        $registerquery = mysqli_query($con, "INSERT INTO users (username, password) VALUES('".$username."', '".$password."')");  
	        if($registerquery)  
	        {  
	            echo "You had registered. Please go back to proceed.";  
	            echo '<form><input type="button" value="Go back" onclick="history.go(-2)"></input></form>';
	            exit();
	        }  
	        else  
	        {  
	            echo "MySQL Error";  
	        }         
	     }  
	}
	else
	{
	            echo "Please enter the same password.";    
	 
	}
}
else
{
	echo "<center><h1>Please fill in the information on below</center></h1>";
}
?>

<html>
<head>  
<title>Register</title>
</head>
<body>
<br>    <br> 
<form method="post" action="register.php" name="registerform" id="registerform">   
Username:<input type="text" name="username" id="username" /><br />  
Password:<input type="password" name="password" id="password" /><br />  
Reenter Password:<input type="password" name="password2" id="password2" /><br />  
<input type="submit" name="register" id="register" value="Register" />  
</form>
</body>
</html>
