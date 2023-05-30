import json

def addBook():
    try:
        with open("book_data.json", "r") as file:
            existing_data = json.load(file)
    except FileNotFoundError:
        existing_data = {"Books":[], "Rental_book": []}
    
    book_id = input("Enter the Book ID: ")
    for books in existing_data["Books"]:
        # print(type(books))
        if book_id == books['ID']:
            # Check if the book ID already exists in the library
            print(f"{book_id} '{books['Name']}' Already in the Library")
            return
        # print(books["ID"])

    book_name = input("Enter the Name of the Book: ")
    # If the book has to be added and is already in the library, this code can be used.
    # It determines whether or not the book bearing the same name is present.
    for books in existing_data["Books"]:
        if book_name == books['Name']:
            # Check if the book name already exists in the library
            print(f"The '{books['Name']}' Book is Already in the Library Under ID: {books['ID']}")
            return
    
    book_Author = input("Enter the Name of the Author: ")
    
    data = {
            "ID": book_id,
            "Name": book_name,
            "Author": book_Author
            }
    
    existing_data["Books"].append(data)
    print(f"{book_name}[{book_id}] added Successfully")

    with open("book_data.json", "w") as file:
        # Write the updated data back to the file
        json.dump(existing_data, file, indent=4)

# addBook()