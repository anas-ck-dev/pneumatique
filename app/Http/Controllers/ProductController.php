<?php

namespace App\Http\Controllers;

use App\Category;
use App\Dao\ProductDao;
use App\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productService;
    private $productDao;

    public function __construct(ProductService $productService, ProductDao $productDao)
    {
        $this->productService = $productService;
        $this->productDao = $productDao;

    }
    public function index()
    {


        $category = Category::find(91); // id 91 for category PNUE
        // // get fils Categories direct
        $fils_categorys= Category::where('parent_id', $category->id)->get();

        // get All Sub Categories ( sub of sub)
        $allSubCategories = $this->productService->getAllSubCategories($category);

        // array to stock id of all subcategories
        $cats_id = [];

        foreach($allSubCategories as $category1){
            $cats_id[] = $category1->id;
        }

        // get all products of Sub Categories with pagination
        $products = Product::Where('featured', true)
        ->where('image','<>', 'zummXD2dvAtI.png')
        ->whereIn('category_id', $cats_id)->paginate(5);

        $categorys = Category::select('categories.id', 'categories.name')
        ->selectRaw('(SELECT COUNT(*) FROM products WHERE products.category_id = categories.id) as count')
        ->join('products', 'products.category_id', '=', 'categories.id')
        ->where('products.is_active', 1)
        ->where('categories.parent_id', null)
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
        $products = $this->productDao->getProductsByCategoryAndActive($category, true)->paginate(12);


        $categorys = $category->filsCategorys;
        return view('index', compact(['products', 'categorys', 'category']));

 }

    public function listing(Category $category){

        // // get fils Categories direct
        $fils_categorys= Category::where('parent_id', $category->id)->get();

        // get All Sub Categories ( sub of sub)
        $allSubCategories = $this->productService->getAllSubCategories($category);

        // array to stock id of all subcategories
        $cats_id = [];

        foreach($allSubCategories as $category1){
            $cats_id[] = $category1->id;
        }

        // get all products of Sub Categories with pagination
        $products = Product::Where('featured', true)
        ->where('image','<>', 'zummXD2dvAtI.png')
        ->whereIn('category_id', $cats_id)->paginate(5);

        return view("listing_product", compact(['fils_categorys','products', 'category']));

    }


}
