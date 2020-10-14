import sympy as sm

def fixedPointMethod(fx, gx, x0, tolerance, iterations):
  fx = sm.sympify(fx)
  gx = sm.sympify(gx)
  y0 = fx.subs('x', x0)
  count = 0
  err = tolerance + 1
  print("|  iter |      xi                    |     f(xi)                |      E                      |")
  while(y0 != 0 and err > tolerance and count < iterations):
    x1 = gx.subs('x', x0)
    y0 = fx.subs('x', x1)
    err = abs(x1-x0)
    print(f"|   {count}   |      {x1}      |     {y0}     |      {err}       |")
    x0 = x1
    count += 1
  if(y0 == 0):
    print(x0, "is a root number")
  elif(err < tolerance):
    print(x0, "is an aproximation of a root number")
  else:
    print("The function failed in ", iterations, "iterations")


fx = "ln (sin (x)**2+1)-1/2"
gx = "ln (sin (x)**2+1)-1/2"
x0 = (-0.5)
tolerance = 0.0000001
iterations = 100

fixedPointMethod(fx, gx, x0, tolerance, iterations)

