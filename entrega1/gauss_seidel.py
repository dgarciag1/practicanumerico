import numpy as np
from collections import defaultdict

def gauss_seidel(A,b,x0,tol,Nmax):
    # here is t matrix, c vector and the spectral radius
    radius_ct = {}
    # here is the iterations of the method
    results = defaultdict(list)
    
    diagonal = np.diag(np.diag(A))
    u = np.triu(-np.array(A),1)
    l = np.tril(-np.array(A),-1)
    new_matrix = diagonal-l
    t_results = np.matmul(np.linalg.inv(new_matrix),(u))
    c_results = np.matmul(np.linalg.inv(new_matrix),b)
    eigenvalues = np.linalg.eig(t_results)
    # we calculate the largest number of the eigenvalues of t_results
    radius = max(abs(eigenvalues[0]))
    radius_ct['T'] = t_results
    radius_ct['C'] = c_results
    radius_ct['Spectral Radius'] = radius
    # we initialize the error to thousand and i counter to zero
    error = 1000
    i = 0
    x_ant = x0
    results[0] = np.array([0,0,0])
    while error > tol and i < Nmax: 
        x_act = np.matmul(t_results,x_ant)+c_results
        error = np.linalg.norm((x_ant-x_act), ord=2)
        x_ant = x_act
        iterations = [i+1,error,x_ant.T]
        results[i+1] = np.array(iterations)
        i += 1
        
    # we print the results
    print(f"T:{radius_ct['T']}")
    print(f"C:{radius_ct['C']}")
    print(f"Spectral Radius:{radius_ct['Spectral Radius']}")
    print("|    iter    |     E     |")
    for j in range(len(results)):
        print(f"|  {results[j][0]}  |  {results[j][1]}  |  {results[j][2]}  |")

    return radius_ct,results

np.set_printoptions(precision=7)
M = [[4, -1, 0, 3],[1, 15.5, 3, 8], [0, -1.3, -4, 1.1], [14, 5, -2, 30]]
A = np.array(M)
vector_b = [1,1,1,1]
b = np.array(vector_b)
x0 = np.zeros((A.shape[0]))
tol = 0.0000001
Nmax = 100
gauss_seidel(A,b,x0,tol,Nmax)