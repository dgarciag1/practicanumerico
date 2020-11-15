
import numpy as np

def gaussian_simple(A):
    stages = {}
    aux_A = np.array(A)
    stages[0] = np.array(A)
    # we reduce the system
    for i in range(A.shape[0]-1):
        # var_number is the diagonal number of each column
        var_number = aux_A[0][0]
        if (var_number==0):
          if(i ==A.shape[0]-2):
            print ("There is no solution for this matrix")
            break
          else:
              for j in range(aux_A.shape[0]):
                  # we find a non-zero number to add to aux_A[i][0] (diagonal of matrix "A")
                  if (aux_A[j][0]!=0):
                      # we change the rows in aux_A matrix
                      var_number = aux_A[j][0]
                      var_A = np.array(aux_A[0])
                      aux_A[0] = aux_A[j]
                      aux_A[j] = var_A
                      # we change the rows in A matrix
                      var_A = np.array(A[i])
                      A[i]=np.array(A[i+j])
                      A[i+j] = var_A
                      break
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
    
        # we create the new aux_A skipping previous rows and columns
        aux_A = new_rows.T[1:].T
        stages[i+1] = np.array(A)
    for i in range(len(stages)):
        print(f"Stage {i}:")
        print(stages[i])
    return stages

np.set_printoptions(precision=7)
M = [[4, -1, 0, 3],[1, 15.5, 3, 8], [0, -1.3, -4, 1.1], [14, 5, -2, 30]]
A = np.array(M)
gaussian_simple(A)