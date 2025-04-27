<?php

namespace App\Services;

use App\Enums\UnitCategory;
use App\Services\Converters\LengthConverter;
use App\Services\Converters\WeightConverter;
use App\Services\Converters\TemperatureConverter;
use App\Services\Converters\VolumeConverter;
use InvalidArgumentException;

class UnitConverterService
{
    public function convert(string $category, string $from, string $to, float $value): float
    {
        return match ($category) {
            UnitCategory::LENGTH->value => (new LengthConverter())->convert($from, $to, $value),
            UnitCategory::WEIGHT->value => (new WeightConverter())->convert($from, $to, $value),
            UnitCategory::TEMPERATURE->value => (new TemperatureConverter())->convert($from, $to, $value),
            UnitCategory::VOLUME->value => (new VolumeConverter())->convert($from, $to, $value),
            default => throw new InvalidArgumentException("Unsupported category: $category"),
        };
    }
}