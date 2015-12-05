<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Главная страница</title>
	<link href="/style.css" type="text/css" rel="stylesheet">
</head>
<body><hr>

<?php 
include_once __DIR__.'/nav.php';
?>

<h2>дерево «Каталога»</h2><hr>

<?php
$vall = $mass[0][0];
$nn = false;
$vvname = '';

for ($i=0; $i<count($mass); $i++){
	
	($mass[$i][3] != 'catalog')? $catalog = '/catalog' : $catalog = '';
	
	if (!$nn){
		
		echo "<strong><a href='".$catalog."/".$mass[$i][3]."/'>
				<span class='nav'>".$vall."</span>
				</a></strong> &rarr; ";
		$nn = true;
	}
	

	if ($vall==$mass[$i][0]) {
		
		echo "<a class='left' href='".$catalog."/".$mass[$i][3]."/".$mass[$i][4]."/'><span class='nav'>".$mass[$i]['Name']."</span></a>";
		
	}
	else {
		
		$vall = $mass[$i][0];
		$vvname = $mass[$i]['Name'];
		echo "<br><br><span class='block'></span>";
		if ($vall == $mass[$i-1]['Name']) {
			echo "<span class='wblock'></span>";
		}
		echo "<strong><a class='nav' href='/catalog/".$mass[$i][3]."/'>".$vall."</a></strong> &rarr; <a class='left' href='/catalog/".$mass[$i][3]."/".$mass[$i][4]."/'><span class='nav'>".$vvname."</span></a>";

	}
}
?>
<hr></body>
</html>


