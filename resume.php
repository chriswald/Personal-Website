<!DOCTYPE html>

<!--Oh, you're reading the source! That's great, because reading the source is a good way to learn what was done to get a site to look and act the way it does. In this case it's also a good way to learn a little more about me and get some more background information on what was provided in my r&eacute;sum&eacute;. Think of it as behind-the-scenes access for the inquisitive.-->

<?php
   $title = "Chris Wald";
   $fname = "Christopher";
   $lname = "Wald";
?>

<html>
  <head>
    <?php include 'head.php'; ?>
  </head>

  <body>
    <div class="page">
      <?php include "header.php"; ?>
      <?php include "aside.php"; ?>
      
      <div class="content">
	<em id="objective">objective</em><br>
	To build a forward-looking career in the software industry by utilizing my education and experience while making industry connections and relationships.<br>
	<br>
	<em id="education">education</em><br>
	Studying Software Engineering<span class="date">Sep. 2012 - present</span><br>
	<div class="li">University of Wisconsin - Platteville</div>
	Courses taken include:
	<div class="li"><span class="liem">Object Oriented Programming & Data Structures 1</span> - An introduction to many container objects and good practices including effective code commenting. Taught in Java.</div>
	<div class="li"><span class="liem">Introduction to Software Engineering</span> - A general overview of Software Engineering as a career. Used the waterfall model to develop a semester-long game assignment with a group. Also discussed ethics in software engineering, time tracking, and SVN.</div>
	<div class="li"><span class="liem">Computer Architecture & Operating Systems</span> - Computer Architecture portion taught the Assembly (Intel 8086) language. Operating Systems portion taught concurrency and thread synchronization in Java. Topics included semaphores, several aspects of deadlock, and mutual exclusion.</div>
	<br>
	<!--These are among the best of my creations. I have many more on my GitHub page. If you're looking for something in a certain language and can't find it there just ask me. I may be able to find an example to share with you.-->
	<em id="projects">projects</em><span class="date"><a href="https://github.com/event44" title="Event44 on GitHub" target="_blank" style="color:inherit;">See more and view source on GitHub</a></span><br>
	<a href="https://play.google.com/store/apps/details?class=com.destructorlabs.ink" title="Google Play" target="_blank">Ink</a><span class="date">July 2011</span><br>
	<div class="li">Java and XML based Android application</div>
	<div class="li">Fits shapes to a user's drawings by analyzing points and slopes</div>
	Scheduler<span class="date">January 2012</span><br>
	<div class="li">Web/Server based</div>
	<div class="li">Allows students to view and compare weekly class schedules.</div>
	<div class="li">Used for determining blocks of shared free time amongst a group.</div>
	Periodic<span class="date">September 2009</span><br>
	<div class="li">Searchable Periodic table</div>
	<div class="li">Information-rich program for aiding entry level chemistry students.</div>
	<br>
	<!--I know many more than just these, and can learn just about any other program quickly.-->
	<em id="progrmas">programs</em><br>
	Eclipse, Git, SVN, NetBeans, Emacs, Linux, IBM Rational Rose, Microsoft Office, Visual Studio, GIMP, Paint.net, Audacity<br><br>
	<em id="competitions">competitions</em><br>
	ACM International Collegiate Programming Contest<span class="date">November 2011</span><br>
	Google Code Jam<span class="date">April 2012</span><br>
	<br>
	<!--Sure I work at a factory, but I try to not let that get me down. I use the skills I've gained in my classes and my own experience to help fix some of the machines that break.-->
	<em id="employment">employment</em><br>
	<a href="http://www.broan-nutone.com" title="Broan-NuTone Home" target="_blank">Broan-NuTone</a><span class="date">Summers, 2011 - present</span><br>
	<div class="li"><span class="liem">Assembly Line</span> - Working in assembly but using skills learned to diagnose equipment and improve workflow.</div><br>
	<!--I was a competative swimmer for seven years and decided that with the amount of time I spend in and near water I should take a lifeguarding class. I like to be prepared for whatever comes.--> 
	<em id="certification">certifications</em><br>
	American Red Cross:<br>
	<span class="li">CPR - AED for Lifeguards</span><span class="date">July 2011 - July 2013</span><br>
	<span class="li">Lifeguarding/First Aid</span><span class="date">July 2011 - July 2014</span><br>
      </div>
      <?php include "footer.php"; ?>
    </div>
    <?php include "altfoot.php"; ?>
  </body>
</html>
