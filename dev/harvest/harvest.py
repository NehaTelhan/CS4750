#Template for harvesting state-organized files

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
filename = state + ".csv"
b = open(filename, 'w')
a = csv.writer(b)
node1 = ["Plant_ID", "Symbol", "Synonym_Symbol", "Genus", "Species", "Author", "Common_Name", "Familys", "State"]
state_arr.append(node1)

for line in f.readlines():
    if key_num == 0:
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
    if 'ssp.' in author or 'var.' in author or 'or' in author:
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
    author_str = ""
    col1 = [p_key]
    if len(col1) > 1:
        for i in range(0, len(col1)):
            p_key = p_key + " " + col1[i]
    col2 = [symbol]
    if len(col2) > 1:
        for i in range(0, len(col2)):
            symbol = symbol + " " + col2[i]
    col3 = [syn_symbol]
    if len(col3) > 1:
        for i in range(0, len(col3)):
            syn_symbol = syn_symbol + " " + col3[i]
    col4 = [genus]
    if len(col4) > 1:
        for i in range(0, len(col4)):
            genus = genus + " " + col4[i]
    col5 = [species]
    if len(col5) > 1:
        for i in range(0, len(col5)):
            species = species + " " + col5[i]
    species = species.replace('"', '')
    col6 = author
    if len(author) > 1:
        for i in range(0, len(author)):
            author_str += " " + author[i]
    col7 = [common_name]
    if len(col7) > 1:
        for i in range(0, len(col7)):
            common_name = common_name + " " + col7[i]
    col8 = [family]
    if len(col8) > 1:
        for i in range(0, len(col8)):
            family = family + " " + col8[i]
    col9 = [state]
    if len(col9) > 1:
        for i in range(0, len(col9)):
            state = state + " " + col9[i]
    node = [p_key, symbol, syn_symbol, genus, species, author_str, common_name, family, state]
    # n = np.array(node)
    # a.writerows(n)
    key_num += 1
    state_arr.append(node)
    print(node)
    # a.writerows(node)
    # print(node)
    # print(p_key)
    # if key_num == 3:
    #     break

# print(state_arr)
# data = np.array(state_arr)
a.writerows(state_arr)
# f.write(state_arr)
b.close()





