import sympy as sm

def multipleRootsMethod(fx, f1x, f2x, x0, tolerance, iterations):
  fx = sm.sympify(fx)
  f1x = sm.sympify(f1x)
  f2x = sm.sympify(f2x)
  y0 = fx.subs('x', x0)
  y1 = f1x.subs('x', x0)
  y2 = f2x.subs('x', x0)
  ydiv = (y1**2-(y0*y2))
  count = 0
  err = tolerance + 1
  print("|  iter |      xi                    |     f(xi)                |     f'(xi)               |     f''(xi)              |      E                      |")
  while(y0 != 0 and err > tolerance and ydiv != 0 and count < iterations):
    x1 = x0 - ((y0 * y1)/ydiv)
    y0 = fx.subs('x', x1)
    y1 = f1x.subs('x', x1)
    y2 = f2x.subs('x', x1)
    ydiv = (y1**2-(y0*y2))
    err = abs(x1-x0)
    print(f"|   {count}   |      {x1}      |     {y0}     |      {err}       |")
    x0 = x1
    count += 1
  if(y0 == 0):
    print(x0, "is a root number")
  elif(err < tolerance):
    print(x0, "is an aproximation of a root number")
  elif(ydiv == 0):
    print("There's a possibility of multiple root number")
  else:
    print("The function failed in ", iterations, "iterations")


fx = "E**x-x-1"
f1x = "E**x-1"
f2x = "E**x"
x0 = (1.0)
tolerance = 0.5e-07
iterations = 100

multipleRootsMethod(fx, f1x, f2x, x0, tolerance, iterations)

