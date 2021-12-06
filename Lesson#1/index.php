<?php

/**
 * 1. Придумать класс, который описывает любую сущность из предметной области интернет-магазинов: продукт, ценник, посылка и т.п.
 * 2. Описать свойства класса из п.1 (состояние).
 * 3. Описать поведение класса из п.1 (методы).
 * 4. Придумать наследников класса из п.1. Чем они будут отличаться?
 */



 /**
  * Решение задания
  * @author Sergey/Vlach
  * Класс Main описывает - это основной класс который описывает свойства продукта
  * цены и посылки
  */


  class Main {
      /** @var string */
      public $product;

      /** @var  int*/
      protected $price;

      /** @var string */
      protected $package;



      /**
       * конструктор задает продукт, цену и посылку
       * 
       * @param string $product - свойство которое передает названия продукта
       * @param int $price - свойства которое определяет цену
       * @param string $package - свойства которое определяет посылку
       * 
       */


      public function __construct(string $product, int $price, string $package)
      {

        $this->product = $product;
        $this->price = $price;
        $this->package = $package;



      }

      /**
       * метод при обращению к которому выводит продукт
       * 
       * @return string
       * 
       */

      public function getProduct(): string
      {
          return $this->product;
      }

       /**
        * метод при обращению к которому выводит цену
        * @return int
        */

      public function getPrice(): int
      {
          return $this->price;
      }


       /**
        * метод при обращению к которому выводит посылку
        * @return string
        */

      public function getPackage(): string
      {
          return $this->package;
      }


      /**
       * Метод задает названия продукта
       * @param string $product - свойства которое определяет продукт
       */

      public function setProduct(string $product): void
      {
          $this->product = $product;

      }

       /**
        * метод задает цену продукта
        * @param int $price - свойства которое определяет цену
        */

      public function setPrice(int $price): void
      {
          $this->product = $product;

      }

       /**
        * метод задает посылку
        * @param int $package - посылка
        */

      public function setPackage(int $package): void
      {
          $this->package = $package;

      }
  }

 /**
  * Тестирования
  */


  $result = new Main('Ноутбук', 200, 'посылка');
  $result->setProduct('Монитор');
  echo $result->getProduct();
  echo $result->getPrice();



 /**
  * Решение задания
  * @author Sergey/Vlach
  * Класс Base описывает - это наследник класс который наследует и перезаписывает свойства и методы класса Main
  * Отличается от класса родителя тем, что родитель не знает про детей
  */


  class Base extends Main{

    /** @var int */
    protected $count;


    public function __construct(string $product, int $price, string $package, int $count)
    {
        parent::__construct( $product, $price, $package);
        $this->count = $count;
    }

    public function getCount(): int
    {
        return $this->count;
    }

  }

  /**
   * Тестирования
   */


  $res = new Base('Ноутбук', 200, 'поссылка по почте', 3);
  echo $res->getProduct().'<br>';
  $res2 = new Main('Ноутбук', 200, 'поссылка по почте');
  $res2->product = 'монитор';
  echo $res2->product.'<br>';



 /**
  * 5. Дан код:
  * Что он выведет на каждом шаге? Почему?
  * */  

  class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();
$a2 = new A();
$a1->foo();
$a2->foo();
$a1->foo();
$a2->foo();


 /**
  * Ответ: так как свойство $x является статическим а статические свойсва пренадлежат классу а не объекту
  * Получает результаты 1234
  */


 /**
  * Немного изменим п.5:
  * 6. Объясните результаты в этом случае.
  */

  class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
  class B extends A {
}
$a1 = new A();
$b1 = new B();
$a1->foo(); 
$b1->foo(); 
$a1->foo(); 
$b1->foo();

 /**
  * Ответ: так как имеется два класса в начале статическое свойство принадлежало классу А после классу B
  * отличие статических свойст от других в том, что они принадлежат классу а не объекту
  * Получает результаты 1122
  */   

 /**
  * 7. *Дан код:
  *Что он выведет на каждом шаге? Почему?
  */
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A;
$b1 = new B;
$a1->foo(); 
$b1->foo(); 
$a1->foo(); 
$b1->foo(); 


  /**
  * Ответ: так как имеется два класса в начале статическое свойство принадлежало классу А после классу B
  * отличие статических свойст от других в том, что они принадлежат классу а не объекту
  * И самое главное объект можно задавать без ()
  * Получает результаты 1122
  */  

 

?>