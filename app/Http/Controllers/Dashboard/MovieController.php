<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Jobs\StreamMovie;
use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:read_movies')->only(['index']);
        $this->middleware('permission:create_movies')->only(['create', 'store']);
        $this->middleware('permission:update_movies')->only(['edit','update']);
        $this->middleware('permission:delete_movies')->only(['destroy']);
        
    }


    public function index()
    {
        $movies = Movie::paginate(5);
        return view('dashboard.movies.index',compact('movies'));
        
    }

    public function show(Movie $movie)
    {
       return $movie ;
        
    }

    public function create()
    {
        $movie = Movie::create([]);
        return view('dashboard.movies.create', compact('movie'));
    }
    
    public function store(Request $request)
    {
       $movie = Movie::findOrFail($request->movie_id);

       $movie->update([

        'name'=> $request->name,
        'path'=> $request->file('movie')->store('movies'),
       ]);

       //the job in  background
       $this->dispatch(new StreamMovie($movie));

       return $movie;

    }

    public function edit(Movie $movie)
    {
        return view('dashboard.movies.edit',compact('movie'));
        
    }
    
    public function update(Request $request,Movie $movie)
    {
        
        $request->validate([
            'name'=>'required|unique:movies,name,'.$movie->id,
            'permissions'=>'required|array|min:1'
        ]);

        $movie->update($request->all());
        $movie->syncPermissions($request->permissions);
        session()->flash('success', 'Data updated successfully');
        return redirect()->route('dashboard.movies.index');
    }

    public function destroy(Movie $movie)
    {
        
        $movie->delete();
        session()->flash('success', 'Data deleted successfully');
        return redirect()->route('dashboard.movies.index');
    }
    
} //end of controller
