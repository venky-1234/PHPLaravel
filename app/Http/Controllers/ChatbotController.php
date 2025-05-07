<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;

class ChatbotController extends Controller
{
    public function respond(Request $request)
    {
        $query = strtolower($request->input('message'));

        if (str_contains($query, 'how many authors')) {
            return response()->json(['reply' => 'There are ' . Author::count() . ' authors.']);
        }

        if (str_contains($query, 'how many books')) {
            return response()->json(['reply' => 'There are ' . Book::count() . ' books available.']);
        }

        if (str_contains($query, 'top 5 authors')) {
            $topAuthors = Author::withCount('books')->orderByDesc('books_count')->take(5)->get();
            $list = $topAuthors->pluck('name')->join(', ');
            return response()->json(['reply' => 'Top 5 authors: ' . $list]);
        }

        return response()->json(['reply' => "Sorry, I don't understand that question."]);
    }
}
