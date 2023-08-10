<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class bookController extends Controller
{
    
    // list 
    public function index()
    {   // sort the books in descending order based on the "id" column.
        $books = Book::paginate(10); //each page contains  max =10 books.
        $page = "Books";
        return view('display_books', [
            "page" => $page,
            "books" => $books
        ]);
    }
    public function store(Request $request)
    {
        Book::create([
            "title" => $request->title,
            "price" => $request->price,
            "des" => $request->des,
            "pic" => $request->pic
        ]);
        return redirect()->route('books.index');
    }

    public function show($book)
    {
        $book = Book::findOrFail($book);
       // dd($book['title']);
        $page = "book_info";
         return view('book_info', [
            "page" => $page,
            "book" => $book
        ]);
    }

    // view page of create
    public function destroy($book)
    {
        $book = Book::find($book);
        $book->delete();
        return redirect()->back();
    }
    public function update(Request $request, Book $book)
{
    // Validate the request data
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'price' => 'required|numeric',
        'des' => 'nullable|string',
        'pic' => 'nullable|string'
    ]);

    // Update the book attributes
    $book->title = $validatedData['title'];
    $book->price = $validatedData['price'];
    $book->des = $validatedData['des'];
    $book->pic = $validatedData['pic'];

    // Save the updated book to the database
    $book->save();

   
    return redirect()->route('books.index');
}
public function edit($bookId)
{
  
    $book = Book::find($bookId);

 
    return view('edit_book', ['book' => $book]);
}
     

}
