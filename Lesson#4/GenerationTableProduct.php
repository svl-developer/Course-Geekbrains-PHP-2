<?php

include __DIR__ . '/Db.php';


class GenerationTableProduct
{


    public function __construct(){

   $db = $db = Db::getInstance();
     

    for($i=1; $i < 200; $i++){
        $sql = 'INSERT INTO `product` (`name`, `price`) VALUES(?,?)';
        $name = 'Название № '.$i;
        $price = $i;
        $array = [$name, $price];
       
        $db->query($sql, $array );
        
    }

      }
    

}

$res = new GenerationTableProduct();


?>