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
        $users = Auth()->user();
        $roles = Role::all();
        return view('backend.admin.role.index', ['roles' => $roles, 'users' => $users, "title" => "HAK AKSES PENGGUNA"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = Auth()->user();
        $roles = Role::all();
        return view('backend.admin.role.create', ['users' => $users, 'roles' => $roles, "title" => "TAMBAH HAK AKSES PENGGUNA"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $role = new role();
        $role->create($request->all());
        return redirect()->route('role.index')->with('success', 'Berhasil Menambahkan Data');
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
        $users = Auth()->user();
        $roles = role::find($id);
        return view('backend.admin.role.edit', ['roles' => $roles, 'users' => $users, "title" => "EDIT HAK AKSES PENGGUNA"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $roles = [
            'nama_role' => $request->nama_role,
        ];
        role::where('id', $id)->update($roles);
        return redirect('admin/role')->with('success', 'Berhasil Mengupdate Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the data barang by ID
        $data = role::findOrFail($id);

        // Perform the deletion
        $data->delete();

        // Redirect back to the list of data barang or any other page as needed
        return redirect('admin/role')->with('success', 'Berhasil Menghapus Data');
    }
}
