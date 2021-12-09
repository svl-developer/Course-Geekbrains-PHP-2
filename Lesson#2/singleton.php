<?php


/**
 * @author Sergey/Vlach
 * 2. *Реализовать паттерн Singleton при помощи traits.
 */


trait Singleton
{
    private static $instatse;

    if(self::$instatse === null){
        self::$instatse = new self;
    }

    return self::$instatse;

}


class DB 
{
    private function __construct()
    {
        //подключение к бд
    }

    use Singleton;
}