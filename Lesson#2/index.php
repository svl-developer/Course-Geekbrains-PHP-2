<?php

/**
 * @author Sergey/Vlach
 * Д З второго задания курса Профессиональная веб-разработка на PHP
 * 1. Создать структуру классов ведения товарной номенклатуры.
 * а) Есть абстрактный товар.
 * б) Есть цифровой товар, штучный физический товар и товар на вес.
 * в) У каждого есть метод подсчета финальной стоимости.
 * г) У цифрового товара стоимость постоянная – дешевле штучного товара в два раза. У штучного товара обычная стоимость, у весового – в зависимости от продаваемого количества в килограммах. У всех формируется в конечном итоге доход с продаж.
 * д) Что можно вынести в абстрактный класс, наследование?
 * 
 */

/**
 * абстрактный класс AbstractProduct
 * для обстрактного товара
 */

abstract class AbstractProduct
{
    protected $price;


    public function __construct(int $price)
    {

        $this->price = $price;

    }



    /**
     * calculationOfСost() абстрактный метод подсчета товаров
     */

    abstract public function  calculationOfСost():int;
}

/**
 * класс DigitalGoods
 * для цифрового товара
 */

class DigitalGoods extends AbstractProduct
{

    public function calculationOfСost(): int
    {
        return $this->price/2;

    }



}

/**
 * Проверка кода
 */


// $res = new DigitalGoods(100);
// echo $res->getPriceDigital();


/**
 * класс PieceGoods
 * для штучного товара
 */

class PieceGoods extends AbstractProduct
{


    public function calculationOfСost(): int
    {
        return $this->price;

    }






}

/**
 * Проверка кода
 */

// $res = new PieceGoods(100);
// echo $res->getPriceDigital();




/**
 * класс GoodsByWeight
 * для товара на вес
 */

class GoodsByWeight extends AbstractProduct
{

    protected $weight;

    public function __construct(int $price, float $weight){
        parent::__construct($price);
        $this->weight = $weight;
    }

    
    
    public function calculationOfСost(): int
    {
        
        return $this->price * $this->weight;

    }



}

/**
 * Проверка кода
 */

// $res = new GoodsByWeight(100, 2);
// echo $res->calculationOfСost();



?>