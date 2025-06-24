<?php

namespace App\Http\Controllers\superadm;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller {
    public function index()
    {
        // Mengambil data produksi dengan join ke tabel profile
        $data = DB::table('profile')
            ->select(
                'profile.id', 
                'profile.nama_unit', 
                'profile.alamat', 
                'profile.email', 
                'profile.pj', 
                'profile.kerjasama', 
            )
            ->get();

        // Mengirimkan data ke view
        return view('superadmin.index', compact('data'));
    }
}

