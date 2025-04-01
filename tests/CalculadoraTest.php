<?php

use PHPUnit\Framework\TestCase;
use App\Calculadora;

class CalculadoraTest extends TestCase
{
    public function testSomar()
    {
        $calc = new Calculadora();
        $this->assertEquals(5, $calc->somar(2, 3));
    }

    public function testSubtrair()
    {
        $calc = new Calculadora();
        $this->assertEquals(1, $calc->subtrair(3, 2));
    }
}
