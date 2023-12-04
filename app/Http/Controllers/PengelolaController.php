<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengelolaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $users = Auth()->user();
        return view('backend.pengelola.dashboard', compact('users'), ["title" => "DASHBOARD"]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Anda Berhasil Logout');
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
