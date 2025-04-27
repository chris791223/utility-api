<?php

namespace App\Services\Converters;

class LengthConverter
{
    public function convert(string $from, string $to, float $value): float
    {
        $conversionRates = [
            'meter' => 1,
            'kilometer' => 0.001,
            'centimeter' => 100,
            'millimeter' => 1000,
            'mile' => 0.000621371,
            'yard' => 1.09361,
            'foot' => 3.28084,
            'inch' => 39.3701
        ];

        if (!isset($conversionRates[$from]) || !isset($conversionRates[$to])) {
            throw new \InvalidArgumentException('Invalid units');
        }

        return $value * ($conversionRates[$to] / $conversionRates[$from]);
    }
}