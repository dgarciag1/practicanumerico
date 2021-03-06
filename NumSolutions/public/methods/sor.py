import numpy as np
from collections import defaultdict
import sys
import strToMatrix 

def sor(A,b,x0,tol,w,Nmax):
    try:
        A = strToMatrix.strToMatrix(A)
        b = strToMatrix.strToMatrix(b)
        x0 = strToMatrix.strToMatrix(x0)
        tol = float(tol)
        w = float(w)
        Nmax = int(Nmax)
    except:
       print("Error: check type of input values") 
       sys.exit(1) 
    if tol < 0:
        print("Error: the tolerance has to be positive") 
    elif Nmax <= 0:
        print("Error: the maximum iterations has to be positive and greater than zero")
    else: 
        try:
            # here is t matrix, c vector and the spectral radius
            radius_ct = {}
            # here is the iterations of the method
            results = defaultdict(list)
            
            diagonal = np.diag(np.diag(A))
            u = np.triu(-np.array(A),1)
            l = np.tril(-np.array(A),-1)
            aux = diagonal-np.multiply((w),(l))
            second_part_t = np.multiply((1-w),(diagonal))+np.multiply((w),(u))
            # T=inv(D-w*L)*((1-w)*D+w*U)b
            # C=w*inv(D-w*L)*b
            t_results = np.matmul(np.linalg.inv(aux),second_part_t)
            c_results = np.matmul((np.multiply((w),(np.linalg.inv(aux)))),(b))
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
            print(f"T: \n{radius_ct['T']}\n")
            print(f"C: \n{radius_ct['C']}\n")
            print(f"Spectral Radius: \n{radius_ct['Spectral Radius']}\n")
            print("iters")
            for j in range(len(results)):
                print(f"{results[j][0]},{results[j][1]},{results[j][2]}")
        except:
            print("Error: Initial data error, try again")
            sys.exit(1) 

np.set_printoptions(precision=7)
#M = [[4, -1, 0, 3],[1, 15.5, 3, 8], [0, -1.3, -4, 1.1], [14, 5, -2, 30]]
#A = np.array(M)
#vector_b = [1,1,1,1]
#b = np.array(vector_b)
#x0 = np.zeros((A.shape[0]))
#tol = 0.0000001
#Nmax = 100
#w = float(1.5)
sor(sys.argv[1],sys.argv[2],sys.argv[3],sys.argv[4],sys.argv[5],sys.argv[6])