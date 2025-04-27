<?php

namespace App\Http\Controllers;

use App\Enums\UnitCategory;
use App\Http\Controllers\Controller;
use App\Services\UnitConverterService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use InvalidArgumentException;

class UnitController extends Controller
{
    protected $unitConverterService;

    public function __construct(UnitConverterService $unitConverterService)
    {
        $this->unitConverterService = $unitConverterService;
    }

    public function convert(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|string|in:length,weight,temperature,volume',
            'fromUnit' => 'required|string',
            'toUnit' => 'required|string',
            'value' => 'required|numeric|min:0',
        ]);

        try {
            $convertedValue = $this->unitConverterService->convert(
                $validated['category'],
                $validated['fromUnit'],
                $validated['toUnit'],
                $validated['value']
            );

            return response()->json([
                'convertedValue' => $convertedValue,
                'unit' => $validated['toUnit'],
            ]);
        } catch (InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}