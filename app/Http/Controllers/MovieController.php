<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {

        if(request()->ajax()){

            $movies = Movie::whenSearch(request()->search)->get();
            return $movies;
        }


        $movies = Movie::whenCategory(request()->category_name)
                    ->whenFavorite(request()->favorite)
                    ->paginate(20);

        return view('movies.index', compact('movies'));

    }
    public function show(Movie $movie)
    {
        $related_movies = Movie::where('id', '!=', $movie->id)
        ->whereHas('categories', function($q) use($movie){
            return $q->whereIn('category_id' , $movie->categories->pluck('id')->toArray());
        })->get();

        return view('movies.show', compact('movie','related_movies'));

    }

    public function toggle_favorite(Movie $movie)
    {
        $movie->is_favored ? $movie->users()->detach(auth()->user()->id) :  $movie->users()->attach(auth()->user()->id) ;

    } //end if toggle favorite
}
