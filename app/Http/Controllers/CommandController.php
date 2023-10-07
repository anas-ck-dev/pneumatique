<?php

namespace App\Http\Controllers;

use App\Models\Command;
use App\Product;
use Illuminate\Http\Request;

class CommandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->check()) {
            // Store the previous URL in the session
            session()->put('previous_url', url()->previous());
            return redirect()->route('login.perform')->with('failed', 'You need to be logged in to place an order.');
        }
    
        $command = $request->validate([
            'full_name' => 'string|required|min:2',
            'address' => 'string|required|min:2',
            'tel' => 'numeric|required|min:10',
            'product_id' => 'numeric|required',
            'quantity' => 'numeric|required|min:1|max:10'
        ]);
    
        $product =  Product::find($command['product_id']);
    
        $qte = $command['quantity'];
    
        if ($product->qty < $qte) {
            return redirect()->route('product.index', $command['product_id'])->with('failed', 'Grand Quantite');
        }
    
        $command = Command::create($command);
    
        
    
        return redirect(session()->get('previous_url', route('product.index', $command['product_id'])))->with('success', 'Nous vous remercions d\'avoir passé commande.');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Command  $command
     * @return \Illuminate\Http\Response
     */
    public function show(Command $command)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Command  $command
     * @return \Illuminate\Http\Response
     */
    public function edit(Command $command)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Command  $command
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Command $command)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Command  $command
     * @return \Illuminate\Http\Response
     */
    public function destroy(Command $command)
    {
        //
    }
}
