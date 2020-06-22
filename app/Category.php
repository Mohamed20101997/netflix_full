<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable =['name'];


    //attributes --------------------------------

    public function getNameAttribute($value){
        
        return ucfirst($value);
    }


    //scope -----------------------------------

    public function scopeWhenSearch($query , $search)
    {
        return $query->when($search, function($q) use ($search){
            
            return $q->where('name', 'like' , "%$search%");
        });

    }

    //relations ---------------------------
    public function movies()
    {
        return $this->belongsToMany(Movie::class , 'movie_category');
    }
}
