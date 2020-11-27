import numpy as np
import sys
import strToMatrix

def divided_newton(table):
    try:
        table = strToMatrix.strToMatrix(table)
        # here is the iterations of the method
        x_vector = np.array(table[0])
        y_vector = np.array(table[1])
    except:
       print("Error: check type of input values") 
       sys.exit(1)  
    
    try:
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
        print("Table of divided differences:")
        print(f"{matrix}\n")
        print("Coefficients of the newton polynomial:")
        print(f"{results}\n")
        print("Newton Polynomal:")
        number = ""
        for i in range(len(results)):
            x = float(results[i])
            number = number+f"{'{:.7f}'.format(x)}"
            if(i>0):
                string = ""
                j = 0
                while( j < i):
                    if(x_vector[j]>0):
                        string = string+"(x-"+f"{'{:.7f}'.format(x_vector[j])}"+")"
                    elif(x_vector[j]==0):
                        string = string+"x"
                    else:
                        string = string+"(x+"+f"{'{:.7f}'.format(-x_vector[j])}"+")"
                    j+=1
                number = number+string
            if((i < (len(results)-1))and(results[i+1]>0)):
                number = number+"+"
            
        print(number)
    except:
        print("Error: Initial data error, try again")
        sys.exit(1)           
    
np.set_printoptions(precision=7)
#table = [[-1, 0, 3, 4],[15.5, 3, 8, 1]]
divided_newton(sys.argv[1])