#Template for harvesting state-organized files

import codecs
import unicodedata
import csv
import numpy as np
import re

f = codecs.open('/Users/sadiyahfaruk/schoolstuff/database/dbproj/alabama.txt', 'r', encoding='utf-8')
state_arr = []
node = []
state = "Alabama"
state_acronym = "AL"
key_num = 1
filename = state + ".csv"
b = open(filename, 'w')
a = csv.writer(b)

for line in f.readlines():
    if key_num == 1:
        key_num += 1
        continue
    unicodedata.normalize('NFKD', line).encode('ascii', 'ignore')
    line = line.strip('\n')
    line = line.split(',')

    symbol = line[0][1:-1]
    syn_symbol = line[1][1:-1]
    sci_name = line[2]
    genus = sci_name.split()[0][1:]
    species = sci_name.split()[1]
    author = sci_name.split()[2:]
    common_name = line[3][1:-1]
    family = line[4][1:-1]

    if symbol == "":
        symbol = "None"
    if syn_symbol == "":
        syn_symbol = "None"
    if genus == "":
        genus = "None"
    if species == "":
        species = "None"
    if author == "":
        author = "None"
    if common_name == "":
        common_name = "None"
    if family == "":
        family = "None"
    p_key = str(key_num)+state_acronym
    regex = re.compile("[^a-zA-Z]")
    if 'ssp.' in author or 'var.' in author:
        continue
    if len(author) == 1:
        author[0] = regex.sub('', author[0])
    if len(author) > 1:
        for i in range(0, len(author)):
            author[i] = regex.sub('', author[i])

    #
    # print()
    # print("Symbol", symbol)
    # print("Synonom Symbol", syn_symbol)
    # print("Scientific Name with Author", sci_name)
    # print("Genus", genus, " Species", species, " Author", author)
    # print("National Common Name", common_name)
    # print("Family", family)

    node = [p_key, symbol, syn_symbol, genus, species, author, common_name, family, state]
    # n = np.array(node)
    # a.writerows(n)
    key_num += 1
    state_arr.append(node)
    print(p_key)
    # a.writerows(node)
    # print(node)
    # print(p_key)
    # if key_num == 3:
    #     break

# print(state_arr)
# data = np.array(state_arr)
a.writerows(state_arr)
b.close()





