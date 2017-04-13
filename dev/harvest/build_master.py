import codecs
import unicodedata
import csv
import numpy as np
import re

# change before harvesting
f = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/wyoming.txt', 'r', encoding='utf-8')
state = "Wyoming"
state_acronym = "WY"


# don't need to change
state_arr = []
node = []
key_num = 0
filename = ""
b = open(filename, 'w')
# a = csv.writer(b)
node1 = ["Plant_ID", "Symbol", "Synonym_Symbol", "Genus", "Species", "Author", "Common_Name", "Familys", "State"]
state_arr.append(node1)

for line in f.readlines():
    if key_num == 0:
        key_num += 1
        continue
    unicodedata.normalize('NFKD', line).encode('ascii', 'ignore')
    line = line.strip('\n')
    state_arr.append(line)

# change before harvesting
f = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/wyoming.txt', 'r', encoding='utf-8')
state = "Wyoming"
state_acronym = "WY"


# don't need to change
state_arr = []


for line in f.readlines():
    if key_num == 0:
        key_num += 1
        continue
    unicodedata.normalize('NFKD', line).encode('ascii', 'ignore')
    line = line.strip('\n')
    state_arr.append(line)

