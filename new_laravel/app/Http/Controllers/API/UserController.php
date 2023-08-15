<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return UserResource::collection($users);
    }
    
    public function store(Request $request)
    {
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password
            
        ]);
        return response()->json([
            "message" => "user Created",
            "status_code" => 201
          
        ]);
    }
   
    public function show($user)
    {
        
        $user = User::findOrFail($user);
     
        return response()->json([
            "message" => "User Find",
            "status_code" => 200,
            "data" => new UserResource($user)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
        return response()->json([
            "message" => "User updated",
            "status_code" => 200,
            "data" => $user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user)
    {
        $user = User::findOrFail($user);
        $user->delete();
        return response()->json([
            "message" => "User Deleted",
            "status_code" => 200,
            "data" => []
        ]);
        //
    }
}
