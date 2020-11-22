<!DOCTYPE html>
<html>
<head>
	<title>login</title>

</head>
<body>




<?php

$con = mysqli_connect("localhost", "root", "", "social"); //Connection variable

if(mysqli_connect_errno()) 
{
	echo "Failed to connect: " . mysqli_connect_errno();
}


if (isset($_POST['login'])) {
	
     $email=$_POST['log_email'];
     $pass=md5($_POST['log_password']);
     
if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
    
    $e_check= mysqli_query($con, "SELECT email FROM users WHERE email='$email'");
    $num_rows= mysqli_num_rows($e_check);
    //echo $num_rows."<br>";
    
    if ($num_rows==1) {
      $p_check=mysqli_query($con, "SELECT password FROM users WHERE password='$pass' AND email='$email'");
    	$num_row_pass=mysqli_num_rows($p_check);
    	//echo $num_row_pass."<br>";
    	if ($num_row_pass==1)
    	{
    		header("location:index.php");
    	}

    	else{
    		echo "wrong password!!!";
    	}
    }
     else
     	echo" you don not register your account";


} 
   else
       echo "Invalid Email";
}






?>





<form method="POST">
		<input type="email" name="log_email" placeholder="email">
		<br>
		<input type="password" name="log_password" placeholder="Password">
		<br>
		<input type="submit" name="login" value="Login">
		

	</form>
</body>
</html>