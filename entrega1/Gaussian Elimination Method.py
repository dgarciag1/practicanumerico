import sympy as sm

def gaussianEliminationMethod(A, b, n, iterations, tolerance):
  count = 1
  x = [0, 0, 0, 0]
  error = tolerance + 1
  while(count <= iterations and error > tolerance):
    error = 0
    for i in range(1, n):
      sum = 0
      for p in range(1, n):
        if(i != p):
          sum = sum + A[i][p]*b[p]
      x[i] = (A[i][n]-sum)/A[i][i]
      error = abs(x[i]-b[i])
      b[i] = x[i]
    count += 1
  if(error <= tolerance):
    print("Aproximate solution to the system with a tolerance of", tol, "is", x[i])
  else:
    print("The function failed in", iterations, "iterations")
  
A = [[ 2.0, -1.0,  0.0,  3.0], 
     [ 1.0,  0.5,  3.0,  8.0],
     [ 0.0, 13.0, -2.0, 11.0],
     [14.0,  5.0, -2.0,  3.0]]
b = [1, 1, 1, 1]
n = 3
iterations = 100
tolerance = 0.0000001

gaussianEliminationMethod(A, b, n, iterations, tolerance)