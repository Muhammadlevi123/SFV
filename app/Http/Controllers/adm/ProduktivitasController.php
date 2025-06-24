<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use App\Models\Kunjungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Profile;

class ProduktivitasController extends Controller
{
    public function index()
    {
        $session_id_unit = Session('id_unit');
        $profile = Profile::where('id', $session_id_unit)->first();
        // $sesid = $this->session_id_unit;
        $data = Kunjungan::select('kategori', 'jumlah', 'tahun')->where('id_unit', $session_id_unit)->get();
        $thn = Kunjungan::select('tahun')->where('id_unit', $session_id_unit)->GROUPBY('tahun')->get();
        $kategori = DB::select("SELECT kategori FROM `t_kunjungan` WHERE id_unit = ? GROUP BY kategori;", [$session_id_unit]);
        // return $data;
        return view('admin.page.produktivitas.index', compact('data', 'thn', 'kategori', 'profile'));
    }
}
