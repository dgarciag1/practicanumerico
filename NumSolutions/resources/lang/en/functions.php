<?php

return [
    'title' => 'Functions',
    'methods' => 'Functions Methods',

    'holder' => [
        'function' => 'Enter the function',
        'gFunction' => 'Enter the gx function',
        'dxFunction' => 'Enter the derived function of fx',
        'dxdxFunction' => 'Enter the second derived function of fx',
        'initialX' => 'Enter the initial value',
        'secondX' => 'Enter the second initial value',
        'delta' => 'Enter the delta Value',
        'iterations' => 'Enter the iterations',
        'aPoint' => 'Enter the lower point(a) of the interval',
        'bPoint' => 'Enter the upper point(b) of the interval',
        'tolerance' => 'Enter the tolerance',
        'calculate' => 'Calculate',
        'error' => 'ERROR'
    ],

    'incremental' => [
        'roots' => 'Roots of Fx',
        'name' => 'Incremental Search',
        'function' => 'Function(fx)',
        'initialX' => 'Initial X(x0)',
        'delta' => 'Delta Δ',
        'iterations' => 'Nmax',
        'results' => 'Incremental Search Results'
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
        'incremental' => 'Incremental Search',
        'bisection' => 'Bisection',
        'falseRule' => 'False Rule',
        'fixedPoint' => 'Fixed Point',
        'newton' => 'Newton',
        'secant' => 'Secant',
        'roots' => 'Multiple Roots'
    ]
    
];
