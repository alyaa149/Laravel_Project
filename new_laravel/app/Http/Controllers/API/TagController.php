<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Resources\TagResource;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();

       
       return TagResource::collection($tags);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Tag::create([
            "name" => $request->name
            
        ]);
        return response()->json([
            "message" => "tag Created",
            "status_code" => 201
          
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($tag)
    {
        
        $tag = Tag::findOrFail($tag);
     
        return response()->json([
            "message" => "Tag Find",
            "status_code" => 200,
            "data" => new TagResource($tag)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
      
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
          
        ]);
    
        // Update the book attributes
        $tag->name = $validatedData['name'];
        //$tag->name = $request['name'];
        $tag->save();
        return response()->json([
            "message" => "Tag updated",
            "status_code" => 200,
            "data" => $tag
        ]);
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($tag)
    {
        $tag = Tag::findOrFail($tag);
        $tag->delete();
        return response()->json([
            "message" => "Tag Deleted",
            "status_code" => 200,
            "data" => []
        ]);
        //
    }
}
