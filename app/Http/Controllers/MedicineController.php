<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('medicine.index', [
            'medicines' => Medicine::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medicine.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = validator(
            $request->all(),
            [
                'med_id' => 'required|string|max:50|unique:medcines, med_id',
                'med_name' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'price' => 'required|integer',
                'med_quantity' => 'required|integer',
                'exp_date' => 'required|date',
            ]
        )->validate();
        $medicine = new Medicine($validatedData);
        $medicine->save();
        $name = $validatedData('med_name');
        $success = "Data Obat $name berhasil ditambah";
        $failed = "Data Obat $name gagal ditambah";

        if ($medicine) {
            return redirect(route('medicine.index'))->with('success', $success);
        } else {
            return redirect(route('medicine.index'))->with('failed', $failed);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Medicine $medicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicine $medicine)
    {
        return view('medicine.edit', [
            'medicine' => $medicine
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medicine $medicine)
    {
        $alidatedData = validator(
            $request->all(),
            [
                'med_id' => 'required|string|max:50|unique:medcines, med_id',
                'med_name' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'price' => 'required|integer',
                'med_quantity' => 'required|integer',
                'exp_date' => 'required|date',
            ]
        )->validate();
        $medicine->update($validatedData);
        $name = $validatedData('med_name');
        $success = "Data Obat $name berhasil diubah";
        $failed = "Data Obat $name gagal diubah";

        if ($medicine) {
            return redirect(route('medicine.index'))->with('success', $success);
        } else {
            return redirect(route('medicine.index'))->with('failed', $failed);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicine $medicine)
    {
        $medicine->delete();
        $name = $medicine->med_name;
        $success = "Data Obat $name berhasil dihapus";
        $failed = "Data Obat $name gagal dihapus";

        if ($medicine) {
            return redirect(route('medicine.index'))->with('success', $success);
        } else {
            return redirect(route('medicine.index'))->with('failed', $failed);
        }
    }
}
