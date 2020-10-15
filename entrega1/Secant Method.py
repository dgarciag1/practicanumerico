import sympy as sm

def secantMethod(fx, x0, x1, tolerance, iterations):
  fx = sm.sympify(fx)
  y0 = fx.subs('x', x0)
  if(y0 == 0):
    print(x0, "is a root number")
  else:
    y1 = fx.subs('x', x1)
    count = 0
    err = tolerance + 1
    ydiv = y1 - y0
    print("|  iter |      xi                     |     f(xi)                |      E                      |")
    while(y1 != 0 and err > tolerance and ydiv != 0 and count < iterations):
      x2 = x1 - (y1 * (x1 - x0) / ydiv)
      err = abs(x1-x0)
      x0 = x1
      y0 = y1
      print(f"|   {count}   |      {x2}      |     {y0}     |      {err}       |")
      x1 = x2
      y1 = fx.subs('x', x1)
      ydiv = y1 - y0
      count += 1
    if(y1 == 0):
      print(x1, "is a root number")
    elif(err < tolerance):
      print(x1, "is an aproximation of a root number")
    elif(ydiv == 0):
      print("There's a possibility of multiple root numbers")
    else:
      print("The function failed in", iterations, "iterations")


fx = "ln (sin (x)**2+1)-1/2"
x0 = float(0.5)
x1 = float(1.0)
tolerance = 0.5e-07
iterations = 100

secantMethod(fx, x0, x1, tolerance, iterations)

