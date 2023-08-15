<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Category extends Model
{
    use HasFactory;
    protected $table = "tags";
    protected $fillable = ['name'];
    public function books(): HasMany
    {
        return $this->hasMany(Book::class,'cat_id');
    }
}