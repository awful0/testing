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

				$sql = 'select t1.Name, t2.Name, t2.id, t1.Path, t2.Path from ' .static::getTable() . ' t1 inner join ' .static::getTable() . ' t2 on t1.id=t2.parent';
			
			return $db->execute($sql);
		}

		else if ($cat && !$prod){

			$sql = 'select t1.Name, t2.Name, t2.id, t1.Path, t2.Path from ' .static::getTable() . ' t1 inner join ' .static::getTable() . ' t2 on t1.id=t2.parent and t1.Path=:cat';
			return $db->execute($sql, [':cat' => $cat]);
		}

		else if ($cat && $prod){

			$sql = 'select t1.Name, t2.Name, t2.id, t1.Path, t2.Path from ' .static::getTable() . ' t1 inner join ' .static::getTable() . ' t2 on t1.id=t2.parent and t1.Path=:prod';

        	return $db->execute($sql, [':prod' => $prod]);
        }
        
	}

	public function showProduct($prod){
		
		$sql = 'SELECT * FROM ' .static::getTable() . ' WHERE Path=:prod';
		$db = new Db();
        return $db->execute($sql, [':prod' => $prod]);
        
	}
}
