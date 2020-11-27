import math
import sympy as sm
import sys

def newton(fx, d_fx, x_initial, tolerance, iterations):
   try:
      x_initial = float(x_initial)
      tolerance = float(tolerance)
      iterations = int(iterations)
   except:
      print("Error: check type of input values") 
      sys.exit(1)

   if tolerance < 0:
     print("Error: the tolerance has to be positive") 
   elif iterations <= 0:
     print("Error: the maximum iterations has to be positive and greater than zero") 
   else:
      try:
         results = []
         iters =[]
         xi = []
         functions = []
         E = []
         i = 0
         x = sm.symbols('x')
         try:
            function = float(sm.simplify(fx).subs(x, x_initial))
            d_function = float(sm.simplify(d_fx).subs(x, x_initial))
         except:
            print("Error: initial value is not in domain of function, try again")
            sys.exit(1)
         x_previous = x_initial
         x_current = x_initial
         condition = True
         iters.append(i) 
         xi.append("{:.10f}".format(x_current))
         functions.append(function)
         E.append(" ")
         while condition != False:
            x_current = x_previous - (function/d_function)
            function = float(sm.simplify(fx).subs(x, x_current))
            d_function = float(sm.simplify(d_fx).subs(x, x_current))
            error = abs(x_previous-x_current)
            if function == 0 or error < tolerance:
               condition = False
            i += 1
            iters.append(i) 
            xi.append("{:.10f}".format(x_current))
            functions.append(function)
            E.append(error)
            x_previous = x_current
         results.extend([iters, xi, functions, E])
         #print("|  iter |      xi      |     f(xi)     |      E       |")
         dato = 0
         while dato < len(iters):
            print(f"{iters[dato]},{xi[dato]},{functions[dato]},{E[dato]}")
            #print(f"|   {iters[dato]}   | {xi[dato]} "+"| %e | %e |"%(functions[dato], E[dato]))
            dato += 1
         #print(f"an approximation of the root was found in {x_current}")
      except:
         print("Error: Initial data error, try again")
         sys.exit(1)

newton(sys.argv[1],sys.argv[2],sys.argv[3],sys.argv[4],sys.argv[5])