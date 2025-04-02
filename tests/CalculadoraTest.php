<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../src/Calculadora.php';

class CalculadoraTest extends TestCase
{
    public function testSoma()
    {
        $calc = new Calculadora();
        $resultado = $calc->soma(2, 3);
        $this->assertEquals(5, $resultado);
    }

    public function testSubtracao()
    {
        $calc = new Calculadora();
        $resultado = $calc->subtrai(10, 4);
        $this->assertEquals(6, $resultado);
    }

    public function testMultiplicacao()
    {
        $calc = new Calculadora();
        $resultado = $calc->multiplica(3, 3);
        $this->assertEquals(9, $resultado);
    }

    public function testDivisao()
    {
        $calc = new Calculadora();
        $resultado = $calc->divide(10, 2);
        $this->assertEquals(5, $resultado);
    }

    public function testDivisaoPorZero()
    {
        $calc = new Calculadora();
        $this->expectException(DivisionByZeroError::class);
        $calc->divide(10, 0);
    }
}
