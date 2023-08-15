<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        
       return CategoryResource::collection($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::create([
            "name" => $request->name
            
        ]);
        return response()->json([
            "message" => "category Created",
            "status_code" => 201
          
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($category)
    {
        $category = Category::findOrFail($category);
        
        return response()->json([
            "message" => "Category Find",
            "status_code" => 200,
            "data" => new CategoryResource($category)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
     
        $category->update([
            'price' => $request->price
        ]);
        return response()->json([
            "message" => "Category updated",
            "status_code" => 200,
            "data" => $category
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($category)
    {
        $category = Category::findOrFail($category);
        $category->delete();
        return response()->json([
            "message" => "Category Deleted",
            "status_code" => 200,
            "data" => []
        ]);
    }
}
