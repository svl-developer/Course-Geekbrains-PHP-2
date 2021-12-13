<?php

namespace Models\Images;


use Models\Db;


class Img{


    public static function getImages()
    {
        $db = $db = Db::instance();

        return $db->query('SELECT * FROM `img`', []);
    }

}



?>