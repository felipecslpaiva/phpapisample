<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){}

    //List
    public function showAllUsers(){
        return response()->json(User::all());
    }

    //View
    public function showOneUser($id){
        return response()->json(User::find($id));
    }

    //Add
    public function create(Request $request){
        $this->validate($request, [
            'full_name' => 'required',
            'e_mail' => 'required|email|unique:users',
            'location' => 'required'
        ]);

        $user = User::create($request->all());
        return response()->json($user, 201);
    }

    public function delete($id){
        User::findOrFail($id)->delete();
        return response()->json(["message"=>"Deleted Successfully"], 200);
    }

    public function update($id, Request $request){
        $user = User::findOrFail($id);
        $user->update($request->all());

        return response()->json($user, 200);
    }
}
