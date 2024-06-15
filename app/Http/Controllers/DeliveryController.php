<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Purchase;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('delivery.index', [
            'deliveries' => Delivery::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('delivery.create', [
            'purchase' => Purchase::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = validator(
            $request->all(),
            [
                'delivery_id' => 'required|string|max:255|unique:deliveries, delivery_id',
                'purhchase_id' => 'required|string|max:50',
                'track_order' => 'required|string|max:200',
            ]
        )->validate();

        $delivery = new Delivery($validatedData);
        $delivery->save();
        $name = $validatedData['delivery_id'];
        $success = "Data Pengiriman $name berhasil dibuat";
        $failed = "Data Pengiriman $name gagal dibuat";
        if ($delivery) {
            return redirect(route('delivery.index'))->with('success', $success);
        } else {
            return redirect(route('delivery.index'))->with('failed', $failed);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Delivery $delivery)
    {
        return view('delivery.show', [
            'delivery' => $delivery,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Delivery $delivery)
    {
        return view('delivery.edit', [
            'delivery' => $delivery,
            'purchase' => Purchase::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Delivery $delivery)
    {
        $validatedData = validator(
            $request->all(),
            [
                'delivery_id' => 'required|string|max:255|unique:deliveries, delivery_id',
                'purhchase_id' => 'required|string|max:50',
                'track_order' => 'required|string|max:200',
            ]
        )->validate();

        $delivery->update($validatedData);
        $name = $validatedData['delivery_id'];
        $success = "Data Pengiriman $name berhasil diubah";
        $failed = "Data Pengiriman $name gagal diubah";
        if ($delivery) {
            return redirect(route('delivery.index'))->with('success', $success);
        } else {
            return redirect(route('delivery.index'))->with('failed', $failed);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Delivery $delivery)
    {
        $delivery->delete();
        $name = $delivery->delivery_id;
        $success = "Data Pengiriman $name berhasil diubah";
        $failed = "Data Pengiriman $name gagal diubah";
        if ($delivery) {
            return redirect(route('delivery.index'))->with('success', $success);
        } else {
            return redirect(route('delivery.index'))->with('failed', $failed);
        }
    }
}
