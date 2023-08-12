<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bookController;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Category;


// Route::get('/', function () {
//     $books = [
//         [
//             "id"   =>1,
//             "title" => "book1",
//             "price" => 100,
//             "des"   => "des book1",
//             "pic"   => "pic1.png"
//         ],
//         [
//             "id"   =>2,
//             "title" => "book2",
//             "price" => 200,
//             "des"   => "des book2",
//             "pic"   => "pic2.png"
//         ],
//         [
//             "id"   =>3,
//             "title" => "book3",
//             "price" => 300,
//             "des"   => "des book3",
            
//             "pic"   => "pic3.png"
//         ],
//     ];
//     $page = "Books Profile";
//     return view('display_books', [
//         "page" => $page,
//         "books" => $books
//     ]);
// });
Route::get('/', function () {
    return view('welcome');
});
Route::resource('display_books', BookController::class);
Route::get('create-book', function () {
    $page = "create book";
    $categories = Category::all();    
    return view('create-book', ['page' => $page,'categories' => $categories]);
})->name('create-book');


// Route::get('books', [bookController::class, 'index'])->name('books.index');
// Route::post('books', [bookController::class, 'store'])->name('books.store');
// Route::get('books/{book}',[bookController::class,'show'])->name('books.show');
// Route::delete('books/{book}',[bookController::class,'destroy'])->name('books.destroy');
 //Route::put('/books/{book}', [bookController::class, 'update'])->name('books.update');
 Route::get('/edit_book/{book_id}', [bookController::class, 'edit'])->name('edit_book');
Route::middleware(['auth'])->group(function () {
    Route::resource('books', bookController::class);
    //, ['except' => ['update', 'edit']]
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

