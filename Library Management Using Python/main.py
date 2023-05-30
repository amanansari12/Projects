import addBook as add
import ShowBook as show
import rentBook as rent
import returnBook as rtrn
import removeBook as remove

while True:
    print("Library Mangement System")
    print("--------------------------")
    # print("\n1. Show Books\n2. Add Book\n3. Rent Book\n4. Rturn Book\n5. Remove Book\n6. Quit\n")
    print("1. Show Books")
    print("2. Add Book")
    print("3. Rent Book")
    print("4. Return Book")
    print("5. Remove Book")
    print("6. Quit")

    x = int(input("Enter You Choice: "))
    if x == 1:
        show.showBook()
        print("\n")
        continue
    elif x == 2:
        add.addBook()
        print("\n")
        continue
    elif x == 3:
        rent.rentBook()
        print("\n")
        continue
    elif x == 4:
        rtrn.returnBook()
        print("\n")
        continue
    elif x == 5: 
        remove.removeBook()
        print("\n")
        continue
    elif x == 6: 
        exit()
    else:
        print('Invalid Choice!')
        continue
