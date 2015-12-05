<?php

use app\controllers\Controller;

require __DIR__ . '/autoload.php';

try {
	$run = new Controller; 
} catch (Exception $e) {
	echo 'Исключение: ',  $e->getMessage(), "\n";
}
