<?php
namespace Tests;

use App\Calculatrice;
use PHPUnit\Framework\TestCase;

class CalculatriceTest extends TestCase
{
    public $a = 8;
    public $b = 16;

    public function testAddition(){
        $foo = Calculatrice::addition($this->a, $this->b);
        $this -> assertEquals($this->a+$this->b,$foo);
    }

    public function testMinus(){
        $foo = Calculatrice::minus($this->a, $this->b);
        $this -> assertEquals($this->a-$this->b,$foo);
    }

    public function testMultiply(){
        $foo = Calculatrice::multiply($this->a, $this->b);
        $this -> assertEquals($this->a*$this->b,$foo);
    }

    public function testDivision(){
        $foo = Calculatrice::division($this->a, $this->b);
        $this -> assertEquals($this->a/$this->b,$foo);
    }
}