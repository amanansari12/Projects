import json

def rentBook():
    with open("book_data.json", "r") as file:
        existing_file= json.load(file)

    if not bool(existing_file["Books"]):
        # Check if there are books in the library
        print("No Books are available in Library")
        return

    i =0
    len_lib = len(existing_file["Books"])
    print(f"There are currently {len_lib} books in the library.")
    for book in existing_file["Books"]:
        print(f"{i+1}. {book['ID']}--> {book['Name']} by {book['Author']}")
        i+=1

    # x = input("Enter the Book or Book ID You want to rent: ")
    x = int(input("Enter the Book or Book ID You want to rent: "))

    data = existing_file["Books"][x-1]
    # print(data)
    # Retrieve the book information based on the selected index (x)
    # Note: Subtract 1 from x because the index is 0-based in the list

    existing_file["Books"].pop(x-1)
    # Remove the selected book from the "Books" list using the pop() method

    with open("book_data.json", "w") as file:
        json.dump(existing_file, file, indent=4)
    # Save the modified library data back to the "book_data.json" file

    existing_file["Rental_book"].append(data)
    with open("book_data.json", "w") as file:
        json.dump(existing_file, file, indent=4)
    # Save the updated library data (including rented book) back to the file

    print(f"The {data['Name']}[{data['ID']}] has been Rented")

# rentBook()