<?php

namespace App\Services\Converters;

class TemperatureConverter
{
    public function convert(string $from, string $to, float $value): float
    {
        if ($from === 'celsius' && $to === 'fahrenheit') {
            return ($value * 9/5) + 32;
        } elseif ($from === 'fahrenheit' && $to === 'celsius') {
            return ($value - 32) * 5/9;
        } elseif ($from === 'celsius' && $to === 'kelvin') {
            return $value + 273.15;
        } elseif ($from === 'kelvin' && $to === 'celsius') {
            return $value - 273.15;
        } elseif ($from === 'fahrenheit' && $to === 'kelvin') {
            return ($value - 32) * 5/9 + 273.15;
        } elseif ($from === 'kelvin' && $to === 'fahrenheit') {
            return ($value - 273.15) * 9/5 + 32;
        } else {
            throw new \InvalidArgumentException('Invalid units');
        }
    }
}