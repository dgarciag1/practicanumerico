<?php

return [
    'title' => 'Arrays',
    'methods' => 'Arrays Methods',

    'holder' => [
        'matrix' => 'Enter the A matrix',
        'vector' => 'Enter the b vector',
        'iterations' => 'Enter the iterations',
        'tolerance' => 'Enter the tolerance',
        'w_value' => 'Enter the w value',
        'inputSize' => 'Enter the matrix size',
        'size' => 'Matrix Size',
        'continue' => 'Continue',
        'calculate' => 'Calculate',
        'error' => 'ERROR',
        'stages' => 'Stages and X Vector'
    ],

    'elimination' => [
        'name' => 'Simple Gaussian Elimination',
        'matrix' => 'Matrix A',
        'vector' => 'Vector b',
        'results' => 'Simple Gaussian Elimination Results'
    ],

    'bisection' => [
        'name' => 'Bisection',
        'function' => 'Function(fx)',
        'aPoint' => 'Lower Point(a)',
        'bPoint' => 'Upper Point(b)',
        'tolerance' => 'Tolerance',
        'iterations' => 'Nmax',
        'results' => 'Bisection Results',
        'approximation' => 'An approximation of the root was found in '
    ],

    'falseRule' => [
        'name' => 'False Rule',
        'function' => 'Function(fx)',
        'aPoint' => 'Lower Point(a)',
        'bPoint' => 'Upper Point(b)',
        'tolerance' => 'Tolerance',
        'iterations' => 'Nmax',
        'results' => 'False Rule Results',
        'approximation' => 'An approximation of the root was found in '
    ],

    'fixedPoint' => [
        'name' => 'Fixed Point',
        'function' => 'Function(fx)',
        'gFunction' => 'Function(gx)',
        'initialX' => 'Initial X(x0)',
        'tolerance' => 'Tolerance',
        'iterations' => 'Nmax',
        'results' => 'Fixed Point Results',
        'approximation' => 'An approximation of the root was found in '
    ],

    'newton' => [
        'name' => 'Newton',
        'function' => 'Function(fx)',
        'dxFunction' => 'Derived Function(dfx)',
        'initialX' => 'Initial X(x0)',
        'tolerance' => 'Tolerance',
        'iterations' => 'Nmax',
        'results' => 'Newton Results',
        'approximation' => 'An approximation of the root was found in '
    ],

    'secant' => [
        'name' => 'Secant',
        'function' => 'Function(fx)',
        'initialX' => 'Initial X(x0)',
        'secondX' => 'Second X(x1)',
        'tolerance' => 'Tolerance',
        'iterations' => 'Nmax',
        'results' => 'Secant Results',
        'approximation' => 'An approximation of the root was found in '
    ],

    'roots' => [
        'name' => 'Multiple Roots',
        'function' => 'Function(fx)',
        'dxFunction' => 'Derived Function(dfx)',
        'dxdxFunction' => 'Second Derived Function(2dfx)',
        'initialX' => 'Initial X(x0)',
        'tolerance' => 'Tolerance',
        'iterations' => 'Nmax',
        'results' => 'Multiple Roots Results',
        'approximation' => 'An approximation of the root was found in '
    ],

    'names' => [
        'elimination' => 'Simple Gaussian Elimination',
        'partial' => 'Partial Pivot',
        'total' => 'Total Pivot',
        'lusimple' => 'Simple LU',
        'lupartial' => 'Partial LU',
        'crout' => 'Crout',
        'doolittle' => 'Doolittle',
        'cholesky' => 'Cholesky',
        'jacobi' => 'Jacobi',
        'gauss' => 'Gauss Seidel',
        'sor' => 'SOR',
    ]
    
];
