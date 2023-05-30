import json

def returnBook():
    with open("book_data.json", "r") as file:
        existing_file= json.load(file)

    if not bool(existing_file["Rental_book"]):
        print("No Books have not been rented.")
        return

    i =0
    len_lib = len(existing_file["Rental_book"])
    print(f"The quantity of books rented is: '{len_lib}' ")
    for book in existing_file["Rental_book"]:
        print(f"{i+1}. {book['ID']}--> {book['Name']} by {book['Author']}")
        i+=1

    id = ""
    name = ""
    x = input("Enter the ID or name of the book you want to remove: ")
    for book in existing_file["Rental_book"]:
        if x == book['ID'] or x == book['Name']:
            id = book['ID']
            name = book['Name']
            existing_file["Rental_book"].remove(book)
            existing_file["Books"].append(book)

    with open("book_data.json", "w") as file:
        json.dump(existing_file, file, indent=4)

    print(f"The {name} [{id}] has been Returned")


# returnBook()