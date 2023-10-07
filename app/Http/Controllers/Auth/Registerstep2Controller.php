<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


class Registerstep2Controller extends Controller
{
   public function create()
   {
        return view('auth.registersteptwo');    
   }

   public function store (Request $Request)
   {


   }
}
