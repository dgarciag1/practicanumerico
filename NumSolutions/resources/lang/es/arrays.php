<?php

return [
    'title' => 'Matrices',
    'methods' => 'Métodos de Matrices',

    'holder' => [
        'matrix' => 'Ingrese la matriz A',
        'vector' => 'Ingrese el vector b',
        'initial' => 'Ingrese el vector inicial (x0)',
        'iterations' => 'Ingrese el número máximo de iteraciones',
        'tolerance' => 'Ingrese la tolerancia',
        'w_value' => 'Ingrese el valor w',
        'inputSize' => 'Ingrese el tamaño de la matriz',
        'size' => 'Tamaño de la matriz',
        'continue' => 'Continuar',
        'calculate' => 'Calcular',
        'error' => 'ERROR',
        'stages' => 'Etapas y vector X',
        'jacobiResults' => 'Vectores T,C y radio espectral',
        'iters' => 'Tabla de iteraciones'
    ],

    'elimination' => [
        'name' => 'Eliminación Gaussiana Simple',
        'matrix' => 'Matriz A',
        'vector' => 'Vector b',
        'results' => 'Resultados de Eliminación Gaussiana Simple'
    ],

    'partial' => [
        'name' => 'Pivoteo Parcial',
        'matrix' => 'Matriz A',
        'vector' => 'Vector b',
        'results' => 'Resultados de Pivoteo Parcial'
    ],

    'total' => [
        'name' => 'Pivoteo Total',
        'matrix' => 'Matriz A',
        'vector' => 'Vector b',
        'results' => 'Resultados de Pivoteo Total'
    ],

    'lusimple' => [
        'name' => 'Factorizacion LU Simple',
        'matrix' => 'Matriz A',
        'vector' => 'Vector b',
        'results' => 'Resultados de Factorizacion LU Simple'
    ],

    'lupartial' => [
        'name' => 'LU con Pivoteo',
        'matrix' => 'Matriz A',
        'vector' => 'Vector b',
        'results' => 'Resultados de LU con Pivoteo'
    ],

    'crout' => [
        'name' => 'Crout',
        'matrix' => 'Matriz A',
        'vector' => 'Vector b',
        'results' => 'Resultados de Crout '
    ],

    'doolittle' => [
        'name' => 'Doolittle',
        'matrix' => 'Matriz A',
        'vector' => 'Vector b',
        'results' => 'Resultados de Doolittle'
    ],

    'cholesky' => [
        'name' => 'Cholesky',
        'matrix' => 'Matriz A',
        'vector' => 'Vector b',
        'results' => 'Resultados de Cholesky'
    ],

    'jacobi' => [
        'name' => 'Jacobi',
        'matrix' => 'Matriz A',
        'vector' => 'Vector b',
        'initial' => 'Vector x0',
        'tolerance' => 'Tolerancia',
        'iterations' => 'Nmax',
        'results' => 'Resultados de Jacobi'
    ],

    'gauss' => [
        'name' => 'Gauss Seidel',
        'matrix' => 'Matriz A',
        'vector' => 'Vector b',
        'initial' => 'Vector x0',
        'tolerance' => 'Tolerancia',
        'iterations' => 'Nmax',
        'results' => 'Resultados de Gauss Seidel'
    ],

    'sor' => [
        'name' => 'SOR',
        'matrix' => 'Matriz A',
        'vector' => 'Vector b',
        'initial' => 'Vector x0',
        'tolerance' => 'Tolerancia',
        'w_value' => 'Valor W',
        'iterations' => 'Nmax',
        'results' => 'Resultados de SOR'
    ],

    'names' => [
        'elimination' => 'Eliminación Gaussiana Simple',
        'partial' => 'Pivoteo parcial',
        'total' => 'Pivoteo Total',
        'lusimple' => 'Factorización LU Simple',
        'lupartial' => 'LU con pivoteo',
        'crout' => 'Crout',
        'doolittle' => 'Doolittle',
        'cholesky' => 'Cholesky',
        'jacobi' => 'Jacobi',
        'gauss' => 'Gauss Seidel',
        'sor' => 'SOR',
    ]
    
];
