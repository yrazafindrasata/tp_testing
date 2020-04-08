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
}