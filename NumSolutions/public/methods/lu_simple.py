
import numpy as np
import sys
import strToMatrix
import substitution

def lu_simple(A,b):
    try:
        A = strToMatrix.strToMatrix(A)
        b = strToMatrix.strToMatrix(b)
    except:
       print("Error: check type of input values") 
       sys.exit(1) 
    try:
        # here is the stages of the method
        stages = {}
        l_stages = {}
        u_stages = {}
        aux_A = np.array(A)
        #we create the initial "u" matrix
        triangular_top = np.zeros((aux_A.shape[0],aux_A.shape[0]))
        # we create the initial "l" matrix
        lower_triangular = np.identity(aux_A.shape[0])
        # we add the first stage of the method
        stages[0] = np.array(A)
        l_stages[0] = np.array(lower_triangular)
        u_stages[0] = np.array(triangular_top)
        # we factor
        for i in range(A.shape[0]):
            # var_number is the diagonal number of each column
            var_number = aux_A[0][0]
            # if a diagonal number is zero there is no solution for the matrix 
            if(var_number==0):
                print(f"Error: There is no solution for this matrix because the diagonal number in A[{i}][{i}] is zero")
                sys.exit(1)
            # variable row we use to find the multiplier
            var_row = aux_A[0] 
            # column where there is the variable number
            var_column = np.reshape(aux_A.T[0][1:], (aux_A.T[0][1:].shape[0], 1))
            # the multiplier will be var_column/var_number
            multiplier = var_column/var_number  
            new_rows = aux_A[1:]             
            # rows with new values
            new_rows = new_rows - (multiplier*var_row)
            # we update the matrix "A"
            if(i != 0):
                aux_row = new_rows
                while (aux_row.shape[1]+1 <A[i+1:].shape[1]):
                    aux_row =  np.insert(aux_row, 0, np.zeros(1), axis=1)
                A[i+1:] = np.insert(aux_row, 0, np.zeros(1), axis=1)
            else:
                A[i+1:] = new_rows

            # we update the matrix "l" with the results of the last steps
            aux_l = np.append([1], multiplier.T)
            zeros_l = np.zeros(i)
            aux_l = np.append(zeros_l,aux_l)
            if (A.shape[0] - 1 != i):
                lower_triangular.T[i] = aux_l
            # we update the matrix "u" with the results of the last steps
            triangular_top[i] = A[i]
            # we add the i stage of the method
            stages[i+1] = np.array(A)
            u_stages[i+1] = np.array(triangular_top)
            l_stages[i+1] = np.array(lower_triangular)
            # we create the new aux_A skipping previous rows and columns
            aux_A = new_rows.T[1:].T
        for i in range(len(stages)):
            print(f"Stage {i}:")
            print(f"{stages[i]}\n")
            print("L:")
            print(f"{l_stages[i]}\n")
            print("U:")
            print(f"{u_stages[i]}\n")
    except:
         print("Error: Initial data error, try again")
         sys.exit(1) 
    try:     
        l_aux = np.vstack((((l_stages[len(l_stages)-1]).T),b))
        z_values = np.array(substitution.progSubs(l_aux.T))
        u_aux = np.vstack((((u_stages[len(u_stages)-1]).T),z_values))
    except:
        print("Error: progressive replacement could not be performed, try other values")
        sys.exit(1)
    try:    
        x_values = np.array(substitution.backSubs(u_aux.T))
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
lu_simple(sys.argv[1], sys.argv[2])