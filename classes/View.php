<?php

namespace app\classes;

class View {

	public function display($mass, $cat){

		($cat && $cat != 'prod')?
			include_once __DIR__ . '/../views/index.php'  : 
			include_once __DIR__ . '/../views/product.php';
			
	}

}