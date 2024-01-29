<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Uom;
use Illuminate\Http\Request;

class UomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'message'=> 'success retrieve data',
            'data' => Uom::get()
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
        $uom = Uom::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return response()->json([
            'message'=> 'success create data', 
            'data'=> $uom
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
        Uom::find($id)->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return response()->json([
            'message'=> 'success update data', 
            'data'=> Uom::find($id)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        Uom::find($id)->delete();
        
        return response()->json([
            'message'=> 'success delete data'
        ]);
    }
}
