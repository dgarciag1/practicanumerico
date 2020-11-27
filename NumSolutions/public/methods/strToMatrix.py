import math
import sys 
import numpy as np

def strToMatrix(A):
    matrix = str(A).replace(' ', '').split('],[')
    new_array = matrix
    for i in range(len(new_array)):
           new_array[i] = new_array[i].replace('[','').replace(']','').split(',')
    for i in range(len(new_array)):
       for j in range(len(new_array[i])):
           if(new_array[i][j] == ''):
               del(new_array[i][j])
           new_array[i][j] = float(new_array[i][j])
    if(len(new_array)>1):
        new_array = np.array(new_array, dtype=float)
    else:
        new_array = np.array(new_array[0], dtype=float)
    return new_array


#strToMatrix(sys.argv[1])