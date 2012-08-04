<?php
   $res = ($_SERVER["SCRIPT_NAME"] == "/resume.php");
?>

<?php echo "<title>".$title."</title>".PHP_EOL; ?>
<link href="styles/style.css" rel="stylesheet" type="text/css">
<?php if ($res) echo "<!--I wanted to use a special font to spruce things up a bit. Google's Fonts API seemed like the best choice.-->".PHP_EOL; ?>
<link href="http://fonts.googleapis.com/css?family=Dosis:300,400" rel="stylesheet" type="text/css">
<meta charset="UTF-8">
