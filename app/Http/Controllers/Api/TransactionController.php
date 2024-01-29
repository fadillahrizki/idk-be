<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SellTransaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'message'=> 'success retrieve data',
            'data' => SellTransaction::with(['details'])->get()
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
        $transaction = SellTransaction::create([
            'transaction_date' => date('Y-m-d', strtotime($request->transaction_date)),
            'customer_name' => $request->customer_name,
            // 'is_cancelled' => $request->is_cancelled,
            // 'cancelled_at' => $request->cancelled_at,
            // 'is_printed' => $request->is_printed,
            // 'printed_at' => $request->printed_at,
            // 'sub_total' => $request->sub_total,
            'disc_amount' => $request->disc_amount,
            // 'grand_total' => $request->grand_total,
            'notes' => $request->notes,
        ]);

        $transaction->details()->create([
            'qty'=> $request->qty,
            'uom_id'=> $request->uom_id,
            'product_id'=> $request->product_id,
            'price'=> $request->price,
            'disc_1'=> $request->disc_1,
            'disc_2'=> $request->disc_2,
            'disc_amount'=> $request->disc_1 + $request->disc_2,
            'total'=> $request->price - ($request->disc_1 + $request->disc_2),
        ]);

        return response()->json([
            'message'=> 'success create data', 
            'data'=> $transaction
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
        $transaction = SellTransaction::find($id);
        
        $transaction->update([
            'transaction_date' => date('Y-m-d', strtotime($request->transaction_date)),
            'customer_name' => $request->customer_name,
            // 'is_cancelled' => $request->is_cancelled,
            // 'cancelled_at' => $request->cancelled_at,
            // 'is_printed' => $request->is_printed,
            // 'printed_at' => $request->printed_at,
            // 'sub_total' => $request->sub_total,
            // 'disc_amount' => $request->disc_amount,
            // 'grand_total' => $request->grand_total,
            'notes' => $request->notes,
        ]);

        $transaction->details()->update([
            'qty'=> $request->qty,
            'uom_id'=> $request->uom_id,
            'product_id'=> $request->product_id,
            'price'=> $request->price,
            'disc_1'=> $request->disc_1,
            'disc_2'=> $request->disc_2,
            'disc_amount'=> $request->disc_1 + $request->disc_2,
            'total'=> $request->price - ($request->disc_1 + $request->disc_2),
        ]);

        return response()->json([
            'message'=> 'success update data', 
            'data'=> $transaction
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        SellTransaction::find($id)->delete();
        
        return response()->json([
            'message'=> 'success delete data'
        ]);
    }
}
