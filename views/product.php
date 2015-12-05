<?php
$PATH = $_SERVER['PHP_SELF'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Продукт</title>
	<link href="/style.css" type="text/css" rel="stylesheet">
</head>
<body><hr>
<?php 
include_once __DIR__.'/nav.php';
echo "<h1>Вы выбрали продукт</h1><hr>
		<h2>".$mass[0]['Name']."</h2>
		".$mass[0]['Descr'];
?>
</body>
</html>