<?php

namespace App\Services\Converters;

class WeightConverter
{
    public function convert(string $from, string $to, float $value): float
    {
        $conversionRates = [
            'kilogram' => 1,
            'gram' => 1000,
            'milligram' => 1000000,
            'pound' => 2.20462,
            'ounce' => 35.274
        ];

        if (!isset($conversionRates[$from]) || !isset($conversionRates[$to])) {
            throw new \InvalidArgumentException('Invalid units');
        }

        return $value * ($conversionRates[$to] / $conversionRates[$from]);
    }
}