<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    //
    public function index()
    {
        //$request->session()->put('key', 'value');
        //$type=Auth::user()->role[0]->role_name;
        //dd($s[0]->role_name);
         
        
        return view('user');
    }
}
