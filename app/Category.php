<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [

        "name", "parent_id", "is_active"
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }


    /**
     * Store a new gym record in the database associated with the given user ID.
     *
     * @return \App\Category 
     */
    public function filsCategorys()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

 
}

