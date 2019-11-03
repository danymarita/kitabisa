<?php

namespace App\Services;
use App\Contracts\NumberSequenceInterface;

class PrimeNumber implements NumberSequenceInterface {
    public function process($x) {
        $result = [];
        $number = 2 ;
        while (count($result) < $x )
        {
            $div_count=0;
            for ( $i = 1; $i <= $number; $i++)
            {
                if (($number % $i) == 0)
                {
                    $div_count++;
                }
            }
            if ($div_count < 3)
            {
                $result[] = $number;
            }
            $number = $number + 1;
        }

        return $result;
    }
}