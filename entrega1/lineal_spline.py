import sympy as sm
import numpy as np
import total_pivot


def lineal_spline(table):
    x_vector = table[0]
    y_vector = table[1]
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
    for i in range(1,n-1):
        matrix[n][iteration] = x_vector[i]
        matrix[n][iteration+1] = 1
        matrix[n][iteration+2] = -(x_vector[i])
        matrix[n][iteration+3] = -1
        iteration = iteration + 2
        n = n + 1
        b.append(0)
    a = np.matrix(matrix, dtype=float)
    b = np.matrix(b, dtype=float)
    matrix = np.insert(a, a.shape[1], b, axis=1)
    # we apply total pivot to the resulting matrix
    a,b,dic,movement = total_pivot.total_pivot(matrix)
    x_vector = np.linalg.inv(a).dot(b) 
    movement = movement.astype(int)
    for i in range(len(movement)-1,0,-2):
        temporal_value = x_vector[movement[i]]
        x_vector[movement[i]] = x_vector[movement[i-1]]
        x_vector[movement[i-1]] = temporal_value
    aux = x_vector
    splines_coef = []
    iteration = 0
    while iteration < len(aux)-1:
        i = []
        i.append(aux[iteration])
        i.append(aux[iteration+1])
        iteration = iteration + 2
        splines_coef.append(i)
    print("Tracer coefficients: ")
    print(splines_coef)
    print("Tracers: ")
    splines = []
    for i in range(len(splines_coef)):
        splines.append((float(splines_coef[i][0])*x)+float(splines_coef[i][1]))
    print(splines)
    
np.set_printoptions(precision=7)
table = [-1,0,3,4],[15.5,3,8,1]
lineal_spline(table)