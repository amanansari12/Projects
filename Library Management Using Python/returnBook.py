import json

def returnBook():
    with open("book_data.json", "r") as file:
        exiting_file= json.load(file)

    if not bool(exiting_file["Rental_book"]):
        print("No Books have not been rented.")
        return

    i =0
    len_lib = len(exiting_file["Rental_book"])
    print(f"The quantity of books rented is: '{len_lib}' ")
    for book in exiting_file["Rental_book"]:
        print(f"{i+1}. {book['ID']}--> {book['Name']} by {book['Author']}")
        i+=1

    # x = input("Enter the Book or Book ID You want to rent: ")
    x = int(input("Enter the Book you want to return: "))

    data = exiting_file["Rental_book"][x-1]
    # print(data)
    exiting_file["Rental_book"].pop(x-1)

    with open("book_data.json", "w") as file:
        json.dump(exiting_file, file, indent=4)

    exiting_file["Books"].append(data)
    with open("book_data.json", "w") as file:
        json.dump(exiting_file, file, indent=4)

    print(f"The {data['Name']}[{data['ID']}] has been Returned")


# returnBook()