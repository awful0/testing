<?php

namespace app\models;
use app\classes\Db;

class Product {
	
	protected static $table = 'catalog';

    public static function getTable()
    {
        return static::$table;
    }


	public function showCatalog($cat, $prod=false){

		$db = new Db();

		if ($cat && $cat == 'index'){
			$sql = 'SELECT t1.Name, t2.Name, t2.id, t1.Path, t2.Path FROM 
				(SELECT * FROM ' .static::getTable() . ' GROUP BY `Name`)  t1,
				(SELECT * FROM ' .static::getTable() . ')  t2
				WHERE t2.Parent=t1.id'
			;
			return $db->execute($sql);
		}

		else if ($cat && !$prod){

			$sql = 'SELECT t1.Name, t2.Name, t2.id, t1.Path, t2.Path FROM 
				(SELECT * FROM ' .static::getTable() . ' 
					WHERE Path=:cat)  t1,
				(SELECT * FROM ' .static::getTable() . ')  t2
				WHERE t2.Parent=t1.id'
			;		
			return $db->execute($sql, [':cat' => $cat]);
		}

		else if ($cat && $prod){

			$sql = 'SELECT t1.Name, t2.Name, t2.id, t1.Path, t2.Path FROM 
				(SELECT * FROM ' .static::getTable() . ' 
					WHERE Path=:prod)  t1,
				(SELECT * FROM ' .static::getTable() . ')  t2
				WHERE t2.Parent=t1.id'
			;	
			
        	return $db->execute($sql, [':prod' => $prod]);
        }
        
	}

	public function showProduct($prod){
		
		$sql = 'SELECT * FROM ' .static::getTable() . ' WHERE Path=:prod';
		$db = new Db();
        return $db->execute($sql, [':prod' => $prod]);
        
	}
}