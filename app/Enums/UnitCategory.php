<?php

namespace App\Enums;

enum UnitCategory: string
{
    case LENGTH = 'length';
    case WEIGHT = 'weight';
    case TEMPERATURE = 'temperature';
    case VOLUME = 'volume';
}