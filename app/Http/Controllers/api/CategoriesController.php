<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Traits\GeneralTrait;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
     use GeneralTrait;

     public function index(){
      $categories = Category::select('id', 'name', 'parent_id', 'is_active')->get();
      //return response()->json($categories);
      return $this-> returnData('Categories', $categories);
     }

     public function getCategoryById(Request $request)
    {

        $category = Category::select('id', 'name', 'parent_id', 'is_active')->find($request->id);
        if (!$category)
            return $this->returnError('001', 'cette categories pas trouver');

        return $this->returnData('categroy', $category, 'success');
    }

    public function changecategory_status(Request $request)
    {
       //validation
        Category::where('id',$request -> id) -> update(['is_active' =>$request ->  is_active]);

        return $this -> returnSuccessMessage('le statut de category est changer avec success ');

    }

}
