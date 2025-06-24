<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        // Data Super Admin sebagai array
        $superAdmin = [
            'username' => 'admin',
            'password' => 'admin123',
            'id' => 1 // Misalnya ID Super Admin adalah 1
        ];

        // Validasi input
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // Cek jika input cocok dengan super admin
        if ($credentials['username'] == $superAdmin['username'] && $credentials['password'] == $superAdmin['password']) {
            // Regenerasi session untuk super admin
            $request->session()->regenerate();

            // Set user Super Admin pada Auth
            Auth::loginUsingId($superAdmin['id']);  // Login menggunakan ID Super Admin
            
            // Set session untuk super admin
            Session::put('nama', 'Super Admin');
            Session::put('role', 'super_admin');
            
            // Redirect ke dashboard super admin
            return redirect()->intended('superadmin/home');
        }

        // Cek pengguna di database (jika bukan super admin)
        if (Auth::attempt($credentials)) {
            // Regenerasi session setelah login
            $request->session()->regenerate();

            // Ambil data user dari database
            $user = DB::table('t_user')
                ->join('profile as b', 'b.id', '=', 't_user.id_unit')
                ->select('t_user.*', 'b.nama_unit')
                ->where('t_user.username', $credentials['username'])
                ->first();

            if ($user) {
                // Set session berdasarkan user yang ditemukan
                Session::put('nama', $user->nama_unit);
                Session::put('id_unit', $user->id_unit);

                // Redirect berdasarkan role user
                if ($user->role == 'admin') {
                    return redirect()->intended('admin/dashboard');
                } elseif ($user->role == 'operator') {
                    return redirect()->intended('dashboard');
                }
            } else {
                return back()->withErrors([
                    'username' => 'Cek kembali username & password anda.',
                ])->onlyInput('username');
            }
        }

        // Jika login gagal, kembalikan pesan error
        return back()->withErrors([
            'username' => 'Cek kembali username & password anda.',
        ])->onlyInput('username');
    }

    public function logout()
    {
        // Hapus semua session
        Session::flush();
        
        // Logout dari Auth
        Auth::logout();

        // Redirect ke halaman login
        return redirect()->route('unit.login');
    }
}
