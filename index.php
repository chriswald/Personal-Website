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
      <script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-33980453-1']);
	_gaq.push(['_trackPageview']);
	
	(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
      </script>
   </head>

   <body>
   <div class="topname">Chris</div>
   <div class="bottomname">Wald</div>
   <div class="content">
      <ul class="menu">
         <li onclick="location.href='resume.html'">R&eacute;sum&eacute;</li>
	 <li onclick="location.href='tools.html'">Tools</li>
         <li onclick="location.href='http://westerntime.chriswald.com'">Western Time</li>
         <li onclick="location.href='http://github.com/chriswald'">GitHub</li>
         <li onclick="location.href='http://www.linkedin.com/in/christopherwald'">LinkedIn</li>
         <li onclick="location.href='https://plus.google.com/u/0/107886694425709998733/about'">Google+</li>
         <li onclick="location.href='mailto:wald.j.chris@gmail.com'">Contact</li>
      </ul>
   </div>
   </body>
</html>
