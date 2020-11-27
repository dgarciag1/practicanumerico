import numpy as np

def backSubs(matrix):
    size = matrix.shape[0]
    x_array = np.zeros(size,dtype=float)
    for i in range(size):
        sub = 0
        n = size-1-i
        for j in range(size):
            if(n != j):
                sub = sub - (x_array[j]*matrix[n][j])            
        x_array[n] = ((matrix[n][size])+(sub))/(matrix[n][n])
    return x_array


def progSubs(matrix):
    size = matrix.shape[0]
    x_array = np.zeros(size,dtype=float)
    for i in range(size):
        sub = 0
        for j in range(size):
            if(i != j):
                sub = sub - (x_array[j]*matrix[i][j])            
        x_array[i] = ((matrix[i][size])+(sub))/(matrix[i][i])
    return x_array

def backSubsC(matrix):
    size = matrix.shape[0]
    x_array = np.zeros(size,dtype=np.complex_)
    for i in range(size):
        sub = 0
        n = size-1-i
        for j in range(size):
            if(n != j):
                sub = sub - (x_array[j]*matrix[n][j])            
        x_array[n] = ((matrix[n][size])+(sub))/(matrix[n][n])
    return x_array


def progSubsC(matrix):
    size = matrix.shape[0]
    x_array = np.zeros(size,dtype=np.complex_)
    for i in range(size):
        sub = 0
        for j in range(size):
            if(i != j):
                sub = sub - (x_array[j]*matrix[i][j])            
        x_array[i] = ((matrix[i][size])+(sub))/(matrix[i][i])
    return x_array