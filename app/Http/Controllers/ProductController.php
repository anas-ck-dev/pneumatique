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

        $categorys = Category::Where('is_active', true)->orderBy('name', 'ASC')->get();

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

    public function searchByCategorie(Request $request){
        
        $products = Product::Where('category_id', $request->search_categorie);

        $categorys = Category::Where('is_active', true)->orderBy('name', 'ASC')->get();
        
        return view('index', compact(['products', 'categorys']));
    }
   
}
