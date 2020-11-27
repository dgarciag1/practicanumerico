
import numpy as np
import sys
import strToMatrix 
import substitution

def total_pivot(A,b):
    A = strToMatrix.strToMatrix(A)
    b = strToMatrix.strToMatrix(b)
    A = np.vstack((A.T,b)).T    
    stages ={}
    # we save in the variable "changes" the exchanges of columns in the matrix "A"
    changes = {}
    change_num = 0
    aux_A= np.array(A)
    stages[0] = np.array(A)
    # we reduce the system
    for i in range(A.shape[0]-1):
        new_matrix = np.delete(aux_A, aux_A.shape[1]-1, axis=1)
        # max_number is the maximun number in column i
        # initially max_number is the number in position [i][i] from the matrix
        max_number = new_matrix[0][0]
        # position of maximum number in variable row
        pos_max_number = 0
        max_row = 0
        # we find the row where the maximum number is
        for j in range(new_matrix.shape[0]):
            # we convert the numbers of each row to absolute value
            var_max_row = np.abs(new_matrix[j])
            # variable position where the max number is
            var_pos_max_number = np.where(var_max_row == np.max(var_max_row))[0][0]
            # variable where we are going to save the maximum number
            max_var_number = np.max(var_max_row)
            # we change the position and the max_number 
            if(max_number<max_var_number):
                max_number = max_var_number
                pos_max_number = var_pos_max_number
                max_row = j
        # if max_row is nonzero, we need to change rows
        if(max_row != 0):
            # we change the row i and the row where the maximum number is
            max_number = aux_A[max_row][pos_max_number]
            var_row = np.array(aux_A[0])
            aux_A[0] = np.array(aux_A[max_row])
            aux_A[max_row] = var_row
            # we change the rows in A matrix
            var_row = np.array(A[i])
            A[i]=np.array(A[i+max_row])
            A[i+max_row] = var_row
        # if the position (column) of max_number in the row is non-zero, we need to change the columns
        if (pos_max_number!=0):
            # we change the column i and the column where the maximum number is
            matrixA_transpose = np.array(aux_A.T)
            var_column = np.array(matrixA_transpose[0])
            matrixA_transpose[0] = np.array(matrixA_transpose[pos_max_number])
            matrixA_transpose[pos_max_number] = var_column
            aux_A = np.array(matrixA_transpose.T)
            # we change the columns in A matrix
            matrixA_transpose = np.array(A.T)
            var_column = np.array(matrixA_transpose[i])
            matrixA_transpose[i] = np.array(matrixA_transpose[pos_max_number+i])
            matrixA_transpose[pos_max_number+i] = var_column
            A = np.array(matrixA_transpose.T)
            changes[change_num] = [i,pos_max_number+i]
            change_num += 1 
        if (max_number==0 and i == A.shape[0]-2):
            print ("There is no solution for this matrix")
        max_number = aux_A[0][0]
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
    for i in changes:
        auxiliar = x_values[changes[i][0]]
        x_values[changes[i][0]] = x_values[changes[i][1]]
        x_values[changes[i][1]] = auxiliar
    print(f"x: ")
    print(np.transpose(x_values))    
    matrix = np.delete(A, A.shape[1]-1, axis=1)
    matrixT = A.T[A.shape[1]-1]
    return matrix,matrixT,stages,changes

np.set_printoptions(precision=7)
#M = [[2, -1, 0, 3, 1],[1, 0.5, 3, 8, 1], [0, 13, -2, 11, 1], [14, 5, -2, 3, 1]]
#A = np.array(M)
total_pivot(sys.argv[1], sys.argv[2])