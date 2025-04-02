<?php

class Calculadora
{
    public function soma($a, $b)
    {
        return $a + $b;
    }

    public function subtrai($a, $b)
    {
        return $a - $b;
    }

    public function multiplica($a, $b)
    {
        return $a * $b;
    }

    public function divide($a, $b)
    {
        if ($b == 0) {
            throw new DivisionByZeroError("Divisão podr zero não permitida.");
        }
        return $a / $b;
    }
}

