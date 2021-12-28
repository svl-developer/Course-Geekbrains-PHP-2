<?php

require __DIR__ .'/Db.php';


  

    // $number = $number ? $_GET['count'] : 0;
    $number = $_GET['count'] ? $_GET['count'] : 0;
    $db = $db = Db::getInstance();
    $sql = "SELECT * FROM product LIMIT 4 OFFSET $number";

    $product = $db->query($sql, []);
    exit(json_encode($product));








?>