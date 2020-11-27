
import math 
import numpy as np
import sympy as sm
import sys
import strToMatrix

def cubic_spline(table):
    try:
        table = strToMatrix.strToMatrix(table)
        x_vector = table[0].tolist()
        y_vector = table[1].tolist()
    except:
       print("Error: check type of input values") 
       sys.exit(1) 
    try:
        n = len(x_vector)
        x = sm.symbols('x')
        # we implement the steps of cubic splines
        m = 4*(n-1)
        matrix = np.zeros((m,m))
        b = y_vector
        #interpolation
        matrix[0][0] = math.pow(x_vector[0], 3)
        matrix[0][1] = math.pow(x_vector[0], 2)
        matrix[0][2] = x_vector[0]
        matrix[0][3] = 1
        for i in range(1,n):
            matrix[i][4*(i)-4] = math.pow(x_vector[i], 3)
            matrix[i][4*(i)-3] = math.pow(x_vector[i], 2)
            matrix[i][4*(i)-2] = x_vector[i]
            matrix[i][4*(i)-1] = 1
        #continuity 
        for i in range(1, n-1):
            matrix[n-1+i][4*i-4] = math.pow(x_vector[i], 3)
            matrix[n-1+i][4*i-3] = math.pow(x_vector[i], 2)
            matrix[n-1+i][4*i-2] = x_vector[i]
            matrix[n-1+i][4*i-1] = 1
            matrix[n-1+i][4*i] = -math.pow(x_vector[i], 3)
            matrix[n-1+i][4*i+1] = -math.pow(x_vector[i], 2)
            matrix[n-1+i][4*i+2] = -x_vector[i]
            matrix[n-1+i][4*i+3] = -1
            b.append(0)
        #smoothness
        for i in range(1, n-1):
            matrix[2*n-3+i][4*i-4] = 3 * math.pow(x_vector[i], 2)
            matrix[2*n-3+i][4*i-3] = 2 * x_vector[i]
            matrix[2*n-3+i][4*i-2] = 1
            matrix[2*n-3+i][4*i-1] = 0
            matrix[2*n-3+i][4*i] = -3 * math.pow(x_vector[i], 2)
            matrix[2*n-3+i][4*i+1] = -2 * x_vector[i]
            matrix[2*n-3+i][4*i+2] = -1
            matrix[2*n-3+i][4*i+3] = 0
            b.append(0)
        #concavity 
        for i in range(1, n-1):
            matrix[3*n-5+i][4*i-4] = 6 * x_vector[i]
            matrix[3*n-5+i][4*i-3] = 2
            matrix[3*n-5+i][4*i-2] = 0
            matrix[3*n-5+i][4*i-1] = 0
            matrix[3*n-5+i][4*i]   = -6 * x_vector[i]
            matrix[3*n-5+i][4*i+1] = -2
            matrix[3*n-5+i][4*i+2] = 0
            matrix[3*n-5+i][4*i+3] = 0
            b.append(0)
        #border
        matrix[m-2][0] = 6 * x_vector[0]
        matrix[m-2][1] = 2
        b.append(0)
        matrix[m-1][m-4] = 6 * x_vector[n-1]
        matrix[m-1][m-3] = 2
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
            i.append('{:.6f}'.format(x_vector[iteration+3]))
            iteration = iteration + 4
            splines_coef.append(i)
        
        # we form the tracers
        splines = []
        for i in range(len(splines_coef)):
            splines.append((float(splines_coef[i][0])*(x**3))+(float(splines_coef[i][1])*(x**2))+(float(splines_coef[i][2])*x)+float(splines_coef[i][3]))
        print("Tracer coefficients: ")
        print(f"{splines_coef}\n")
        print("Tracers: ")
        print(f"{splines}\n")
    except:
        print("Error: Initial data error, try again")
        sys.exit(1)  
        
np.set_printoptions(precision=7)
#table = [[-1,0,3,4],[15.5,3,8,1]]
cubic_spline(sys.argv[1])