<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Product;

class SearchController extends Controller
{
    function search(Request $request)
    {
        // if($request con)
        $searchText = $request->input('searchText');
        $idParentCategorie = $request->input('idParentCategorie');

        // $idParentCategorie = $category;

        if (!empty($idParentCategorie))
        {
            if (!empty($searchText))
            {
                $products = Product::where('category_id', $idParentCategorie)
                ->where('name', 'like', '%' . $searchText . '%')
                ->paginate(5);

                return response()->view('search', compact('products'));
            }

            $products = Product::where('category_id', $idParentCategorie)->paginate(5);
            return response()->view('search', compact('products'));
        }
        else
        {
            if(!empty($searchText)){
                $products = Product::where('name', 'like', '%' . $searchText . '%')->paginate(5);
                return response()->view('search', compact('products'));
            }
            $products = Product::paginate(5);
            return response()->view('search', compact('products'));

        }




    }

}
