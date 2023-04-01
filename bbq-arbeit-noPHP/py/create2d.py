from time import time

def create2d(rows, cols):
    array2d = []
    for i in range(0, rows):
        array2d.append([])
        for j in range(0, cols):
            array2d[i].append((str(int(str(time())[-2:])/10)).replace('.',','))
    return array2d

print(create2d(4,3))
input()