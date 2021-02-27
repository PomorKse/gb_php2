<?php

abstract class Product
{
  private $cost;
  const PROFIT = 10;//Профит 10%

  abstract public function finalCost();// Финальная стоимость товара с учётом кол-ва или веса

  abstract public function profit();  // Доход получаемый с продажи товара с учётом PROFIT

  public function render(){
    echo 'Стоимость - ' . $this->finalCost() . ' рублей. Прибыль - ' . $this->profit() . ' рублей<br>';
  }

}

class DigitalProduct extends Product
{
  public function __construct(int $cost)
  {
    $this->cost = $cost;
  }

  public function finalCost()
  {
    return $this->cost;
  }

  public function profit()
  {
    return $this->finalCost() / 100 * Product::PROFIT;
  }
}

class CountableProduct extends DigitalProduct
{
  private $amount;

  public function __construct(int $cost, int $amount)
  {
    $this->amount = $amount;
    parent::__construct($cost);
  }

  public function finalCost()
  {
    return $this->cost * $this->amount;
  }

  public function profit()
  {
    return $this->finalCost() / 100 * Product::PROFIT;
  }
}

class WeightProduct extends Product
{
  private $weight;

  public function __construct(int $cost, float $weight)
  {
    $this->cost = $cost;
    $this->weight = $weight;
  }

  public function finalCost()
  {
    return $this->cost * $this->weight;
  }
  
  public function profit()
  {
    return $this->finalCost() / 100 * Product::PROFIT;
  }
}

$obj1 = new DigitalProduct(20000000);
$obj1->render();
$obj2 = new CountableProduct(100, 2);
$obj2->render();
$obj3 = new WeightProduct(600, 0.3);
$obj3->render();

//Синглтон
trait ForSingleton {
    
  private function __construct() {  } 

  
  public static function getInstance() {
      if ( empty(self::$instance) ) {
          self::$instance = new self();
      }
      return self::$instance;                     
  }   

}

class Singleton
{
  
  private static $instance;
  
public function doAction() { 
   echo "Singleton";
  }
  use ForSingleton;

}

$obj_1 = Singleton::getInstance();
$obj_2 = Singleton::getInstance();

var_dump($obj_1 === $obj_2);    // The Same object