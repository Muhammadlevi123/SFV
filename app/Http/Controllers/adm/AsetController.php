<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use App\Models\Aset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use App\Models\Profile;

class AsetController extends Controller
{

    public function index()
    {
        $session_id_unit = Session('id_unit');
        $profile = Profile::where('id', $session_id_unit)->first();
        // $sesid = $this->session_id_unit;
        $data = Aset::where('id_unit', $session_id_unit)->get();
        // return $data;
        return view('admin.page.aset.index', compact('data','profile'));
    }
    public function store(Request $request) {
        // return "asdasd";
        // return $req->all();

        $validatedData = $request->validate([
            'nama_aset' => 'required|string|max:255',
            'luas_aset' => 'required|numeric',
            'penggunaan_aset' => 'required|numeric',
            'tahun_tambah' => 'required|integer|digits:4|min:1900|max:' . (date('Y') + 1),
        ], 
        [
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

        $aset = new Aset;

        $aset->nama_aset = $request->input('nama_aset');
        $aset->luas_aset = $request->input('luas_aset');
        $aset->penggunaan = $request->input('penggunaan_aset');
        $aset->tahun = $request->input('tahun_tambah');

        $session_id_unit = Session('id_unit');
        $aset->id_unit = $session_id_unit;

        $aset->save();
        // $save = Produksi::create($request->all());
        return redirect()->route('opt.aset.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, $id) {
        $aset = Aset::findOrFail($id);

        $validatedData = $request->validate([
            'nama_aset' => 'required|string|max:255',
            'luas_aset' => 'required|numeric',
            'penggunaan_aset' => 'required|numeric',
            'tahun_edit' => 'required|integer|digits:4|min:1900|max:' . (date('Y') + 1),
        ], 
        [
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

        $aset->nama_aset = $request->input('nama_aset');
        $aset->luas_aset = $request->input('luas_aset');
        $aset->penggunaan = $request->input('penggunaan_aset');
        $aset->tahun = $request->input('tahun_edit');

        $aset->save();
        // $produksi->update($request->all());

        return redirect()->route('opt.aset.index')->with('success', 'Data berhasil diubah');
    }

    public function delete($id) {
        $aset = Aset::findOrFail($id);
        $aset->delete();
        return redirect()->route('opt.aset.index')->with('success', 'Data berhasil di hapus');
    }
}

