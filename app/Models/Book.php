<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Category;


class Book extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'price','des','cat_id', 'pic'];
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class,'cat_id');
    }
    public static function uploadFile($request, $neededFile)
    {
        $fileName = "book_" . time() . '_' . $neededFile->getClientOriginalName(); //if 2 user put same pic
        $request->file('pic')->storeAs(
            'public/books',
            $fileName
        );
        return $fileName;
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_book');
    }
}
