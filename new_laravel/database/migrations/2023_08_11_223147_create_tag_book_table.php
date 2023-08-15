<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tag_book', function (Blueprint $table) {
           
            $table->unsignedBigInteger('tag_id')->nullable();

            $table->unsignedBigInteger('book_id')->nullable();
        
            $table->foreign('tag_id')->references('id')->on('tags')
        
                ->onDelete('cascade');
        
            $table->foreign('book_id')->references('id')->on('books')
        
                ->onDelete('cascade');
        
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('tag_book');
    }
};
