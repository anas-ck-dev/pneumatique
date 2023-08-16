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










    public function listing(Category $category){
    
        // // get fils Categorys
        $fils_categorys= Category::where('parent_id', $category->id)->get();
        // $fils_categorys = $category->filsCategorys;

        // foreach($fils_categorys as $cat){
        //     $cat->filsCategorys;
        // }

        // // get products of this category
        // $products = Product::where('category_id', $category->id)->paginate();
            // foreach($this->getAllSubCategories($category) as $f){
            //     // if($f != null)
            //         // echo $f->id . " " . $f->parent_id. " " . $f->name . "<br>";
            // }
            $cats = $this->getAllSubCategories($category);
                // foreach($cats as $cat){
                //    print_r($cat->id) ;
                //    echo " </br>";

                // //    Product::where('category_id', cat)
                // }
                $cats_id = [];
                foreach($cats as $c){
                    $cats_id[] = $c->id;
                }
                // print_r($cats_id);
                $products = Product::whereIn('category_id', $cats_id)->paginate(10);
                // foreach($products as $product){
                //     echo $product->id . " " . $product->category->id . '</br>';    
                // }
                // print_r($products);
        return view("listing_product", compact(['fils_categorys','products', 'category']));

    }


public function filsz(Category $category){
    $fils = $category->filsCategorys;
    foreach($fils as $fil){
        $this->filsz($fil);
    }
}
public function getAllSubCategories(Category $category)
{
    
    $subCategories = [];

    // Process the current category and store its information in the array
    $subCategories[] = $category;

    // Get the subcategories of the current category
    $fils = $category->filsCategorys;

    // Recursively process subcategories and store their information in the array
    foreach ($fils as $fil) {
        $subCategories = array_merge($subCategories, $this->getAllSubCategories($fil));
    }

    return $subCategories;

    // $fils = $category->filsCategorys;
    // if($fils != null)
    //     foreach ($fils as $fil) {
    //         // Recursively call the function to get subcategories of subcategories.
    //         if($fil != null){
    //             $this->getAllSubCategories($fil);
    //             echo "=>>> " . $fil->id . " parent ". $fil->parent_id . "<br>";
    //             foreach($fil->products as $as){
    //                 echo $as->id . '<br>';
    //             }

    //         }

    //     }
    
    // Append the current category's subcategories to the result.
   
    // $subCategories = array_merge($subCategories, $fils->id);
        // foreach($subCategories as $c){
        //     print_r($c);
        //     echo '</br>';
        // }
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
