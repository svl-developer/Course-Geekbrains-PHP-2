<?php

namespace Models;


class Db{

    private static $instance;

    private $pdo;


    private function __construct()
    {
        $data = require __DIR__ . '/settings.php';


        try{
            $this->pdo = new \PDO('mysql:host='.$data['host'].';dbname='.$data['dbname'], $data['name'], $data['password']);
            
            
            $this->pdo->exec('SET NAMES UTF8');

        }catch(\PDOException $e){

            echo 'ошибка к подключению к БД: '.$e->getMessage();
        }
    }



    public static function instance()
    {
        if(self::$instance === null){
            self::$instance = new self;
        }

        return self::$instance;

    }


    public function query(string $sql, array $var)
    {
        $data = $this->pdo->prepare($sql);
        $res = $data->execute($var);

    

        if($res === false){
            return null;
        }

        return $data->fetchAll();
    }
}


Db::instance();



?>