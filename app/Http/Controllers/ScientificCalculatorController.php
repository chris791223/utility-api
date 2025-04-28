<?php

namespace App\Http\Controllers;

use App\Services\ScientificCalculatorService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ScientificCalculatorController extends Controller
{
    protected $calculatorService;

    public function __construct(ScientificCalculatorService $calculatorService)
    {
        $this->calculatorService = $calculatorService;
    }

    public function calculate(Request $request): JsonResponse
    {
        $request->validate([
            'expression' => 'required|string',
        ]);

        try {
            $result = $this->calculatorService->evaluate($request->input('expression'));
            return response()->json(['result' => $result]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}