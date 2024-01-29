<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'message'=> 'success retrieve data',
            'data' => Product::with(['prices'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Product::create([
            'uom_id' => $request->uom_id,
            'code' => $request->code,
            'name' => $request->name,
            'color' => $request->color,
            'is_raw_material' => $request->is_raw_material,
            'is_active' => $request->is_active,
        ]);

        if($request->prices) {
            foreach($request->prices as $price){
                $product->prices()->create([
                  'price'=>$price  
                ]);
            }
        }

        return response()->json([
            'message'=> 'success create data', 
            'data'=> $product
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        $product->update([
            'uom_id' => $request->uom_id,
            'code' => $request->code,
            'name' => $request->name,
            'color' => $request->color,
            'is_raw_material' => $request->is_raw_material,
            'is_active' => $request->is_active,
        ]);
        
        $product->prices()->delete();

        foreach($request->prices as $price){
            $product->prices()->create([
                'price'=>$price
            ]);
        }

        return response()->json([
            'message'=> 'success update data', 
            'data'=> $product
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        Product::find($id)->delete();
        
        return response()->json([
            'message'=> 'success delete data'
        ]);
    }
}
