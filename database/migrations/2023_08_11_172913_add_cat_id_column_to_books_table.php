<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->unsignedBigInteger('cat_id')->nullable(); //to big data
            $table->foreign('cat_id') //
                ->references('id')->on('categories')
                ->onDelete('cascade') //=>automatically delete data from a child table when you delete data from the parent table
                ->onUpdate('cascade');

        });
    }

    public function down(): void
    {
       
        Schema::table('books', function (Blueprint $table) {
            //1- delete Relation
            $table->dropForeign(['cat_id']);
            //2-delete Column
            $table->dropColumn('cat_id');
        });
    }
};
