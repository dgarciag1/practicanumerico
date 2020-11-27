import numpy as np
import sys 
import strToMatrix
import substitution

def crout(A,b):
    # here is the stages of the method
    l_stages = {}
    u_stages = {}
    A = strToMatrix.strToMatrix(A)
    b = strToMatrix.strToMatrix(b)
    aux_A = np.array(A)
    #we create the initial "u" matrix
    triangular_top = np.identity(aux_A.shape[0])
    # we create the initial "l" matrix
    lower_triangular = np.zeros((aux_A.shape[0],aux_A.shape[0]))
    # we add the first stage of the method
    l_stages[0] = np.array(lower_triangular)
    u_stages[0] = np.array(triangular_top)
    # we factor
    for i in range(A.shape[0]):
        # var_number is the diagonal number of each column
        var_number = aux_A[i][i]
        # if a diagonal number is zero there is no solution for the matrix 
        if(var_number==0):
            print(f"There is no solution for this matrix because the diagonal number in A[{i}][{i}] is zero")
            break
        for k in range(i, len(A)): 
            # the result will be the operations to find l[i][j] or u[i][j]
            result = 0
            for j in range(i):
                # we multiply the rows of "l" by the column "i" of "u"
                result += (lower_triangular[k][j] * triangular_top[j][i])
            lower_triangular[k][i] = A[k][i] - result
        for k in range(i, len(A)):        
            if (i == k):
                triangular_top[i][i] = 1
            else:
                # the result will be the operations to find l[i][j] or u[i][j]
                result = 0
                for j in range(i):
                    # we multiply the row "i" of "l" by the columns of "u"
                    result += (lower_triangular[i][j] * triangular_top[j][k])
                triangular_top[i][k] = ((A[i][k] - result)/lower_triangular[i][i])
       
        # we add the i stage of the method
        u_stages[i+1] = np.array(triangular_top)
        l_stages[i+1] = np.array(lower_triangular)
    for i in range(len(l_stages)):
        print(f"Stage {i}:")
        print("L:")
        print(f"{l_stages[i]}\n")
        print("U:")
        print(f"{u_stages[i]}\n")
    l_aux = np.vstack((((l_stages[len(l_stages)-1]).T),b))
    z_values = np.array(substitution.progSubs(l_aux.T))
    u_aux = np.vstack((((u_stages[len(u_stages)-1]).T),z_values))
    x_values = np.array(substitution.backSubs(u_aux.T))
    print(f"x: ")
    print(f"{np.transpose(x_values)}\n")        
    l = lower_triangular
    u = triangular_top
    return l,u,l_stages,u_stages

np.set_printoptions(precision=7)
#M = [[4, -1, 0, 3],[1, 15.5, 3, 8], [0, -1.3, -4, 1.1], [14, 5, -2, 30]]
#A = np.array(M)
crout(sys.argv[1], sys.argv[2])