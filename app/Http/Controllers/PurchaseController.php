<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('purchase.index', [
            'purchases' => Purchase::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('purchase.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;

        $validatedData = $request->validate([
            'purchase_id' => 'required|string|max:50|unique:purchasing,purchase_id',
            'date' => 'required|date',
            'address' => 'required|string|max:255',
            'status_order' => 'required|integer',
            'total_purchase' => 'required|integer',
            'total_payment' => 'required|integer',
        ]);

        $validatedData['user_id'] = $user_id;

        $purchase = new Purchase($validatedData);
        $purchase->save();

        $name = $validatedData['purchase_id'];
        $success = "Data Purchase ID $name berhasil ditambah";
        $failed = "Data Purchase ID $name gagal ditambah";

        if ($purchase) {
            return redirect(route('purchase.index'))->with('success', $success);
        } else {
            return redirect(route('purchase.index'))->with('failed', $failed);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}
