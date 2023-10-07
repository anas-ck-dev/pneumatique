<?php

namespace App\Http\Controllers;

use App\Category;
use App\Dao\ProductDao;
use App\Product;
use App\Brand;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    private $productService;
    private $productDao;

    public function __construct(ProductService $productService, ProductDao $productDao)
    {
        $this->productService = $productService;
        $this->productDao = $productDao;

    }



    public function index(Request $request)
    {
        $tops = Product::all();
  
        $top_list_all = Product::all();
        $lims_brand_list = Brand::where('is_active',true)->get();
        //$sortOption = $request->input('sortOption');
        $category = Category::find(1); // id 91 for category PNUE
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
	    ->where('is_active', 1)
        ->whereIn('category_id', $cats_id)->paginate(5);

        // switch ($sortOption) {
        //     case 'latest':
        //         $products->orderBy('created_at', 'desc');
        //         break;
        //     case 'oldest':
        //         $products->orderBy('created_at', 'asc');
        //         break;
        //     case 'name':
        //         $products->orderBy('name', 'asc');
        //         break;
        //     case 'price':
        //         $products->orderBy('price', 'asc');
        //         break;
        //     default:
        //         // Default sorting logic if needed
        //         break;
        // }
        $lims_brand_list = Brand::where('is_active',true)->get();

        $categorys = Category::select('categories.id', 'categories.name')
        ->where('categories.parent_id', null)
        ->DISTINCT()
        ->get();
        return view('index', compact(['products','category','categorys','lims_brand_list','lims_brand_list','tops']));
     }

     public function searchByCategorie(Category $category){
        // // get fils Categories direct
        $tops = Product::all();
        $categorys= Category::where('parent_id', $category->id)->get();
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
        ->where('is_active', 1)
        ->whereIn('category_id', $cats_id)->paginate(6);
        $lims_brand_list = Brand::where('is_active',true)->get();
     
         return view('index', compact(['products', 'categorys', 'category','lims_brand_list','tops']));
     
       }

     
    public function showByName($id)
    {
        $category = Category::find(1);
         // Fetch the product based on the provided name
         $product = Product::where('id', $id)->first();
         // Check if the product was found
         if ($product) {
             return view('product', compact('product', 'category'));
         } else {
             abort(404);
         }
    }

     public function search(Request $request)
    {
        $searchText = $request->input('searchText');
        $brand = $request->input('brand');
        $idParentCategorie = $request->input('idParentCategorie');

        if (!empty($idParentCategorie)){
        $category = Category::find($idParentCategorie); // id 91 for category PNUE
        $fils_categorys= Category::where('parent_id', $idParentCategorie)->get();
        // get All Sub Categories ( sub of sub)
        $allSubCategories = $this->productService->getAllSubCategories($category);
        // array to stock id of all subcategories
        $cats_id = [];
        foreach($allSubCategories as $category1){
            $cats_id[] = $category1->id;
        }};

        $query = Product::where('is_active', 1)
            ->where('featured', true)->where('image','<>', 'zummXD2dvAtI.png');

        if (!empty($idParentCategorie)) {
            $query->whereIn('category_id', $cats_id);
        }
        if (!empty($searchText)) {
            $query->where('name', 'LIKE', "%{$searchText}%");
        }
        if (!empty($brand)) {
            $query->where('brand_id', $brand);
        }
        $products = $query->get();
        return view('search', compact('products', 'searchText'));
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
        ->where('is_active', 1)
        ->where('image','<>', 'zummXD2dvAtI.png')
        ->whereIn('category_id', $cats_id)->paginate(5);
        return view("listing_product", compact(['fils_categorys','products', 'category']));
    }




// panier controler methodes
public function cart(Request $request)
{
    $category = Category::find(1);
    $products = Product::all();  // Fetch the products from the database or adjust based on your logic
    return view('cart', compact('products', 'category'));
}

public function addToCart($id)
{
    if (Auth::check()) {
        // User is logged in
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "id" => $product->id,
                "product_name" => $product->name,
                "photo" => $product->image,
                "price" => $product->price,
                "quantity" => 1,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to the cart successfully!');
    } else {
        // User is not logged in
        return redirect()->route('login.perform')->with('error', 'You need to log in to add products to the cart.');
    }
}

public function update(Request $request)
{
    if (Auth::check()) {
        // Ensure both id and quantity are present in the request
        if ($request->has('id') && $request->has('quantity')) {
            $cart = session()->get('cart', []);
            // Check if the product id exists in the cart
            if (isset($cart[$request->id])) {
                $cart[$request->id]["quantity"] = $request->quantity;
                session()->put('cart', $cart);
                session()->flash('success', 'Cart successfully updated!');
            }
        }
    } else {
        // User is not logged in
        return redirect()->route('login.perform')->with('error', 'You need to log in to update the cart.');
    }
}

public function remove(Request $request)
{
    if (Auth::check()) {
        // Ensure id is present in the request
        if ($request->has('id')) {
            $cart = session()->get('cart', []);
            // Check if the product id exists in the cart
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
                session()->flash('success', 'Product successfully removed!');
            }
        }
    } else {
        // User is not logged in
        return redirect()->route('login.perform')->with('error', 'You need to log in to remove products from the cart.');
    }
}
}