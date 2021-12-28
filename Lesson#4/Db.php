<?php

/**
 * DB connection
 */


class Db
{
 
    protected static $instance;
    private $pdo;


    private function __construct()
    {
        $data = require __DIR__ .'/settings.php';

        try{

            $this->pdo = new \PDO('mysql:host='.$data['host'].';dbname='.$data['dbname'], $data['user'], $data['password']);

            $this->pdo->exec('SET NAMES UTF8');

        }catch(\PDOException $e){

            echo 'database connection problem '.$e->getMessage();

        }

    }


        public static function getInstance(): self 
        {
        if (self::$instance === null) {
        self::$instance = new self();
        }

        return self::$instance;
        }


        public function query(string $sql, array $var)
        {
            $thm = $this->pdo->prepare($sql);
            $thm ->execute($var);

            if($thm === false){

                return null;
            }

            return $thm->fetchAll();

        }



}







?>