<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;

class UserController extends Controller
{
    public function index() {
        $session_id_unit = session('id_unit');
        $profile = Profile::where('id', $session_id_unit)->first();
        $users = User::where('id_unit', $session_id_unit)->get();
        $profiles = [];
    
        if ($users->isNotEmpty()) {
            foreach ($users as $user) {
                $profile = Profile::where('id', $user->id_unit)->first();
                if ($profile) {
                    // Menyimpan data dalam objek
                    $profiles[] =[
                        'profile' => $profile,
                        'user' => $user
                    ];
                }
            }
        }
        return view('admin.profile.index', compact('profiles', 'profile'));
        // Debugging data
        // return $profiles;
    }

    public function update(Request $request, $id) {
    $user = User::findOrFail($id);
    
    // Cari record profile terkait
    $profile = Profile::where('id', $user->id_unit)->firstOrFail();

    $validatedData = $request->validate([
        // Validasi untuk tabel users
        'username_profile' => 'required|string|max:255',
        'email_profile' => 'required|email',

        // Validasi untuk tabel profiles
        'nama_profile' => 'required|string|max:255',
        'kerjasama_profile' => 'required|string|max:255',
        'SFV_profile' => 'required|string|max:255',
        'penanggungjawab_profile' => 'required|string|max:255',
    ], [
        // Custom error messages (optional)
        'username_profile.required' => 'Username wajib diisi.',
        'username_profile.string' => 'Username harus berupa teks.',
        'username_profile.max' => 'Username tidak boleh lebih dari 255 karakter.',
    
        'email_profile.required' => 'Email wajib diisi.',
        'email_profile.email' => 'Email harus berupa format email yang valid.',
    
        'nama_profile.required' => 'Nama unit wajib diisi.',
        'nama_profile.string' => 'Nama unit harus berupa teks.',
        'nama_profile.max' => 'Nama unit tidak boleh lebih dari 255 karakter.',
    
        'kerjasama_profile.required' => 'Kerja sama wajib diisi.',
        'kerjasama_profile.string' => 'Kerja sama harus berupa teks.',
        'kerjasama_profile.max' => 'Kerja sama tidak boleh lebih dari 255 karakter.',
    
        'SFV_profile.required' => 'Status SFV wajib diisi.',
        'SFV_profile.string' => 'Status SFV harus berupa teks.',
        'SFV_profile.max' => 'Status SFV tidak boleh lebih dari 255 karakter.',
    
        'penanggungjawab_profile.required' => 'Penanggung jawab wajib diisi.',
        'penanggungjawab_profile.string' => 'Penanggung jawab harus berupa teks.',
        'penanggungjawab_profile.max' => 'Penanggung jawab tidak boleh lebih dari 255 karakter.',
    ]);

    // Update data di tabel users
    $user->username = $request->input('username_profile');
    $user->email = $request->input('email_profile');
    $user->save();

    // Update data di tabel profiles
    $profile->nama_unit = $request->input('nama_profile');
    $profile->kerjasama = $request->input('kerjasama_profile');
    $profile->status_SFV = $request->input('SFV_profile');
    $profile->pj = $request->input('penanggungjawab_profile');
    $profile->save();

        return redirect()->route('user.index')->with('success', 'Data berhasil diubah');
    }
}
