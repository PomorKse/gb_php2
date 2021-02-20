<?php
abstract class Product
{
  public $title = 'Товар';
  public $description = 'Самый лучший товар';
  public $size = 'Средний';
  public $price = 1000;

  public function __construct(string $title, string $description, string $size, int $price)
  {
    $this->title = $title;
    $this->description = $description;
    $this->size = $size;
    $this->price = $price;
  }

  public function render()
  {
    echo "<div>
            <h2>{$this->title}</h2>
            <p>{$this->description}</p>
            <p>{$this->size}</p>
            <p>{$this->price}</p>
          </div>";
  }
}

class Car extends Product
{
  public $speed;

  public function __construct(string $title, string $description, string $size, int $speed, int $price){

    $this->speed = $speed;

    parent::__construct($title, $description, $size, $price);
    
  }

  public function render()
  {
    echo "<div>
            <h2>{$this->title}</h2>
            <p>{$this->description}</p>
            <p>{$this->size}</p>
            <p>{$this->speed} mph</p>
            <p>{$this->price} RUB</p>
          </div>";
  }

}

class Tire extends Product
{
  public $treadDepth;

  public function __construct(string $title, string $description, string $size, int $treadDepth, int $price){

    $this->treadDepth = $treadDepth;

    parent::__construct($title, $description, $size, $price);
    
  }

  public function render()
  {
    echo "<div>
            <h2>{$this->title}</h2>
            <p>{$this->description}</p>
            <p>{$this->size}</p>
            <p>{$this->treadDepth} mm</p>
            <p>{$this->price} RUB</p>
          </div>";
  }
}


$car1 = new Car('Volvo VNX', 'The Volvo VNX is built specifically for the needs of heavy-haul trucking operations', 'Huge', 115, 20000000);
$car1->render();

$yokogama = new Tire('ICEGUARD IG51V', 'Designed to deliver durability and handling to your crossover, SUV or truck in winter conditions', 'Medium', 13, 10000);
$yokogama->render();

/*
Ключевое слово static, написанное перед присваиванием значения локальной переменной, приводит к следующим эффектам:
-Присваивание выполняется только один раз, при первом вызове функции
-Значение помеченной таким образом переменной сохраняется после окончания работы функции
-При последующих вызовах функции вместо присваивания переменная получает сохраненное ранее значение

Такое использование слова static называется статическая локальная переменная.

class A
{
  public function foo() {
  static $x = 0;
  echo ++$x;
  }
}
$a1 = new A();
$a2 = new A();

$a1->foo();//1
$a2->foo();//2
$a1->foo();//3
$a2->foo();//4
// методы существуют в единственном экземпляре
*/

/*
Наследование класса (и метода) приводит к тому, что создается новый метод
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
$a1->foo(); //1
$b1->foo(); //1
$a1->foo(); //2
$b1->foo(); //2
*/

//то же, что и ранее, НО в случае отсутствия аргументов в конструктор класса, круглые скобки после названия класса можно опустить.
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
$a1->foo(); //1
$b1->foo(); //1
$a1->foo(); //2
$b1->foo(); //2
