<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('books.index', ['books'=>Book::paginate(2)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create',['categories'=>Category::pluck('name','id')]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'=>'required',
            'pages'=>'nullable|min:0',
            'year'=>'nullable|min:1',
            'category_id'=>'nullable|exists:categories,id'
        ]);
        Book::create($validated);
        return redirect(route('books.index'))->with('status','Book is added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
