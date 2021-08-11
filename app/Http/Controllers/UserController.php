<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function allUser(){

        $users = User::all();
       // dd($users);
        return view('backend.users.show',compact('users'));

    }
}
