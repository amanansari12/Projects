# Library Management System

This project is a Library Management System implemented in Python. It utilizes the JSON file format to store the data of books in the library. The system allows users to perform various operations such as adding books, renting books, returning books, removing books, and viewing the available books in the library.

## Data Storage

The data of books in the library is stored using the JSON format. A JSON file named `book_data.json` is used to store the book information. The file contains two main sections: "Books" and "Rental_book". The "Books" section stores the information of books available in the library, while the "Rental_book" section stores the information of books that have been rented.

Each book entry in the JSON file consists of an ID, name, and author. The book ID is a unique identifier for each book, and it is used for book identification and retrieval operations.

## Functionality

The project provides the following functionalities:

- **Show Books**: Display the list of books available in the library.
- **Add Book**: Add a new book to the library by providing the book ID, name, and author.
- **Rent Book**: Rent a book from the library by specifying the book ID or book name.
- **Return Book**: Return a rented book to the library by specifying the book ID or book name.
- **Remove Book**: Remove a book from the library by specifying the book ID or book name.
- **Quit**: Exit the program.

## Usage

To use the Library Management System, simply run the Python script `library_management.py`. The program will display a menu with options to perform various operations. Enter the corresponding number for the desired operation and follow the prompts to input the required information.

The data of books and rental records will be stored and retrieved from the `book_data.json` file.

## Dependencies

The project relies on the following dependencies:

- Python 3.x
- `json` module (included in Python standard library)

Ensure that you have Python installed on your system before running the program.

