<?php

namespace App\Services\Converters;

class VolumeConverter
{
    public function convert(string $from, string $to, float $value): float
    {
        $conversionRates = [
            'liter' => 1,
            'milliliter' => 1000,
            'cubic_meter' => 0.001,
            'cubic_centimeter' => 1000,
            'gallon' => 0.264172,
            'quart' => 1.05669,
            'pint' => 2.11338,
            'cup' => 4.22675,
            'fluid_ounce' => 33.814,
            'tablespoon' => 67.628,
            'teaspoon' => 202.884
        ];

        if (!isset($conversionRates[$from]) || !isset($conversionRates[$to])) {
            throw new \InvalidArgumentException('Invalid units');
        }

        return $value * ($conversionRates[$to] / $conversionRates[$from]);
    }
}