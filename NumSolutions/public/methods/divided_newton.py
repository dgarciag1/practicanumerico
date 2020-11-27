import numpy as np
import sys
import strToMatrix

def divided_newton(table):
    table = strToMatrix.strToMatrix(table)
    # here is the iterations of the method
    x_vector = np.array(table[0])
    y_vector = np.array(table[1])
    n = len(x_vector)
    matrix = np.zeros((n,n))
    
    matrix[:,0] = y_vector.T

    for i in range(1,n):
        aux0 = matrix[i-1:n,i-1]
        aux1 = np.diff(aux0)
        aux2 = np.subtract(x_vector[i:n],x_vector[0:n-i])
        matrix[i:n,i] = np.divide(aux1,np.transpose(aux2))

    results = np.diag(matrix)
    # we print the results
    print("Results: ")
    print("table of divided differences:")
    print(matrix)
    print("coefficients of the newton polynomial:")
    print(results)
    print("Newton Polynomal:")
    string = ""
    for i in range(len(results)):
        number = ""
        x = float(results[i])
        if(results[i]>0 and i>0):
            number = "+"+f"{'{:.7f}'.format(x)}"
        else:
            number = f"{'{:.7f}'.format(x)}"
        if(i==len(results)-1): 
           string = string+number
        elif(i==len(results)-2):
           string = string+f"{number}x"
        else:
           string = string+f"{number}x^{len(results)-i-1}"
    print(string)
    return results
    
np.set_printoptions(precision=7)
#table = [[-1, 0, 3, 4],[15.5, 3, 8, 1]]
divided_newton(sys.argv[1])