import math
import sys
import sympy as sm

#fx = input("Enter the function: ")
#x0 = input("Enter the initial value x0: ")
#delta = input("Enter delta value: ")
#N = input("Enter the iterations number N: ")

def incremental_search(fx, x_initial, delta_value, iterations):
   try:
      x_initial = float(x_initial)
      delta_value = float(delta_value)
      iterations = int(iterations)
   except:
      print("Error: check type of input values") 
      sys.exit(1)

   if delta_value <= 0:
     print("Error: the delta value has to be positive and greater than zero") 
   elif iterations <= 0:
     print("Error: the maximum iterations has to be positive and greater than zero") 
   else:
      try:
         results = []
         iteration = 0
         x = sm.symbols('x')
         x_current = float(x_initial)
         x_previous = float(x_current)
         try:
            function_previous = float(sm.simplify(fx).subs(x, x_initial))
            function_current = float(sm.simplify(fx).subs(x, x_initial))
         except:
            print("Error: initial value is not in domain of function, try again")
            sys.exit(1)
         while iteration < iterations:
            x_current = x_previous + delta_value
            function_current = float(sm.simplify(fx).subs(x, x_current))
            if function_previous*function_current < 0:
               results.append(["{:.10f}".format(x_previous),"{:.10f}".format(x_current)])        
            x_previous = x_current
            function_previous = function_current
            iteration += 1
         if(len(results)>0):
            for result in results:
               print(f"There is a root of fx in: [{result[0]},{result[1]}]")
            #print(results)
         else:
            print(f"There are no roots of fx for initial values")
      except:
         print("Error: Initial data, try again")
         sys.exit(1)
         
incremental_search(sys.argv[1],sys.argv[2],sys.argv[3],sys.argv[4])