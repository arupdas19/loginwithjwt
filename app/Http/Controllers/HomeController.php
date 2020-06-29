<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       //$this->middleware('test');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$type=Auth::user()->role[0]->role_name;
        //dd($s[0]->role_name);

        
        return view('home');
    }
    
    public function create()
    {
       // dd(User::pluck("id","email"));
       
            //$users=User::all();
            return view('Movies.MovieCreate');;
       
        
    }
    public function list()
    {
       // dd(User::pluck("id","email"));
        
           // $users=User::all();
            return view('Movies.MovieList');;
        
        
    }
}
