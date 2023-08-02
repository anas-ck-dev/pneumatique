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

    public function getTotalProductsCount()
    {
        $totalProductsCount = $this->products->count();
        echo "1=> " . $this->id . " " . $totalProductsCount . "</br>";

        if ($this->filsCategorys) {
            // $totalProductsCount += $this->filsCategorys->getTotalProductsCount();
            // echo $this->parentCategory->id . " " . $totalProductsCount . "</br>";
            foreach ($this->filsCategorys as $cat) {
                $totalProductsCount += $cat->getTotalProductsCount();
                echo "2=> id " . $cat->id . " parent  ". $cat->parentCategory-> id . " total " . $totalProductsCount . "</br>";

                // echo "3=> " . "id " . $cat->id . " name " . $cat->name . " </br>";
            }
            // echo "have a parent ";
        }

        return $totalProductsCount;
    }
}
