<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Http\Requests\CreateBookRequest;
use Illuminate\Support\Facades\Auth;
class bookController extends Controller
{
  
    // list 
    public function index()
    {   $books = Book::all();
        return response()->json([
            "message" => "All Books",
            "status_code" => 200,
            "data" => BookResource::collection($books)
      
        ]);
    }
    public function store(CreateBookRequest  $request)
    {
        $fileName = Book::uploadFile($request, $request->pic);
        Book::create([
            "title" => $request->title,
            "price" => $request->price,
            "des" => $request->des,
            "cat_id" => $request->category,
            "pic" => $fileName
        ]);
        return response()->json([
            "message" => "Book Created",
            "status_code" => 201,
            "data" => $book
        ]);
    }

    public function show($book)
    {
        $book = Book::findOrFail($book);
     
        return response()->json([
            "message" => "Book Find",
            "status_code" => 200,
            "data" => new BookResource($book)
        ]);
    }

    // view page of create
    public function destroy($book)
    {
        $book = Book::find($book);
        $book->delete();
        return response()->json([
            "message" => "Book Deleted",
            "status_code" => 200,
            "data" => []
        ]);
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

   
    return response()->json([
        "message" => "Book updated",
        "status_code" => 200,
        "data" => $book
    ]);
}
     
}
