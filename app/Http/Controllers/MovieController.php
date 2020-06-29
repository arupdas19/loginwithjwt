<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
       $this->middleware('auth:api');
    }
    public function index()
    {
        //
        $movies =Movie::all()->map(function($a){
            $a->movie_poster_img = Storage::disk(env('FILESYSTEM_DRIVER', ''))->exists($a->movie_poster_img) ? asset(Storage::disk(env('FILESYSTEM_DRIVER', ''))->url($a->movie_poster_img)) : asset('images/no-image.png');
            return $a;
        });
        // Storage::disk(env('FILESYSTEM_DRIVER', ''))->exists($this->movie_poster) ? asset(Storage::disk(env('FILESYSTEM_DRIVER', ''))->url($this->movie_poster)) : asset('images/no-image.png')
        return response()->json(['data' => $movies]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
                 $movie_name=$request->input('name');
                $movie_description=$request->input('desc');
                $movie_poster = $request->file('movie_poster')->storeAs(
                    'movies', time().'.jpg'
                );
                //Storage::put("public/movies",$movie_poster);done next
        
        $item = new Movie();

        $item->movie_name = $movie_name;
        $item->movie_desc = $movie_description;
        $item->movie_poster_img = $movie_poster;
        
        $s=Movie::where('movie_name',$movie_name)->get();
        if(sizeof($s)==1){
            return response()->json(['message' => 'already exist','status'=>0]);    
        }else{
            $item->save();
            return response()->json(['data' => $item,'status'=>1]); 
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show($movie)
    {
        //
        return response()->json(['data' => Movie::find($movie)]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$movie)
    {
    
        $item=Movie::find($movie); 
        $item->movie_name=$request->input('name');
        $item->movie_desc=$request->input('desc');
        if ($request->file('movie_poster')) {
            Storage::delete($item->movie_poster_img);
            $item->movie_poster_img= $request->file('movie_poster')->storeAs(
                'moives', time().'.jpg'
            );
        }


        $item->save();
        return response()->json(['data' => $item,'status'=>'1']); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy($movie)
    {
        //
        $moviedetails = Movie::find($movie);
        $poster= $moviedetails->movie_poster_img;
        $moviedetails->delete();
        Storage::delete($poster);
        return response()->json([
            "serverResponse" => [
                "code" => 200,
                "message" => "Movies Deleted Successfully",
                "isSuccess" => true
            ]]);


    }
}
