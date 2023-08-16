<?php 

namespace App\Dao;

use App\Category;
use App\Product;

class ProductDao
{

    public function getProductsByCategoryAndActive(Category $category, $is_active = true){
        return Product::Where('category_id', $category->id)
        ->Where('is_active', $is_active);

    }
}