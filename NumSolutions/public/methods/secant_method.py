import sympy as sm
import sys

def secantMethod(fx, x0, x1, tolerance, iterations):
  try:  
    x0 = float(x0)
    x1 = float(x1)
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
      x2_array ={}
      y0_array ={}
      err_array ={}
      fx = sm.sympify(fx)
      try:
        y0 = float(fx.subs('x', x0))
      except:
        print("Error: initial value x0 is not in domain of function, try again")
        sys.exit(1)        
      count = 0
      err = ""
      count_array[count] = count
      x2_array[count] = x0
      y0_array[count] = y0
      err_array[count] = err
      count += 1
      try:
        y1 = float(fx.subs('x', x1))
      except:
        print("Error: initial value x1 is not in domain of function, try again")
        sys.exit(1)          
      count_array[count] = count
      x2_array[count] = x1
      y0_array[count] = y1
      err_array[count] = err
      count += 1
      err = tolerance + 1
      ydiv = y1 - y0
      #print("|  iter |      xi                     |     f(xi)                |      E                      |")
      while(y1 != 0 and err > tolerance and ydiv != 0 and count < iterations):
        x2 = x1 - (y1 * (x1 - x0) / ydiv)
        y2 = float(fx.subs('x', x2))
        err = abs(x1-x2)
        count_array[count] = count
        x2_array[count] = x2
        y0_array[count] = y2
        err_array[count] = err
        x0 = x1
        x1 = x2
        y0 = y1
        y1 = y2
        ydiv = y1 - y0
        count += 1
      counter = 0
      while(counter < len(count_array)):
        print(f"{count_array[counter]},{x2_array[counter]},{y0_array[counter]},{err_array[counter]}")
        counter += 1
    except:
      print("Error: Initial data error, try again")
      sys.exit(1)

secantMethod(sys.argv[1],sys.argv[2],sys.argv[3],sys.argv[4],sys.argv[5])

