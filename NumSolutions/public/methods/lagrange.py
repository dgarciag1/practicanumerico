import numpy as np
import sympy as sm
import sys
import strToMatrix

def lagrange(table):
    table = strToMatrix.strToMatrix(table)
    x_vector = table[0].tolist()
    y_vector = table[1].tolist()
    results = {}
    #we create the unknown of the equation
    x = sm.symbols('x')
    n = len(x_vector)
    final_equation = []
    polynomial = 0
    for i in range(0,n):
        #numerator of our expression
        num = 1
        #denominator of our expression
        den = 1
        for j in range(0,n):
            if j != i:
                num = num*(x-x_vector[j])
                den = den*(x_vector[i]-x_vector[j])
        # Lagrange interpolating polynomials
        interpolant = num/den
        interpolant = interpolant.expand()
        results[i] = interpolant
        # here we put each equation
        equation = num*y_vector[i]/den
        equation = equation.expand()
        # we add each equation to obtain the final polynomial
        polynomial += equation

    results['polynomial'] = polynomial
    print(results)
    return results

np.set_printoptions(precision=7)
#table = [[-1, 0, 3, 4],[15.5, 3, 8, 1]]
lagrange(sys.argv[1])