import codecs
import unicodedata
import csv
import numpy as np
import re

# change before harvesting
s1 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Alabama.csv', 'r', encoding='utf-8')
s2 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Alaska.csv', 'r', encoding='utf-8')
s3 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Arizona.csv', 'r', encoding='utf-8')
s4 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Arkansas.csv', 'r', encoding='utf-8')
s5 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/California.csv', 'r', encoding='utf-8')
s6 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Colorado.csv', 'r', encoding='utf-8')
s7 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Connecticut.csv', 'r', encoding='utf-8')
s8 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Delaware.csv', 'r', encoding='utf-8')
s9 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/District of Columbia.csv', 'r', encoding='utf-8')
s10 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Florida.csv', 'r', encoding='utf-8')
s11 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Georgia.csv', 'r', encoding='utf-8')
s12 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Hawaii.csv', 'r', encoding='utf-8')
s13 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Idaho.csv', 'r', encoding='utf-8')
s14 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Illinois.csv', 'r', encoding='utf-8')
s15 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Indiana.csv', 'r', encoding='utf-8')
s16 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Iowa.csv', 'r', encoding='utf-8')
s17 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Kansas.csv', 'r', encoding='utf-8')
s18 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Kentucky.csv', 'r', encoding='utf-8')
s19 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Louisiana.csv', 'r', encoding='utf-8')
s20 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Maine.csv', 'r', encoding='utf-8')
s21 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Maryland.csv', 'r', encoding='utf-8')
s22 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Massachusetts.csv', 'r', encoding='utf-8')
s23 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Michigan.csv', 'r', encoding='utf-8')
s24 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Minnesota.csv', 'r', encoding='utf-8')
s25 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Mississippi.csv', 'r', encoding='utf-8')
s26 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Missouri.csv', 'r', encoding='utf-8')
s27 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Montana.csv', 'r', encoding='utf-8')
s28 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Nebraska.csv', 'r', encoding='utf-8')
s29 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Nevada.csv', 'r', encoding='utf-8')
s30 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/New Hampshire.csv', 'r', encoding='utf-8')
s31 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/New Jersey.csv', 'r', encoding='utf-8')
s32 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/New Mexico.csv', 'r', encoding='utf-8')
s33 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/New York.csv', 'r', encoding='utf-8')
s34 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/North Carolina.csv', 'r', encoding='utf-8')
s35 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/North Dakota.csv', 'r', encoding='utf-8')
s36 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Ohio.csv', 'r', encoding='utf-8')
s37 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Oklahoma.csv', 'r', encoding='utf-8')
s38 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Oregon.csv', 'r', encoding='utf-8')
s39 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Pennsylvania.csv', 'r', encoding='utf-8')
s40 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Rhode Island.csv', 'r', encoding='utf-8')
s41 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/South Carolina.csv', 'r', encoding='utf-8')
s42 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/South Dakota.csv', 'r', encoding='utf-8')
s43 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Tennessee.csv', 'r', encoding='utf-8')
s44 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Texas.csv', 'r', encoding='utf-8')
s45 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Utah.csv', 'r', encoding='utf-8')
s46 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Vermont.csv', 'r', encoding='utf-8')
s47 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Virginia.csv', 'r', encoding='utf-8')
s48 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Washington.csv', 'r', encoding='utf-8')
s49 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/West Virginia.csv', 'r', encoding='utf-8')
s50 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Wisconsin.csv', 'r', encoding='utf-8')
s51 = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/CS4750/dev/harvest/Wyoming.csv', 'r', encoding='utf-8')


# don't need to change
state_arr = []
b = open("master.txt", 'w')
# a = csv.writer(b)


for line in s1.readlines():
    state_arr.append(line)
print("done")

for line in s2.readlines():
    state_arr.append(line)
print("done")

for line in s3.readlines():
    state_arr.append(line)
print("done")

for line in s4.readlines():
    state_arr.append(line)
print("done")

for line in s5.readlines():
    state_arr.append(line)
print("done")

for line in s6.readlines():
    state_arr.append(line)
print("done")

for line in s7.readlines():
    state_arr.append(line)
print("done")

for line in s8.readlines():
    state_arr.append(line)
print("done")

for line in s9.readlines():
    state_arr.append(line)
print("done")

for line in s10.readlines():
    state_arr.append(line)
print("done 10")

for line in s11.readlines():
    state_arr.append(line)
print("done")

for line in s12.readlines():
    state_arr.append(line)
print("done")

for line in s13.readlines():
    state_arr.append(line)
print("done")

for line in s14.readlines():
    state_arr.append(line)
print("done")

for line in s15.readlines():
    state_arr.append(line)
print("done")

for line in s16.readlines():
    state_arr.append(line)
print("done")

for line in s17.readlines():
    state_arr.append(line)
print("done")

for line in s18.readlines():
    state_arr.append(line)
print("done")

for line in s19.readlines():
    state_arr.append(line)
print("done")

for line in s20.readlines():
    state_arr.append(line)
print("done 20")

for line in s21.readlines():
    state_arr.append(line)
print("done")

for line in s22.readlines():
    state_arr.append(line)
print("done")

for line in s23.readlines():
    state_arr.append(line)
print("done")

for line in s24.readlines():
    state_arr.append(line)
print("done")

for line in s25.readlines():
    state_arr.append(line)
print("done")

for line in s26.readlines():
    state_arr.append(line)
print("done")

for line in s27.readlines():
    state_arr.append(line)
print("done")

for line in s28.readlines():
    state_arr.append(line)
print("done")

for line in s29.readlines():
    state_arr.append(line)
print("done")

for line in s30.readlines():
    state_arr.append(line)
print("done 30")

for line in s31.readlines():
    state_arr.append(line)
print("done")

for line in s32.readlines():
    state_arr.append(line)
print("done")

for line in s33.readlines():
    state_arr.append(line)
print("done")

for line in s34.readlines():
    state_arr.append(line)
print("done")

for line in s35.readlines():
    state_arr.append(line)
print("done")

for line in s36.readlines():
    state_arr.append(line)
print("done")

for line in s37.readlines():
    state_arr.append(line)
print("done")

for line in s38.readlines():
    state_arr.append(line)
print("done")

for line in s39.readlines():
    state_arr.append(line)
print("done")

for line in s40.readlines():
    state_arr.append(line)
print("done 40")

for line in s41.readlines():
    state_arr.append(line)
print("done")

for line in s42.readlines():
    state_arr.append(line)
print("done")

for line in s43.readlines():
    state_arr.append(line)
print("done")

for line in s44.readlines():
    state_arr.append(line)
print("done")

for line in s45.readlines():
    state_arr.append(line)
print("done")

for line in s46.readlines():
    state_arr.append(line)
print("done")

for line in s47.readlines():
    state_arr.append(line)
print("done")

for line in s48.readlines():
    state_arr.append(line)
print("done")

for line in s49.readlines():
    state_arr.append(line)
print("done")

for line in s50.readlines():
    state_arr.append(line)
print("done 50")

for line in s51.readlines():
    state_arr.append(line)
print("done 51")

# a.writerows(state_arr)
for line in state_arr:
    b.write(line)
b.close()
