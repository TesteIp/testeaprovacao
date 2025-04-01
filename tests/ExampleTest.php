<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function testBasicFunctionality(): void
    {
        $value = 2 + 2; // Exemplo de lógica para teste
        $this->assertTrue($value === 4, 'O valor deve ser igual a 4.');
    }
}