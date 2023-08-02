<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {

        $products = Product::with('category')
        ->where('is_active', true)
        ->paginate(12);

        $categorys = Category::select('categories.id', 'categories.name')
        ->selectRaw('(SELECT COUNT(*) FROM products WHERE products.category_id = categories.id) as count')
        ->join('products', 'products.category_id', '=', 'categories.id')
        ->where('products.is_active', 1)
        ->DISTINCT()
        ->get();

        return view('index', compact(['products', 'categorys']));

     }
     public function showByName($id)
     {
         // Fetch the product based on the provided name
         $product = Product::where('id', $id)->first();
         // Check if the product was found
         if ($product) {
             return view('product', compact('product'));
         } else {
             abort(404); 
         }
    }

    public function searchByCategorie(Category $category){
        $category_id =  $category->id;
        $products = Product::Where('category_id', $category_id)
        ->Where('is_active', true)
        ->paginate(12);

        $categorys = Category::select('categories.id', 'categories.name')
        ->selectRaw('(SELECT COUNT(*) FROM products WHERE products.category_id = categories.id) as count')
        ->join('products', 'products.category_id', '=', 'categories.id')
        ->where('products.is_active', 1)
        ->DISTINCT()
        ->get();

        return view('index', compact(['products', 'categorys', 'category_id']));
    }
    public function cat(Category $category){
        // printf($category->filsCategorys);
        // echo $category->filsCategorys->getTotalProductsCount();
        echo $category->getTotalProductsCount() . "</br>";
        // foreach($category->filsCategorys as $cat){
        //     echo "id " . $cat->id . " name " . $cat->name . " "; 
        //     echo $cat->getTotalProductsCount() . "</br>";
            
        // }
    }
   
}
