<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use App\Models\Produksi;
use Illuminate\Http\Request;
use App\Models\Profile;

class ProduksiController extends Controller {
    public function index() {
        $session_id_unit = Session('id_unit');
        $profile = Profile::where('id', $session_id_unit)->first();
        // $sesid = $this->session_id_unit;
        $data = Produksi::where('id_unit', $session_id_unit)->get();
        // return $tahun;
        return view('admin.page.produksi.index', compact('data', 'profile'));
    }

    // public function create() {
    //     return view('admin.page.produksi.index');
    // }

    public function store(Request $request) {
        // return "asdasd";
        // return $req->all();

        $validatedData = $request->validate([
            'produk_produksi' => 'required|string|max:255',
            'target_produksi' => 'required|numeric',
            'capaian_produksi' => 'required|numeric',
            'biaya_produksi' => 'required|numeric',
            'pagu_produksi' => 'required|numeric',
            'tahun_tambah' => 'required|integer|digits:4|min:1900|max:' . (date('Y') + 1),
        ], 
        [
            'produk_produksi.required' => 'Produk wajib diisi.',
            'produk_produksi.string' => 'Produk harus berupa teks.',
            'produk_produksi.alpha' => 'Produk hanya boleh berisi huruf.',
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

        $produksi = new Produksi;

        $produksi->produk = $request->input('produk_produksi');
        $produksi->capaian_produksi = $request->input('capaian_produksi');
        $produksi->target_produksi = $request->input('target_produksi');
        $produksi->biaya_produksi = $request->input('biaya_produksi');
        $produksi->pagu = $request->input('pagu_produksi');
        $produksi->tahun = $request->input('tahun_tambah');

        $session_id_unit = Session('id_unit');
        $produksi->id_unit = $session_id_unit;

        $produksi->save();
        // $save = Produksi::create($request->all());
        return redirect()->route('opt.produksi.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, $id) {
        $produksi = Produksi::findOrFail($id);

        $validatedData = $request->validate([
            'produk_produksi' => 'required|string|max:255',
            'target_produksi' => 'required|numeric',
            'capaian_produksi' => 'required|numeric',
            'biaya_produksi' => 'required|numeric',
            'pagu_produksi' => 'required|numeric',
            'tahun_edit' => 'required|integer|digits:4|min:1900|max:' . (date('Y') + 1),
        ], 
        [
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

        $produksi->produk = $request->input('produk_produksi');
        $produksi->capaian_produksi = $request->input('capaian_produksi');
        $produksi->target_produksi = $request->input('target_produksi');
        $produksi->biaya_produksi = $request->input('biaya_produksi');
        $produksi->pagu = $request->input('pagu_produksi');
        $produksi->tahun = $request->input('tahun_edit');

        $produksi->save();
        // $produksi->update($request->all());

        return redirect()->route('opt.produksi.index')->with('success', 'Data berhasil diubah');
    }

    public function delete($id) {
        $produksi = Produksi::findOrFail($id);
        $produksi->delete();
        return redirect()->route('opt.produksi.index')->with('success', 'Data berhasil di hapus');
    }
}
