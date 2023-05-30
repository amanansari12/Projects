import json

def removeBook():
    with open("Book_data.json", "r") as file:
        existing_file = json.load(file)

    i =0
    for book in existing_file["Books"]:
        print(f"{i+1}. {book['ID']}--> {book['Name']} by {book['Author']}")
        i+=1

    id = ""
    name = ""
    try:
        x = input("Enter the ID or name of the book you want to remove: ")
        for book in existing_file["Books"]:
            if x == book['ID'] or x == book['Name']:
                id = book['ID']
                name = book['Name']
                existing_file["Books"].remove(book)
                existing_file["Rental_book"].append(book)

        with open("book_data.json", "w") as file:
            json.dump(existing_file, file, indent=4)

        print(f"The {name} [{id}] has been Removed from the Library")
        
    except Exception:
        print("Some Error has Occured!")

# removeBook()