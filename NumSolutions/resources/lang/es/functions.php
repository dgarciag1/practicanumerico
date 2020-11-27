<?php

return [
    'title' => 'Funciones',
    'methods' => 'Métodos de funciones',

    'holder' => [
        'function' => 'Ingrese la función',
        'gFunction' => 'Ingrese la función gx',
        'dxFunction' => 'Ingrese la  derivada de la función fx',
        'dxdxFunction' => 'Ingrese la segunda derivada de la función fx',
        'initialX' => 'Ingrese el valor inicial',
        'secondX' => 'Ingrese el segundo valor inicial',
        'delta' => 'Ingrese el valor delta',
        'iterations' => 'Ingrese el número máximo de iteraciones',
        'aPoint' => 'Ingrese el punto inferior(a) del intervalo',
        'bPoint' => 'Ingrese el punto superior(b) del intervalo',
        'tolerance' => 'Ingrese la tolerancia',
        'calculate' => 'Calcular',
        'error' => 'ERROR'
    ],

    'incremental' => [
        'roots' => 'Raíces de Fx',
        'name' => 'Búsqueda Incremental',
        'function' => 'Función (fx)',
        'initialX' => 'X inicial(x0)',
        'delta' => 'Delta Δ',
        'iterations' => 'Nmax',
        'results' => 'Resultados de Búsqueda Incremental'
    ],

    'bisection' => [
        'name' => 'Bisección',
        'function' => 'Función (fx)',
        'aPoint' => 'Punto inferior(a)',
        'bPoint' => 'Punto superior(b)',
        'tolerance' => 'Tolerancia',
        'iterations' => 'Nmax',
        'results' => 'Resultados de Bisección',
        'approximation' => 'Se encontró una aproximación de la raíz en '
    ],

    'falseRule' => [
        'name' => 'Regla Falsa',
        'function' => 'Función (fx)',
        'aPoint' => 'Punto inferior(a)',
        'bPoint' => 'Punto superior(b)',
        'tolerance' => 'Tolerancia',
        'iterations' => 'Nmax',
        'results' => 'Resultados de Regla Falsa',
        'approximation' => 'Se encontró una aproximación de la raíz en '
    ],

    'fixedPoint' => [
        'name' => 'Punto Fijo',
        'function' => 'Función (fx)',
        'gFunction' => 'Función (gx)',
        'initialX' => 'X inicial(x0)',
        'tolerance' => 'Tolerancia',
        'iterations' => 'Nmax',
        'results' => 'Resultados de Punto Fijo',
        'approximation' => 'Se encontró una aproximación de la raíz en '
    ],

    'newton' => [
        'name' => 'Newton',
        'function' => 'Función (fx)',
        'dxFunction' => 'Derivada de la Función (dfx)',
        'initialX' => 'X inicial(x0)',
        'tolerance' => 'Tolerancia',
        'iterations' => 'Nmax',
        'results' => 'Newton Results',
        'approximation' => 'Se encontró una aproximación de la raíz en '
    ],

    'secant' => [
        'name' => 'Secante',
        'function' => 'Función (fx)',
        'initialX' => 'X inicial(x0)',
        'secondX' => 'Segunda X inicial(x1)',
        'tolerance' => 'Tolerancia',
        'iterations' => 'Nmax',
        'results' => 'Resultados de Secante',
        'approximation' => 'Se encontró una aproximación de la raíz en '
    ],

    'roots' => [
        'name' => 'Raíces Múltiples',
        'function' => 'Función (fx)',
        'dxFunction' => 'Derivada de la Función (dfx)',
        'dxdxFunction' => 'Segunda Derivada de la Función (2dfx)',
        'initialX' => 'X inicial(x0)',
        'tolerance' => 'Tolerancia',
        'iterations' => 'Nmax',
        'results' => 'Resultados de Raíces Múltiples',
        'approximation' => 'Se encontró una aproximación de la raíz en '
    ],

    'names' => [
        'incremental' => 'Búsqueda Incremental',
        'bisection' => 'Bisección',
        'falseRule' => 'Regla Falsa',
        'fixedPoint' => 'Punto Fijo',
        'newton' => 'Newton',
        'secant' => 'Secante',
        'roots' => 'Raíces Múltiples'
    ]
    
];
