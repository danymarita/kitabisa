<?php

namespace App\Services;
use App\Contracts\MathOperationInterface;

class Multiply implements MathOperationInterface {
    public function process($x, $y) {
        return $x * $y;
    }
}