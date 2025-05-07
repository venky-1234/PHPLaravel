<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Show the list of books
    public function index()
    {
        $books = Book::with('author')->get(); // Eager load author for each book
        return view('books.index', compact('books'));
    }

    // Show form to create a new book
    public function create()
    {
        $authors = Author::all(); // Get all authors for the dropdown
        return view('books.create', compact('authors'));
    }

    // Store the newly created book
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'pages' => 'required|numeric',
            'author_id' => 'required|exists:authors,id',
        ]);

        Book::create($request->all()); // Create the book

        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    }

    // Show form to edit an existing book
    public function edit(Book $book)
    {
        $authors = Author::all(); // Get all authors for the dropdown
        return view('books.edit', compact('book', 'authors'));
    }

    // Update the existing book
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'pages' => 'required|numeric',
            'author_id' => 'required|exists:authors,id',
        ]);

        $book->update($request->all()); // Update the book

        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    // Delete an existing book
    public function destroy(Book $book)
    {
        $book->delete(); // Delete the book
        return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    }
}
