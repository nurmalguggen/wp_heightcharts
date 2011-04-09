<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>selbst erstellt</title>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	<script type="text/javascript" src="/js/highcharts.js"></script>
		<!-- 1a) Optional: add a theme file -->
		<!--
			<script type="text/javascript" src="../js/themes/gray.js"></script>
		-->
		<!-- 1b) Optional: the exporting module -->
		<script type="text/javascript" src="/js/modules/exporting.js"></script>
<?php

if (isset($_POST) && $_POST['enter']=="anzeigen"){
	include_once('class.Hightchart_tojs.php');
	$cvs="1,2,3,4,5";
	$options='erstmal egal';
	$ausgabe = new Hightchart_tojs($cvs,$options);
	echo $ausgabe->get_js();
}
?>

</head>

<body>
<form action="selbst.php" method="POST">
CSV: <input type="file" name="csv" ><br />
Optionen: <input type="text" name="options"></br>
<input type="submit" value="anzeigen" name="enter">
</form>
<?php

if (isset($_POST) && $_POST['enter']=="anzeigen"){
	echo "<div style='widht:900px;height:500px;border:1px solid black'>Hier wird das CSV mit den Optionen als Highchart bzw Errors Kaputte csv oder falsche optionen angezeigt.	<div id='container' style='width: 800px; height: 400px; margin: 0 auto'></div></div>";
};
?>
</body>
</html>