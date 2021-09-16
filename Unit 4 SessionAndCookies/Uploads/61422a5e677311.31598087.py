'''
* * * * *
* *   * *
*   *   *
* *   * *
* * * * *
'''
n = int(input("ENter Value Of N : "))
for i in range(0,n):
    for j in range(0,n):
        if i==0 or j==0:
            print("*",end=" ")
        elif i==n-1 or j==n-1:
            print("*",end=" ")
        elif i==j or (i+j)==n-1:
            print("*",end=" ")
        else:
            print(" ",end=" ")
    print()
