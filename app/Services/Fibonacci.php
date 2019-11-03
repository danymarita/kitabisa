<?php

namespace App\Services;
use App\Contracts\NumberSequenceInterface;

class Fibonacci implements NumberSequenceInterface {
    public function process($x) {
        $result = [0, 1];
        for ($i = 2; $i < $x; $i++) {
            $result[$i] = $result[$i - 1] + $result[$i - 2];
        }

        return $result;
    }
}