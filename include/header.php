<?php
	// Starting session
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>att.com</title>
	<link rel="icon" href="images/siteicon.png">
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<?php
		include("include/validation.php");
	?>
</head>
<body>
	<div class="top">
		<div>
			<a href="#">Personal</a>
			<a href="#">Business</a>
			<a href="#">Investors</a> 
		</div>
	</div>

	<div class="head">
		<div>
			<a href="index.php"><img src="images/title_logo.png"></a>
		</div>
	</div>

	<div class="menu">
		<div>
			<ul>
				<li><a href="services.php">Services</a></li>
				<li><a href="coverage.php">Network</a></li>
				<li><a href="help.php">Help</a></li>
				
				<?php
				 if(isset($_SESSION["id"])==session_id())
				 {
				 	$nam =$_SESSION["s_name"];
				 	$status = $_SESSION["s_status"];
				 	echo "<li><a href='logout.php'>Logout</a></li>";
				 	echo "<li><a href='userpage.php'><font color='#63686b'>$nam</font></a></li>";
				 }
				 else
				 {
				 	echo"<li><a href='login.php'>Login</a></li>";
				 }
				?>
			</ul>
		</div>
	</div>
