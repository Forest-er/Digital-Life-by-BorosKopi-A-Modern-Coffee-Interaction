<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


class daftarController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Simpan data pekerja baru
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Password::defaults()],
            // 'confirmed' dihapus jika Admin yang menentukan password tanpa konfirmasi ulang
        ]);

        // 2. Simpan ke Database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // Jika ada kolom role: 'role' => 'worker',
        ]);

        // 3. Redirect kembali ke daftar pekerja dengan pesan sukses
        return redirect()->route('login')
            ->with('success', 'Akun pekerja berhasil didaftarkan!');
    }
}
