import json

def showBook():
    with open("book_data.json", "r") as file:
        exiting_file= json.load(file)

    if not bool(exiting_file["Books"]):
        # Check if there are books in the library
        print("No Books are available in Library")
        return

    i =0
    # print("\n")
    len_lib = len(exiting_file["Books"])
    print(f"There are currently {len_lib} books in the library.")
    for book in exiting_file["Books"]:
        print(f"{i+1}. {book['ID']}--> {book['Name']} by {book['Author']}")
        i+=1
# showBook()