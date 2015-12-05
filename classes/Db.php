<?php

namespace app\classes;

class Db {

    protected $dbh;

    public function __construct(){

        $config = include __DIR__ . '/../config/db.php';
        $dsn = 'mysql:dbname=' . $config['dbname'] . ';host=' . $config['host'];
		$this->dbh = new \PDO($dsn, $config['user'], $config['password']);

    }


    public function execute($sql, $params=[]){

        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll();

    }

    
}