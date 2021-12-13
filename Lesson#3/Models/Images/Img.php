<?php

namespace Models\Images;


use Models\Db;


class Img{


    public static function getImages(): array
    {
        $db = $db = Db::instance();

        return $db->query('SELECT * FROM `img`', []);
    }


    public static function getOneImg(int $id): array
    {
        $db = $db = Db::instance();

        return $db->query('SELECT * FROM `img` WHERE id = ? ', [$id]);

    }

}



?>