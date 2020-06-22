<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Movie extends Model
{
    protected $guarded = [''];
    protected $appends = ['poster_path' ,'image_path'];

    //relations ---------------------------
    public function categories()
    {
        return $this->belongsToMany(Category::class , 'movie_category');
    }


    //get attribute -----------------------

    public function getPosterPathAttribute(){
        
        return Storage::url('images/'. $this->poster);

    } // end of getPosterPathAttribute

        //scope -----------------------------------

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

    public function getImagePathAttribute(){

        return Storage::url('images/'. $this->image);

    } // end of getImagePathAttribute


}
