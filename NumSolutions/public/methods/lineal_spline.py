
import sympy as sm
import numpy as np
import sys
import strToMatrix

def lineal_spline(table):
    table = strToMatrix.strToMatrix(table)
    x_vector = table[0].tolist()
    y_vector = table[1].tolist()
    #we create the unknown of the equation
    x = sm.symbols('x')
    n = len(x_vector)
    m = 2*(n-1)
    # we implement the steps of linear splines
    matrix = np.zeros((m,m))
    iteration = 0
    b = y_vector
    for i in range(0,n):
        matrix[i][iteration] = x_vector[i]
        matrix[i][iteration+1] = 1
        if i >0:
            iteration = iteration + 2
    iteration = 0
    #interpolation
    for i in range(1,n-1):
        matrix[n][iteration] = x_vector[i]
        matrix[n][iteration+1] = 1
        matrix[n][iteration+2] = -(x_vector[i])
        matrix[n][iteration+3] = -1
        iteration = iteration + 2
        n = n + 1
        b.append(0)
 
    x_vector = np.linalg.inv(matrix).dot(b) 
    print(f"x vector is {x_vector}")
    splines_coef = []
    iteration = 0
    # we add the coefficients
    while iteration < len(x_vector)-1:
        i = []
        i.append('{:.6f}'.format(x_vector[iteration]))
        i.append('{:.6f}'.format(x_vector[iteration+1]))
        iteration = iteration + 2
        splines_coef.append(i)
    
    # we form the tracers
    splines = []
    for i in range(len(splines_coef)):
        splines.append((float(splines_coef[i][0])*x)+float(splines_coef[i][1]))
    print("Tracer coefficients: ")
    print(splines_coef)
    print("Tracers: ")
    print(splines)

np.set_printoptions(precision=7)
#table = [[-1,0,3,4],[15.5,3,8,1]]
lineal_spline(sys.argv[1])