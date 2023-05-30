import json

def removeBook():
    with open("Book_data.json", "r") as file:
        existing_data = json.load(file)

    i =0
    for book in existing_data["Books"]:
        print(f"{i+1}. {book['ID']}--> {book['Name']} by {book['Author']}")
        i+=1

    y = int(input("Which Book Do You want to remove: "))

    data = existing_data["Books"][y-1]

    existing_data["Books"].pop(y-1)

    try:
        with open("book_data.json", "w") as file:
            json.dump(existing_data, file, indent=4)
        print(f"The {data['Name']} [{data['ID']}] has been Removed from the Library!")
    except Exception:
        print("Some Error has Occured!")

# removeBook()