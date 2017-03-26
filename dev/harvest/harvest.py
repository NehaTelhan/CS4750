#Template for harvesting state-organized files

import codecs
import unicodedata


f = codecs.open('plant_data/Virginia.txt', 'r', encoding='utf-8')
va_arr = []
state = "Virginia"

for line in f.readlines():
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
    #
    # print()
    # print("Symbol", symbol)
    # print("Synonom Symbol", syn_symbol)
    # print("Scientific Name with Author", sci_name)
    # print("Genus", genus, " Species", species, " Author", author)
    # print("National Common Name", common_name)
    # print("Family", family)

    va_arr = [symbol, syn_symbol, genus, species, author, common_name, family, state]

    print(va_arr)

