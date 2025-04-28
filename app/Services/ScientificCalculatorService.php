<?php

namespace App\Services;

use MathParser\StdMathParser;
use MathParser\Interpreting\Evaluator;

class ScientificCalculatorService
{
    public function evaluate(string $expression): float
    {
        // $parser = new StdMathParser();
        // $AST = $parser->parse($expression);
        // $evaluator = new Evaluator();

        // return $AST->accept($evaluator);

        return 1.0;
    }
}