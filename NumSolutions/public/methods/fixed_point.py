import sympy as sm
import sys 

def fixedPointMethod(fx, gx, x0, tolerance, iterations):
  try:
    tolerance = float(tolerance)
    iterations = float(iterations)
    x0 = float(x0)
    err = ""
  except:
      print("Error: check type of input values") 
      sys.exit(1)

  if tolerance < 0:
     print("Error: the tolerance has to be positive") 
  elif iterations <= 0:
     print("Error: the maximum iterations has to be positive and greater than zero") 
  else:
    try:
      count_array ={}
      x0_array ={}
      x1_array ={}
      y0_array ={}
      err_array ={}
      fx = sm.sympify(fx)
      gx = sm.sympify(gx)
      count = 0
      try:
          x1 = float(gx.subs('x', x0))
          y0 = float(fx.subs('x', x0))
      except:
          print("Error: initial value is not in domain of function, try again")
          sys.exit(1)
      count_array[count] = count
      x0_array[count] = x0
      x1_array[count] = x1
      y0_array[count] = y0
      err_array[count] = err
      err = (tolerance) + 1
      #print("|  iter |      xi                    |     f(xi)                |      E                      |")
      while(y0 != 0 and err > tolerance and count < iterations):
        count += 1
        err = abs(x0-x1)
        x0 = x1
        y0 = float(fx.subs('x', x1))
        x1 = float(gx.subs('x', x0))
        count_array[count] = count
        x0_array[count] = x0
        x1_array[count] = x1
        y0_array[count] = y0
        err_array[count] = err
      counter = 0
      while(counter < len(count_array)):
        print(f"{count_array[counter]},{x0_array[counter]},{x1_array[counter]},{y0_array[counter]},{err_array[counter]}")
        counter+=1
    except:
      print("Error: Initial data error, try again")
      sys.exit(1)


fixedPointMethod(sys.argv[1],sys.argv[2],sys.argv[3],sys.argv[4],sys.argv[5])

