<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class AuthorController extends Controller
{
    public function index()
{
    $authors = \App\Models\Author::withCount('books')->get();
    return view('authors.index', compact('authors'));
}

public function create()
{
    return view('authors.create');
}

public function store(Request $request)
{
    $request->validate(['name' => 'required|string|max:255']);
    \App\Models\Author::create($request->all());
    return redirect()->route('authors.index')->with('success', 'Author created.');
}

public function show(Author $author)
{
    $author->load('books');
    return view('authors.show', compact('author'));
}

public function edit(Author $author)
{
    return view('authors.edit', compact('author'));
}

public function update(Request $request, Author $author)
{
    $request->validate(['name' => 'required|string|max:255']);
    $author->update($request->all());
    return redirect()->route('authors.index')->with('success', 'Author updated.');
}

public function destroy(Author $author)
{
    $author->delete();
    return redirect()->route('authors.index')->with('success', 'Author deleted.');
}

}
