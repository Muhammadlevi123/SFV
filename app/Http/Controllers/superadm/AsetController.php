<?php

namespace App\Http\Controllers\superadm;

use App\Http\Controllers\Controller;
use App\Models\Aset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;

class AsetController extends Controller
{

    public function index()
    {
        // Mengambil data produksi dengan join ke tabel profile
        $data = DB::table('t_aset')
            ->join('profile', 't_aset.id_unit', '=', 'profile.id') // Menghubungkan produksi dengan profile berdasarkan id_unit
            ->select(
                't_aset.id', 
                't_aset.nama_aset', 
                't_aset.luas_aset', 
                't_aset.penggunaan', 
                't_aset.tahun', 
                'profile.nama_unit' // Mengambil nama unit dari tabel profile
            )
            ->get();

            $profiles = DB::table('profile')
            ->select('id', 'nama_unit') // Ambil id dan nama_unit
            ->get();

        // Mengirimkan data ke view
        return view('superadmin.page.aset.index', compact('data','profiles'));
    }
    public function store(Request $request) {
        // return "asdasd";
        // return $req->all();

        $validatedData = $request->validate([
            'id_unit' => 'required|string|max:255',
            'nama_aset' => 'required|string|max:255',
            'luas_aset' => 'required|numeric',
            'penggunaan_aset' => 'required|numeric',
            'tahun_tambah' => 'required|integer|digits:4|min:1900|max:' . (date('Y') + 1),
        ], 
        [   
            'id_unit.required' => 'Nama Unit wajib dipilih atau ditambahkan.',
            'nama_aset.required' => 'Nama aset wajib diisi.',
            'nama_aset.string' => 'Nama aset harus berupa string.',
            'nama_aset.max' => 'Nama aset tidak boleh lebih dari 255 karakter.',
            'luas_aset.required' => 'Luas aset wajib diisi.',
            'luas_aset.numeric' => 'Luas aset harus berupa angka.',
            'penggunaan_aset.required' => 'Penggunaan aset wajib diisi.',
            'penggunaan_aset.numeric' => 'Penggunaan aset harus berupa angka.',
            'tahun_tambah.required' => 'Tahun aset wajib diisi.',
            'tahun_tambah.integer' => 'Tahun aset harus berupa angka bulat.',
            'tahun_tambah.digits' => 'Tahun aset harus terdiri dari 4 digit.',
            'tahun_tambah.min' => 'Tahun aset tidak boleh kurang dari tahun 1900.',
            'tahun_tambah.max' => 'Tahun aset tidak boleh lebih dari tahun ' . (date('Y') + 1) . '.',

        ]);

         // Cek apakah 'id_unit' merupakan ID atau unit baru
         $idUnit = $request->input('id_unit');
    
         // Jika tidak berupa angka, anggap sebagai unit baru
         if (!is_numeric($idUnit)) {
             // Buat unit baru di tabel profile
             $newProfile = DB::table('profile')->insertGetId([
                 'nama_unit' => $idUnit,
             ]);
             $idUnit = $newProfile;
         }

        $aset = new Aset;

        $aset->id_unit = $idUnit;
        $aset->nama_aset = $request->input('nama_aset');
        $aset->luas_aset = $request->input('luas_aset');
        $aset->penggunaan = $request->input('penggunaan_aset');
        $aset->tahun = $request->input('tahun_tambah');

        $aset->save();
        // $save = Produksi::create($request->all());
        return redirect()->route('superadmin.aset.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, $id) {
        $aset = Aset::findOrFail($id);

        $validatedData = $request->validate([
            'id_unit' => 'required|exists:profile,id',
            'nama_aset' => 'required|string|max:255',
            'luas_aset' => 'required|numeric',
            'penggunaan_aset' => 'required|numeric',
            'tahun_edit' => 'required|integer|digits:4|min:1900|max:' . (date('Y') + 1),
        ], 
        [
            'id_unit.required' => 'Nama Unit wajib dipilih.',
            'id_unit.exists' => 'Nama Unit yang dipilih tidak valid.',
            'nama_aset.required' => 'Nama aset wajib diisi.',
            'nama_aset.string' => 'Nama aset harus berupa string.',
            'nama_aset.max' => 'Nama aset tidak boleh lebih dari 255 karakter.',
            'luas_aset.required' => 'Luas aset wajib diisi.',
            'luas_aset.numeric' => 'Luas aset harus berupa angka.',
            'penggunaan_aset.required' => 'Penggunaan aset wajib diisi.',
            'penggunaan_aset.numeric' => 'Penggunaan aset harus berupa angka.',
            'tahun_edit.required' => 'Tahun aset wajib diisi.',
            'tahun_edit.integer' => 'Tahun aset harus berupa angka bulat.',
            'tahun_edit.digits' => 'Tahun aset harus terdiri dari 4 digit.',
            'tahun_edit.min' => 'Tahun aset tidak boleh kurang dari tahun 1900.',
            'tahun_edit.max' => 'Tahun aset tidak boleh lebih dari tahun ' . (date('Y') + 1) . '.',

        ]);

        $aset->id_unit = $validatedData['id_unit'];
        $aset->nama_aset = $request->input('nama_aset');
        $aset->luas_aset = $request->input('luas_aset');
        $aset->penggunaan = $request->input('penggunaan_aset');
        $aset->tahun = $request->input('tahun_edit');

        $aset->save();
        // $produksi->update($request->all());

        return redirect()->route('superadmin.aset.index')->with('success', 'Data berhasil diubah');
    }

    public function delete($id) {
        $aset = Aset::findOrFail($id);
        $aset->delete();
        return redirect()->route('superadmin.aset.index')->with('success', 'Data berhasil di hapus');
    }
}

