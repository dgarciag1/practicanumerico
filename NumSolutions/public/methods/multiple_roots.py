import sympy as sm
import sys 

def multipleRootsMethod(fx, f1x, f2x, x0, tolerance, iterations):
  try:
    x0 = float(x0)
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
      count_array ={}
      x1_array ={}
      y0_array ={}
      err_array ={}
      fx = sm.sympify(fx)
      f1x = sm.sympify(f1x)
      f2x = sm.sympify(f2x)
      try:
        y0 = float(fx.subs('x', x0))
        y1 = float(f1x.subs('x', x0))
        y2 = float(f2x.subs('x', x0))
      except:
          print("Error: initial value x0 is not in domain of function, try again")
          sys.exit(1)   
      count = 0
      err = ""
      count_array[count] = count
      x1_array[count] = x0
      y0_array[count] = y0
      err_array[count] = err
      count+= 1
      ydiv = (y1**2-(y0*y2))
      err = tolerance + 1
      #print("|  iter |      xi                    |     f(xi)                |     f'(xi)               |     f''(xi)              |      E                      |")
      while(y0 != 0 and err > tolerance and ydiv != 0 and count < iterations):
        x1 = x0 - (y0 * y1)/(ydiv)
        y0 = float(fx.subs('x', x1))
        err = abs(x1-x0)
        count_array[count] = count
        x1_array[count] = x1
        y0_array[count] = y0
        err_array[count] = err
        x0 = x1
        y1 = float(f1x.subs('x', x0))
        y2 = float(f2x.subs('x', x0))
        ydiv = (y1**2-(y0*y2))
        count += 1
      counter = 0
      while(counter < len(count_array)):
        print(f"{count_array[counter]},{x1_array[counter]},{y0_array[counter]},{err_array[counter]}")
        counter += 1
    except:
      print("Error: Initial data error, try again")
      sys.exit(1)

multipleRootsMethod(sys.argv[1],sys.argv[2],sys.argv[3],sys.argv[4],sys.argv[5],sys.argv[6])

