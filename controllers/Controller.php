<?php

namespace app\controllers;
use app\models\Product;
use app\classes\View;

class Controller {
	
	protected $error = false;

	public function __construct(){
		
		$cat = (!empty($_GET['cat'])) ? $_GET['cat'] : false;
		$prod = (!empty($_GET['prod'])) ? $_GET['prod'] : false;
		!$cat && !$prod && $this->show('index') || $this->show($cat,$prod);
		
	}

	public function show($cat, $prod=''){

		((!preg_match("|^[a-z0-9]+$|", $cat))) && exit ();
		($prod) && ((!preg_match("|^[a-z0-9]+$|", $prod))) && exit ();

		$product = new Product;
		$view = new View;

		($cat) && ($result = $product->showCatalog($cat,$prod)) ? $view->display($result, $cat) : 
		( ($result = $product->showProduct($prod)) ?
			$view->display($result, 'prod') : $this->error = true );

			
		if ($this->error)
			throw new Exception('Что то пошло не так... Скорее всего таблица пуста!');

	}

}