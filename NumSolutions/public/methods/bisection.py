import math
import sympy as sm
import sys

def false_rule(fx, a_point, b_point, tolerance, iterations):
   try:
      a_point = float(a_point)
      b_point = float(b_point)
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
         ai = []
         xm = []
         bi = []
         fxm = []
         E = []         
         i = 0
         x = sm.symbols('x')
         a_current = a_point
         b_current = b_point
         try:
            function_a = float(sm.simplify(fx).subs(x, a_current))
            function_b = float(sm.simplify(fx).subs(x, b_current))
            xm_current = (a_current+b_current)/2
            function_xm = float(sm.simplify(fx).subs(x, xm_current))
         except:
            print("Error: values a and b are not in domain of function, try again")
            sys.exit(1)
         a_previous = a_current
         b_previous = b_current
         xm_previous = xm_current
         function_a_previous = function_a
         function_b_previous = function_b
         function_xm_previous = function_xm
         condition = True
         iters.append(i) 
         ai.append("{:.10f}".format(a_current))
         bi.append("{:.10f}".format(b_current))
         xm.append("{:.10f}".format(xm_current))
         fxm.append(function_xm)
         E.append(" ")
         while condition != False:
            if(function_a_previous*function_xm_previous)<0:
               a_current = a_previous
            else:
               a_current = xm_previous

            if(function_b_previous*function_xm_previous)<0:
               b_current = b_previous
            else:
               b_current = xm_current 

            function_a = float(sm.simplify(fx).subs(x, a_current))
            function_b = float(sm.simplify(fx).subs(x, b_current))
            xm_current = (a_current+b_current)/2
            function_xm = float(sm.simplify(fx).subs(x, xm_current))
            error = abs(xm_previous-xm_current)
            i += 1
            iters.append(i) 
            ai.append("{:.10f}".format(a_current))
            bi.append("{:.10f}".format(b_current))
            xm.append("{:.10f}".format(xm_current))
            fxm.append(function_xm)
            E.append(error)
            if (function_xm == 0) or (error < tolerance) or (i>iterations):
               condition = False
            a_previous = a_current
            b_previous = b_current
            xm_previous = xm_current
            function_a_previous = function_a
            function_b_previous = function_b
            function_xm_previous = function_xm
            
         results.extend([iters, ai, xm, bi, fxm, E])
         #print("|  iter |      ai      |      xm      |       bi      |     f(xm)     |      E       |")
         dato = 0
         while dato < len(iters):
            print(f"{iters[dato]},{ai[dato]},{xm[dato]},{bi[dato]},{fxm[dato]},{E[dato]}")
         #  print(f"|   {iters[dato]}   | {ai[dato]} | {xm[dato]} |  {bi[dato]} "+"| %e  | %e |"%(fxm[dato],E[dato]))
            dato += 1
         #print(f"An approximation of the root was found in {xm_current}")
      except:
         print("Error: Initial data error, try again")
         sys.exit(1)
      

false_rule(sys.argv[1],sys.argv[2],sys.argv[3],sys.argv[4],sys.argv[5])