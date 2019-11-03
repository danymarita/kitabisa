<?php

namespace App\Services;
use App\Contracts\MathOperationInterface;

class Sum implements MathOperationInterface {
    public function process($x, $y) {
        return $x + $y;
    }
}