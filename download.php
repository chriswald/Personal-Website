<!DOCTYPE html>

<?php
   $title = "Chris Wald";
   $fname = "Christopher";
   $lname = "Wald";
?>

<html>
  <head>
    <?php include "head.php"; ?>
  </head>
  
  <body>
    <div class="page">
      <?php include "header.php"; ?>
      <?php include "aside.php"; ?>
      
      <div class="content">
      	Some of Chris's best products are available for download. You can find them here! You can find other projects and view their source on <a href="https://github.com/event44" target="_blank">GitHub</a>.<br><br>
	<span id="ink" class="h1">Ink</span><span class="dllink"><a href="https://play.google.com/store/apps/details?class=com.destructorlabs.ink" target="_blank">Link</a></span><br>
	<div class="description">Ink is an Android app available on Google Play. It's objective is to fit geometric shapes to user drawing. It analyzes points along a path that the use draws to determine the best location for corners.</div><br>
	<span id="ft" class="h1">Freedom Tracker</span><span class="dllink"><a href="http://dl.dropbox.com/u/4111992/FreedomTracker.jar">Link</a></span><br>
	<div class="description">Freedom Tracker is program designed to help a group of friends keep track of each other's class schedules. It downloads and updated schedule from a public dropbox account every time run.</div><br>
	<span id="ftc" class="h1">Freedom Tracker Compile</span><span class="dllink"><a href="http://dl.dropbox.com/u/4111992/fc.jar" target="_blank">Link</a></span><br>
	<div class="description">Freedom Tracker Compile is the administrative tool used to generate the schedule file which Freedom Tracker downloads.</div>
      </div>
      <?php include "footer.php"; ?>
    </div>
    <?php include "altfoot.php"; ?>
  </body>
</html>
