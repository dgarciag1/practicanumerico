
import numpy as np
import sys
import strToMatrix 
import substitution

def partial_pivot(A,b):
    A = strToMatrix.strToMatrix(A)
    b = strToMatrix.strToMatrix(b)
    A = np.vstack((A.T,b)).T 
    stages = {}
    aux_A = np.array(A)
    stages[0] = np.array(A)
    # we reduce the system
    for i in range(A.shape[0]-1):
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
            A[i]=np.array(A[i+pos_max_number])
            A[i+pos_max_number] = var_matrix
        if (max_number==0 and i == A.shape[0]-2):
            print ("There is no solution for this matrix")
        # row where there is max_number
        max_row = aux_A[0] 
        # column where there is max_number
        max_column = np.reshape(aux_A.T[0][1:], (aux_A.T[0][1:].shape[0], 1))
        # the multiplier will be max_column/max_number
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
        # we create the new aux_A skipping previous rows and columns
        aux_A = new_rows.T[1:].T
        stages[i+1] = np.array(A)
    for i in range(len(stages)):
        print(f"Stage {i}:")
        print(stages[i])
    x_values = np.array(substitution.backSubs(stages[len(stages)-1]))
    print(f"x: ")
    print(np.transpose(x_values))
    return stages, x_values

np.set_printoptions(precision=7)
#M = [[2, -1, 0, 3, 1],[1, 0.5, 3, 8, 1], [0, 13, -2, 11, 1], [14, 5, -2, 3, 1]]
#A = np.array(M)
partial_pivot(sys.argv[1], sys.argv[2])