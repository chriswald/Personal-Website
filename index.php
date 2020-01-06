<?php
	include_once("detectmobilebrowser.php");
	$detect = new Mobile_Detect;
	if ($detect->isMobile())
	{
		$location = "mobile.php";
		if ($_GET["f"])
		{
			$location .= $_GET["f"];
		}
		header("Location: " . $location);
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Chris Wald</title>
		<link rel="stylesheet" href="style/landingstyle.css" type="text/css">
	</head>

	<body>
		<div class="topname">Chris</div>
		<div class="bottomname">Wald</div>
		<div class="content">
			<ul class="menu">
				<li onclick="location.href='resume.html'">R&eacute;sum&eacute;</li>
				<li onclick="location.href='tools.html'">Tools</li>
				<li onclick="location.href='http://westerntime.chriswald.com'">Western Time</li>
				<li onclick="location.href='https://gogs.chriswald.com/chriswald'">Projects</li>
				<li onclick="location.href='http://www.linkedin.com/in/christopherwald'">LinkedIn</li>
				<li onclick="location.href='mailto:wald.j.chris@gmail.com'">Contact</li>
			</ul>
		</div>
	</body>
</html>
