<?php

namespace App\Http\Controllers\superadm;

use App\Http\Controllers\Controller;
use App\Models\Produksi;
use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;

class ProduksiController extends Controller {
    public function index()
    {
        // Mengambil data produksi dengan join ke tabel profile
        $data = DB::table('t_produksi')
            ->join('profile', 't_produksi.id_unit', '=', 'profile.id') // Menghubungkan produksi dengan profile berdasarkan id_unit
            ->select(
                't_produksi.id', 
                't_produksi.produk', 
                't_produksi.target_produksi', 
                't_produksi.capaian_produksi', 
                't_produksi.tahun', 
                't_produksi.pagu', 
                't_produksi.biaya_produksi', 
                'profile.nama_unit'
            )
            ->get();

            $profiles = DB::table('profile')
            ->select('id', 'nama_unit') // Ambil id dan nama_unit
            ->get();

        // Mengirimkan data ke view
        return view('superadmin.page.produksi.index', compact('data','profiles'));
    }

    // public function create() {
    //     return view('admin.page.produksi.index');
    // }

    public function store(Request $request) {
        // Validasi input
        $validatedData = $request->validate([
            'id_unit' => 'required|string|max:255',
            'produk_produksi' => 'required|string|max:255',
            'target_produksi' => 'required|numeric',
            'capaian_produksi' => 'required|numeric',
            'biaya_produksi' => 'required|numeric',
            'pagu_produksi' => 'required|numeric',
            'tahun_tambah' => 'required|integer|digits:4|min:1900|max:' . (date('Y') + 1),
        ], 
        [
            'id_unit.required' => 'Nama Unit wajib dipilih atau ditambahkan.',
            'produk_produksi.required' => 'Produk wajib diisi.',
            'produk_produksi.string' => 'Produk harus berupa teks.',
            'produk_produksi.max' => 'Produk tidak boleh lebih dari 255 karakter.',
            'target_produksi.required' => 'Target produksi wajib diisi.',
            'target_produksi.numeric' => 'Target produksi harus berupa angka.',
            'capaian_produksi.required' => 'Capaian produksi wajib diisi.',
            'capaian_produksi.numeric' => 'Capaian produksi harus berupa angka.',
            'biaya_produksi.required' => 'Biaya produksi wajib diisi.',
            'biaya_produksi.numeric' => 'Biaya produksi harus berupa angka.',
            'pagu_produksi.required' => 'Pagu produksi wajib diisi.',
            'pagu_produksi.numeric' => 'Pagu produksi harus berupa angka.',
            'tahun_tambah.required' => 'Tahun produksi wajib diisi.',
            'tahun_tambah.integer' => 'Tahun produksi harus berupa angka.',
            'tahun_tambah.digits' => 'Tahun produksi harus terdiri dari 4 digit.',
            'tahun_tambah.min' => 'Tahun produksi tidak boleh kurang dari 1900.',
            'tahun_tambah.max' => 'Tahun produksi tidak boleh lebih dari tahun ' . (date('Y') + 1) . '.',
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
    
        // Buat objek Produksi baru dan isi datanya
        $produksi = new Produksi;
        $produksi->id_unit = $idUnit;
        $produksi->produk = $request->input('produk_produksi');
        $produksi->capaian_produksi = $request->input('capaian_produksi');
        $produksi->target_produksi = $request->input('target_produksi');
        $produksi->biaya_produksi = $request->input('biaya_produksi');
        $produksi->pagu = $request->input('pagu_produksi');
        $produksi->tahun = $request->input('tahun_tambah');
    
        // Simpan data Produksi
        $produksi->save();
    
        // Redirect ke halaman index
        return redirect()->route('superadmin.produksi.index')->with('success', 'Data berhasil ditambahkan.');
    }
    
    
    

    public function update(Request $request, $id) {
        $produksi = Produksi::findOrFail($id);
    
        $validatedData = $request->validate([
            'id_unit' => 'required|exists:profile,id',  // validasi tambahan untuk id_unit
            'produk_produksi' => 'required|string|max:255',
            'target_produksi' => 'required|numeric',
            'capaian_produksi' => 'required|numeric',
            'biaya_produksi' => 'required|numeric',
            'pagu_produksi' => 'required|numeric',
            'tahun_edit' => 'required|integer|digits:4|min:1900|max:' . (date('Y') + 1),
        ], 
        [
            'id_unit.required' => 'Nama Unit wajib dipilih.',
            'id_unit.exists' => 'Nama Unit yang dipilih tidak valid.',
            'produk_produksi.required' => 'Produk produksi wajib diisi.',
            'produk_produksi.string' => 'Produk produksi harus berupa teks.',
            'produk_produksi.max' => 'Produk produksi tidak boleh lebih dari 255 karakter.',
            'target_produksi.required' => 'Target produksi wajib diisi.',
            'target_produksi.numeric' => 'Target produksi harus berupa angka.',
            'capaian_produksi.required' => 'Capaian produksi wajib diisi.',
            'capaian_produksi.numeric' => 'Capaian produksi harus berupa angka.',
            'biaya_produksi.required' => 'Biaya produksi wajib diisi.',
            'biaya_produksi.numeric' => 'Biaya produksi harus berupa angka.',
            'pagu_produksi.required' => 'Pagu produksi wajib diisi.',
            'pagu_produksi.numeric' => 'Pagu produksi harus berupa angka.',
            'tahun_edit.required' => 'Tahun produksi wajib diisi.',
            'tahun_edit.integer' => 'Tahun produksi harus berupa angka.',
            'tahun_edit.digits' => 'Tahun produksi harus terdiri dari 4 digit.',
            'tahun_edit.min' => 'Tahun produksi tidak boleh kurang dari 1900.',
            'tahun_edit.max' => 'Tahun produksi tidak boleh lebih dari tahun ' . (date('Y') + 1) . '.',
        ]);
    
        // Update data produksi
        $produksi->id_unit = $validatedData['id_unit'];
        $produksi->produk = $validatedData['produk_produksi'];
        $produksi->capaian_produksi = $validatedData['capaian_produksi'];
        $produksi->target_produksi = $validatedData['target_produksi'];
        $produksi->biaya_produksi = $validatedData['biaya_produksi'];
        $produksi->pagu = $validatedData['pagu_produksi'];
        $produksi->tahun = $validatedData['tahun_edit'];
    
        $produksi->save();
    
        return redirect()->route('superadmin.produksi.index')->with('success', 'Data berhasil diubah');
    }
    

    public function delete($id) {
        $produksi = Produksi::findOrFail($id);
        $produksi->delete();
        return redirect()->route('superadmin.produksi.index')->with('success', 'Data berhasil di hapus');
    }
}
