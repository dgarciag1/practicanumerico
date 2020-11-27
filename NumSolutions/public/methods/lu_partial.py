
import numpy as np
import sys
import strToMatrix
import substitution

def lu_partial(A,b):
    A = strToMatrix.strToMatrix(A)
    b = strToMatrix.strToMatrix(b)
    # here is the stages of the method
    stages = {}
    l_stages = {}
    u_stages = {}
    p_stages = {}
    aux_A = np.array(A)
    #we create the initial "u" matrix
    triangular_top = np.zeros((aux_A.shape[0],aux_A.shape[0]))
    # we create the initial "l" matrix
    lower_triangular = np.identity(aux_A.shape[0])
    # we initialize p with the identity matrix
    p = np.identity(aux_A.shape[0])
    # we add the first stage of the method
    stages[0] = np.array(A)
    l_stages[0] = np.array(lower_triangular)
    u_stages[0] = np.array(triangular_top)
    p_stages[0] = np.array(p)
    # we factor
    for i in range(A.shape[0]):
        # max_number is the maximun number in column i
        # initially max_number is the number in position [i][i] from the matrix
        max_number = aux_A[0][0]
        # absolute value of variable column
        column = np.abs(aux_A.T[0])
        # position of maximum number in variable column
        pos_max_number = np.where(column == np.max(column))[0][0]
        if(pos_max_number != 0):
            # we change the rows in aux_A matrix
            max_number = aux_A[pos_max_number][0]
            var_matrix = np.array(aux_A[0])
            aux_A[0] = np.array(aux_A[pos_max_number])
            aux_A[pos_max_number] = var_matrix
            # we change the rows in A matrix
            var_matrix = np.array(A[i])
            var_p =  np.array(p[i])
            A[i]=np.array(A[i+pos_max_number])
            p[i]=np.array(p[i+pos_max_number])
            A[i+pos_max_number] = var_matrix
            p[i+pos_max_number] = var_p
        # if a diagonal number is zero there is no solution for the matrix 
        if(max_number==0):
            print(f"There is no solution for this matrix because the diagonal number in A[{i}][{i}] is zero")
            break
        # row where there is max_number
        max_row = aux_A[0] 
        # column where there is max_number
        max_column = np.reshape(aux_A.T[0][1:], (aux_A.T[0][1:].shape[0], 1))
        # the multiplier will be var_column/var_number
        multiplier = max_column/max_number  
        new_rows = aux_A[1:]             
        # rows with new values
        new_rows = new_rows - (multiplier*max_row)
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
        p_stages[i+1] = np.array(p)
        # we create the new aux_A skipping previous rows and columns
        aux_A = new_rows.T[1:].T
    for i in range(len(stages)):
        print(f"Stage {i}:")
        print(stages[i])
        print("L:")
        print(l_stages[i])
        print("U:")
        print(u_stages[i])
        print("P:")
        print(p_stages[i])
    l_aux = np.vstack((((l_stages[len(l_stages)-1]).T),b))
    z_values = np.array(substitution.progSubs(l_aux.T))
    u_aux = np.vstack((((u_stages[len(u_stages)-1]).T),z_values))
    x_values = np.array(substitution.backSubs(u_aux.T))
    print(f"x: ")
    print(np.transpose(x_values))
    l = lower_triangular
    u = triangular_top
    return l,u,stages,l_stages,u_stages,p

np.set_printoptions(precision=7)
#M = [[4, -1, 0, 3],[1, 15.5, 3, 8], [0, -1.3, -4, 1.1], [14, 5, -2, 30]]
#A = np.array(M)
lu_partial(sys.argv[1], sys.argv[2]) 
   