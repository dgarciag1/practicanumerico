
import numpy as np
import sys
import cmath 
import strToMatrix
import substitution

def cholesky(A,b):
    try:
        A = strToMatrix.strToMatrix(A)
        b = strToMatrix.strToMatrix(b)
    except:
       print("Error: check type of input values") 
       sys.exit(1) 
    try:
        # here is the stages of the method
        l_stages = {}
        u_stages = {}
        aux_A = np.array(A)
        determinant = np.linalg.det(aux_A) 
        if determinant == 0:
            print("Error: Determinant equal to 0")
            sys.exit(1)
        # We create the initial "u" matrix with complex type for when we operate roots
        triangular_top = np.zeros((aux_A.shape[0],aux_A.shape[0]),dtype=np.complex_)
        # We create the initial "l" matrix with complex type for when we operate roots
        lower_triangular = np.zeros((aux_A.shape[0],aux_A.shape[0]),dtype=np.complex_)
        # we add the first stage of the method
        l_stages[0] = np.array(lower_triangular)
        u_stages[0] = np.array(triangular_top)
        # we factor
        for i in range(A.shape[0]):
            # var_number is the diagonal number of each column
            var_number = aux_A[i][i]
            # if a diagonal number is zero there is no solution for the matrix 
            if(var_number==0):
                print(f"Error: There is no solution for this matrix because the diagonal number in A[{i}][{i}] is zero")
                sys.exit(1)
            result = 0
            for k in range(len(A)):
                result += lower_triangular[i][k] * triangular_top[k][i]   
            # We use the cmath library because when we find the root there 
            # can be a negative number and the library supports complex numbers 
            diagonal = cmath.sqrt(A[i][i] - result)
            lower_triangular[i][i] = diagonal
            triangular_top[i][i] = lower_triangular[i][i]
            for k in range(i, len(A)): 
                if(i != k):
                    # the result will be the operations to find l[i][j] or u[i][j]
                    result = 0
                    for j in range(i):
                        # we multiply the rows of "l" by the column "i" of "u"
                        result += (lower_triangular[k][j] * triangular_top[j][i])
                    lower_triangular[k][i] = ((A[k][i] - result)/lower_triangular[i][i])
            for k in range(i, len(A)):        
                if (i != k):
                    # the result will be the operations to find l[i][j] or u[i][j]
                    result = 0
                    for j in range(i):
                        # we multiply the row "i" of "l" by the columns of "u"
                        result += (lower_triangular[i][j] * triangular_top[j][k])
                    triangular_top[i][k] = ((A[i][k] - result)/lower_triangular[i][i])
            
            u_stages[i+1] = np.array(triangular_top)
            l_stages[i+1] = np.array(lower_triangular)
        for i in range(len(l_stages)):
            print(f"Stage {i}:")
            print("L:")
            print(f"{l_stages[i]}\n")
            print("U:")
            print(f"{u_stages[i]}\n")
    except:
         print("Error: Initial data error, try again")
         sys.exit(1) 
    try:
        l_aux = np.vstack((((l_stages[len(l_stages)-1]).T),b))
        z_values = np.array(substitution.progSubsC(l_aux.T))
        u_aux = np.vstack((((u_stages[len(u_stages)-1]).T),z_values))
    except:
        print("Error: progressive replacement could not be performed, try other values")
        sys.exit(1)
    try:
        x_values = np.array(substitution.backSubsC(u_aux.T))
        print(f"x: ")
        print(f"{np.transpose(x_values)}\n")        
        l = lower_triangular
        u = triangular_top
    except:
        print("Error: backsubstitution could not be executed, try other values")
        sys.exit(1)

np.set_printoptions(precision=7)
#M = [[4, -1, 0, 3],[1, 15.5, 3, 8], [0, -1.3, -4, 1.1], [14, 5, -2, 30]]
#A = np.array(M)
cholesky(sys.argv[1], sys.argv[2])