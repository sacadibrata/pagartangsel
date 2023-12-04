<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        $roles = Role::all();
        return view('backend.auth.register', ['roles' => $roles, "title" => "REGISTRASI"]);
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role_id' => 'required',
            'foto' => 'required|image|mimes:png,jpeg,jpg', // Foto harus diunggah
        ]);

        $foto = $request->file('foto');
        $fotoUser = date('Y-m-d')."-".$foto->getClientOriginalName();
        $foto->move(public_path().'/user', $fotoUser);
        $validatedData['foto'] = $fotoUser;

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect()->route('login')->with('success', 'Anda Berhasil Registrasi');
    }

    public function showLoginForm()
    {
        return view('backend.auth.login', ["title" => "LOGIN"]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role_id == '1') {
                return redirect()->route('dashboardAdmin')->with('success', 'Anda Berhasil Login'); // Change the redirect path as needed
            } elseif (Auth::user()->role_id == '2') {
                return redirect()->route('dashboardCeger')->with('success', 'Anda Berhasil Login'); // Change the redirect path as needed
            } elseif (Auth::user()->role_id == '3') {
                return redirect()->route('dashboardCimanggis')->with('success', 'Anda Berhasil Login'); // Change the redirect path as needed
            } elseif (Auth::user()->role_id == '4') {
                return redirect()->route('dashboardCiputat')->with('success', 'Anda Berhasil Login'); // Change the redirect path as needed
            } elseif (Auth::user()->role_id == '5') {
                return redirect()->route('dashboardJengkol')->with('success', 'Anda Berhasil Login'); // Change the redirect path as needed
            } elseif (Auth::user()->role_id == '6') {
                return redirect()->route('dashboardJombang')->with('success', 'Anda Berhasil Login'); // Change the redirect path as needed
            } elseif (Auth::user()->role_id == '7') {
                return redirect()->route('dashboardSerpong')->with('success', 'Anda Berhasil Login'); // Change the redirect path as needed
            } elseif (Auth::user()->role_id == '8') {
                return redirect('backend/kapas/dashboard')->with('success', 'Anda Berhasil Login'); // Change the redirect path as needed
            } elseif (Auth::user()->role_id == '9') {
                return redirect('backend/pengelola/dashboard')->with('success', 'Anda Berhasil Login'); // Change the redirect path as needed
            }
        } else {
            return redirect('login')->with('failed', 'Email atau Password Anda Salah');;
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Anda Berhasil Logout');
    }
}
