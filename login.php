<!DOCTYPE html>

<?php
   $title = "Login";
   $fname = "Christopher";
   $lname = "Wald";
?>

<?php
   session_start();
   $mysql_host = "localhost";
   $mysql_database = "sched";
   $mysql_user = "root";
   $mysql_password = "98mrz42;";

   $res = mysql_connect("$mysql_host", "$mysql_user", "$mysql_password");
   if (!$res)
     die("Could not connect to db");
   $res = mysql_select_db("$mysql_database");
   if (!$res)
     die("Could not select db");

   if (isset($_POST["login"]) and !isset($_SESSION["loggedin"]))
   {
     $mail = stripslashes($_POST["email"]);
     $pass = stripslashes($_POST["password"]);
     $mail = mysql_real_escape_string($mail);
     $pass = mysql_real_escape_string($pass);
     $mail = md5($mail);
     $pass = md5($pass);
     
     $mysql = mysql_query("SELECT * FROM members WHERE email = '{$mail}' AND password = '{$pass}'");
     if (mysql_num_rows($mysql) == 1) {
       $_SESSION["loggedin"] = "YES";
       $_SESSION["email"] = $mail;
       $_GET["msg"] = "Logged In";
     } else {
       $_GET["msg"] = "Incorrect Email or Password.";
     }
   }
   else if (isset($_POST["logout"]))
   {
     unset($_SESSION["loggedin"]);
     session_destroy();
   }
   else if (isset($_POST["reg"]))
   {
     $_SESSION["reg"] = "YES";
   }
   else if (isset($_POST["regreg"]))
   {
     $regmail = $_POST["regemail"];
     $regname = $_POST["regname"];
     $regpass0 = $_POST["regpass0"];
     $regpass1 = $_POST["regpass1"];

     $regok = TRUE;

     if ($regmail == "" and $regok)
     {
       $_GET["msg"] = "Provide your email address.";
       $regok = FALSE;
     }

     if ($regname == "" and $regok)
     {
       $_GET["msg"] = "Provide your name.";
       $regok = FALSE;
     }

     if ($regpass0 == "" and $regok)
     {
       $_GET["msg"] = "Enter a password.";
       $regok = FALSE;
     }

     if ($regpass1 == "" and $regok)
     {
       $_GET["msg"] = "Confirm your password.";
       $regok = FALSE;
     }

     if (($regpass0 != $regpass1) and $regok)
     {
       $_GET["msg"] = "Passwords must match.";
       $regok = FALSE;
     }

     if ($regok)
     {
       $regmail = md5($regmail);
       $regpass = md5($regpass0);
       $query = "INSERT INTO members (id, email, name, password) values ('', '$regmail', '$regname', '$regpass');";
   
       $result = mysql_query($query);
       if ($result)
       {
         $_GET["msg"] = "Registration successful. Please log in.";
       }
       else 
       {
         $_GET["msg"] = "Failed to register. Please try again later.";
       }
       unset($_SESSION["reg"]);
     }
   }
   else if (isset($_POST["regcancel"]))
   {
     unset($_SESSION["reg"]);
   }
?>

<html>
  <head>
    <?php include "head.php"; ?>
  </head>

  <body>
    <div class="page">
      <?php include "header.php"; ?>
      <br/>
      <br/>
      <br/>
      <?php echo "<div class=\"schedlogmsg\">".$_GET["msg"]."</div>"; ?>
      <?php if (!isset($_SESSION["loggedin"]) and !isset($_SESSION["reg"]))
	      include "loginform.php";
	    else if (isset($_SESSION["loggedin"]))
	      include "logoutform.php";
	    else if (isset($_SESSION["reg"]))
	      include "registerform.php";
	    ?>
      <br/>
      <br/>
      <br/>
      <?php include "footer.php"; ?>
    </div>
    <?php include "altfoot.php"; ?>
  </body>
</html>
