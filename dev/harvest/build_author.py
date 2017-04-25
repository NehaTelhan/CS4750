import csv
import random

# filename = "Nebraska.csv"


def do_it(filename):
    node = []
    total_state = []
    b = open("AuthoredName.csv", 'a')
    a = csv.writer(b)
    rownum = 0
    with open(filename, 'r') as csvfile:
        filereader = csv.reader(csvfile, delimiter=',')
        for row in filereader:
            # 0 --> PID
            # 1 --> Symbol
            # 2 --> Synonym_Symbol
            # 3 --> Genus
            # 4 --> Species
            # 5 --> Author
            # 6 --> Common_Name
            # 7 --> Family
            # 8 --> State
            # node = [row[0]]
            authors = row[5].split(' ')
            auth = [var for var in authors if var]
            for au in auth:
                node = [row[0], au]
                total_state.append(node)
    total = filter(None, total_state)
    a.writerows(total_state)
    # f.write(state_arr)
    b.close()


def do_it2():
    node = []
    total_state = []
    b = open("auther.csv", 'a')
    a = csv.writer(b)
    all = []
    AID = 1
    with open('AuthoredName.csv', 'r') as csvfile:
        filereader = csv.reader(csvfile, delimiter=',')
        for row in filereader:
            first_name = ''
            last_name = row[0]
            num = random.randint(0, 10)
            node = [AID, first_name, last_name, num]
            all.append(node)
            AID += 1
    a.writerows(all)
    # # f.write(state_arr)
    b.close()

if __name__ == "__main__":
    # filename = input("Enter filename: ")
    # do_it(filename)
    do_it2()