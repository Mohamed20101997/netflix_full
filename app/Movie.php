<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Movie extends Model
{
    protected $guarded = [''];
    protected $appends = ['poster_path' ,'image_path','is_favored'];

    //relations ------------------------------------------------------

    public function categories()
    {
        return $this->belongsToMany(Category::class , 'movie_category');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_movie');
    }



    //get attribute ---------------------------------------------------

    public function getPosterPathAttribute(){

        return Storage::url('images/'. $this->poster);

    } // end of getPosterPathAttribute


    public function getImagePathAttribute(){

        return Storage::url('images/'. $this->image);

    } // end of getImagePathAttribute

    public function getIsFavoredAttribute()
    {
        if( auth()->user() )
        {

            return (bool)$this->users()->where('user_id', auth()->user()->id)->count();

        } // end of if

        return false;

    } // end of getIsFavoredAttribute


        //scope ----------------------------------------------------------

        public function scopeWhenSearch($query , $search)
        {
            return $query->when($search, function($q) use ($search){

                return $q->where('name', 'like' , "%$search%")
                        ->orWhere('description', 'like', "%$search%")
                        ->orWhere('year', 'like', "%$search%")
                        ->orWhere('rating', 'like', "%$search%");
            });

        } //end of scope when search


        public function scopeWhenCategory($query , $category)
        {
            return $query->when($category , function($q) use($category) {

                return $q->whereHas('categories', function($qu) use($category){

                    return $qu->whereIn('category_id', (array)$category)
                            ->orWhereIn('name', (array)$category);

                });

            });

        } //scopeWhenCategory



}
