<?php  
$con = mysqli_connect("localhost", "root", "", "social"); //Connection variable

if(mysqli_connect_errno()) 
{
	echo "Failed to connect: " . mysqli_connect_errno();
}

?>

<html>
<head>
	<title>Welcome to</title>
</head>
<body>
	
	<div style="text-align: center;">
		<img src="welcome2.jpg" height="auto" width="600"  >
	</div>
     <div>
      <p style="color: #14C800;"> Basic profile info
How to use basic profile fields
Use these instructions to get familiar with all the basic information on your profile page. This page includes explanations for all the default fields that are built into your ThoughtFarmer intranet, though your intranet administrator may have created more profile fields, customized to your company.

View your profile
To see your profile page, folllow these steps:
From any page on the intranet, click on your name or profile photo in the top right corner on the Application Toolbar.
In the dropdown menu that opens, click on your name to go to your profile page.	</p>
      


     </div>
</body>
</html>