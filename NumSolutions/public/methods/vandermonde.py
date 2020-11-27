import numpy as np
import sys
import strToMatrix 

def vandermonde(table):
    try:
        table  = strToMatrix.strToMatrix(table)
        # here is the iterations of the method
        results = np.array([])
        x_vector = np.array(table[0])
        y_vector = np.array(table[1])
    except:
       print("Error: check type of input values") 
       sys.exit(1)  
    try:
        n = len(x_vector)
        matrix = np.zeros((n,n))
        
        for i in range(n):
            for j in range(n):
                matrix[j][i] = x_vector[j]**(n-(i+1))
        
        transposed = np.array(y_vector.T)
        coefficient = np.linalg.inv(matrix).dot(transposed) 
        for i in coefficient:
            results = np.append(results, '{:.7f}'.format(i))
        # we print the results
        print("Vandermonde Matrix:")
        print(f"{matrix}\n")
        print("Coefficients of the polynomial:")
        print(f"{results}\n")
        print("Polynomal:")
        string = ""
        for i in range(len(results)):
            number = ""
            if(results[i]>np.str(0) and i>0):
                number = "+"+f"{results[i]}"
            else:
                number = f"{results[i]}"
            if(i==len(results)-1): 
                string = string+number
            elif(i==len(results)-2):
                string = string+f"{number}x"
            else:
                string = string+f"{number}x^{len(results)-i-1}"
        print(string)
        return results
    except:
        print("Error: Initial data error, try again")
        sys.exit(1)   

np.set_printoptions(precision=7)
#table = [[-1, 0, 3, 4],[15.5, 3, 8, 1]]
vandermonde(sys.argv[1])