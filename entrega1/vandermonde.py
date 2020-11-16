import numpy as np

def vandermonde(table):
    # here is the iterations of the method
    results = np.array([])
    x_vector = np.array(table[0])
    y_vector = np.array(table[1])

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
    print("Results: ")
    print("Vandermonde Matrix:")
    print(matrix)
    print("coefficients of the polynomial:")
    print(results)
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
    
np.set_printoptions(precision=7)
table = [[-1, 0, 3, 4],[15.5, 3, 8, 1]]
vandermonde(table)