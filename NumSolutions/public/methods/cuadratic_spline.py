
import math 
import sympy as sm
import numpy as np
import sys
import strToMatrix

def cuadratic_spline(table):
    table = strToMatrix.strToMatrix(table)
    x_vector = table[0].tolist()
    y_vector = table[1].tolist()
    n = len(x_vector)
    x = sm.symbols('x')
    # we implement the steps of cuadratic splines
    m = 3*(n-1)
    matrix = np.zeros((m,m))
    b = y_vector
    #interpolation
    matrix[0][0] = math.pow(x_vector[0], 2)
    matrix[0][1] = x_vector[0]
    matrix[0][2] = 1
    for i in range(1,n):
        matrix[i][3*(i)-3] = math.pow(x_vector[i], 2)
        matrix[i][3*(i)-2] = x_vector[i]
        matrix[i][3*(i)-1] = 1
    #continuity
    for i in range(1, n-1):
        matrix[n-1+i][3*i-3] = math.pow(x_vector[i], 2)
        matrix[n-1+i][3*i-2] = x_vector[i]
        matrix[n-1+i][3*i-1] = 1
        matrix[n-1+i][3*i] = -math.pow(x_vector[i], 2)
        matrix[n-1+i][3*i+1] = -x_vector[i]
        matrix[n-1+i][3*i+2] = -1
        b.append(0)
    #smoothness
    for i in range(1, n-1):
        matrix[2*n-3+i][3*i-3] = 2*x_vector[i]
        matrix[2*n-3+i][3*i-2] = 1
        matrix[2*n-3+i][3*i-1] = 0
        matrix[2*n-3+i][3*i] = -2*x_vector[i]
        matrix[2*n-3+i][3*i+1] = -1
        matrix[2*n-3+i][3*i+2] = 0
        b.append(0)
    #border
    matrix[m-1][0] = 2
    b.append(0)

    matrix = np.array(matrix)
    x_vector = np.linalg.inv(matrix).dot(b) 
    splines_coef = []
    iteration = 0
    # we add the coefficients
    while iteration < len(x_vector)-1:
        i = []
        i.append('{:.6f}'.format(x_vector[iteration]))
        i.append('{:.6f}'.format(x_vector[iteration+1]))
        i.append('{:.6f}'.format(x_vector[iteration+2]))
        iteration = iteration + 3
        splines_coef.append(i)
    
    # we form the tracers
    splines = []
    for i in range(len(splines_coef)):
        splines.append((float(splines_coef[i][0])*(x**2))+(float(splines_coef[i][1])*x)+float(splines_coef[i][2]))
    print("Tracer coefficients: ")
    print(splines_coef)
    print("Tracers: ")
    print(splines)

np.set_printoptions(precision=7)
#table = [[-1,0,3,4],[15.5,3,8,1]]
cuadratic_spline(sys.argv[1])
