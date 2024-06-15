<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('role.index',[
            'roles' => Role::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = validator(
            $request->all(),
            [
                'role_id' => 'required|string|max:2|unique:role,role_id',
                'role_name' => 'required|string|max:255'
            ]
        )->validate();
        $role = new Role($validatedData);
        $role->save();
        $name = $validatedData('role_name');
        $success = "Data Role $name berhasil ditambah";
        $failed = "Data Role $name gagal ditambah";
        if ($role) {
            return redirect(route('role.index'))->with('success', $success);
        } else {
            return redirect(route('role.index'))->with('failed', $failed);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('role.edit', [
            'role' => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $validatedData = validator(
            $request->all(),
            [
                'role_id' => 'required|string|max:2|unique:role,role_id',
                'role_name' => 'required|string|max:255'
            ]
        )->validate();
        $role->update($validatedData);
        $name = $validatedData('role_name');
        $success = "Data Role $name berhasil diubah";
        $failed = "Data Role $name gagal diubah";
        if ($role) {
            return redirect(route('role.index'))->with('success', $success);
        } else {
            return redirect(route('role.index'))->with('failed', $failed);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        $name = $role->role_name;
        $success = "Data Role $name berhasil dihapus";
        $failed = "Data Role $name gagal dihapus";
        if ($role) {
            return redirect(route('role.index'))->with('success', $success);
        } else {
            return redirect(route('role.index'))->with('failed', $failed);
        }
    }
}
