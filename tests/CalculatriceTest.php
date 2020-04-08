<?php
namespace Tests;

use App\Calculatrice;

class CalculatriceTest extends \PHPUnit\Framework\TestCase
{
    public $a = 8;
    public $b = 16;

    public function testAddition(){
        $foo = Calculatrice::addition($this->a, $this->b);
        $this -> assertEquals($this->a+$this->b,$foo, "fail");
    }
}