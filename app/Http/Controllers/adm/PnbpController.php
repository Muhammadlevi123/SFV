<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use App\Models\Pnbp;
use Illuminate\Http\Request;
use App\Models\Profile;

class PnbpController extends Controller
{
    public function index()
    {
        $session_id_unit = Session('id_unit');
        $profile = Profile::where('id', $session_id_unit)->first();
        // $sesid = $this->session_id_unit;
        $data = Pnbp::where('id_unit', $session_id_unit)->get();
        // return $data;
        return view('admin.page.pnbp.index', compact('data', 'profile'));
    }
    public function store(Request $request) {

        $validatedData = $request->validate([
            'anggaran_pnbp' => 'required|numeric',
            'realisasi_pnbp' => 'required|numeric',
            'pnbp' => 'required|numeric',
            'bulan_pnbp' => 'required|integer|min:1|max:12',
            'tahun_tambah' => 'required|integer|digits:4|min:1900|max:' . (date('Y') + 1),
        ], 
        [
            'anggaran_pnbp.required' => 'Anggaran wajib diisi.',
            'realisasi_pnbp.required' => 'Realisasi  wajib diisi.',
            'pnbp.required' => 'PNBP wajib diisi.',
            'bulan_pnbp.required' => 'Bulan wajib diisi.',
            'tahun_tambah.required' => 'Tahun wajib diisi.',
            'anggaran_pnbp.numeric' => 'Anggaran harus berupa angka.',
            'realisasi_pnbp.numeric' => 'Realisasi harus berupa angka.',
            'bulan_pnbp.integer' => 'Bulan harus berupa angka.',
            'tahun_tambah.integer' => 'Realisasi harus berupa angka.',
            'bulan_pnbp.min' => 'Bulan harus berupa angka 1 - 12.',
            'bulan_pnbp.max' => 'Bulan harus berupa angka 1 - 12.',
            'tahun_tambah.max' => 'Tahun tidak boleh lebih dari tahun ' . (date('Y') + 1) . '.',  
        ]);

        $pnbp = new Pnbp;

        $pnbp->anggaran = $request->input('anggaran_pnbp');
        $pnbp->realisasi = $request->input('realisasi_pnbp');
        $pnbp->pnbp = $request->input('pnbp');
        $pnbp->bulan = $request->input('bulan_pnbp');
        $pnbp->tahun = $request->input('tahun_tambah');

        $session_id_unit = Session('id_unit');
        $pnbp->id_unit = $session_id_unit;

        $pnbp->save();
        // $save = Produksi::create($request->all());
        return redirect()->route('opt.pnbp.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, $id) {
        $pnbp = Pnbp::findOrFail($id);

        $validatedData = $request->validate([
            'anggaran_pnbp' => 'required|numeric',
            'realisasi_pnbp' => 'required|numeric',
            'pnbp' => 'required|numeric',
            'bulan_pnbp' => 'required|integer|min:1|max:12',
            'tahun_edit' => 'required|integer|digits:4|min:1900|max:' . (date('Y') + 1),
        ], 
        [
            'anggaran_pnbp.required' => 'Anggaran wajib diisi.',
            'realisasi_pnbp.required' => 'Realisasi wajib diisi.',
            'pnbp.required' => 'PNBP wajib diisi.',
            'bulan_pnbp.required' => 'Bulan wajib diisi.',
            'tahun_edit.required' => 'Tahun wajib diisi.',
            'anggaran_pnbp.numeric' => 'Anggaran harus berupa angka.',
            'realisasi_pnbp.numeric' => 'Realisasi harus berupa angka.',
            'bulan_pnbp.integer' => 'Bulan harus berupa angka.',
            'tahun_edit.integer' => 'Realisasi harus berupa angka.',
            'bulan_pnbp.min:1,max:12' => 'bulan harus berupa angka 1 - 12.',
            'tahun_edit.max' => 'Tahun tidak boleh lebih dari tahun ' . (date('Y') + 1) . '.',
        ]);

        $pnbp->anggaran = $request->input('anggaran_pnbp');
        $pnbp->realisasi = $request->input('realisasi_pnbp');
        $pnbp->pnbp = $request->input('pnbp');
        $pnbp->bulan = $request->input('bulan_pnbp');
        $pnbp->tahun = $request->input('tahun_edit');

        $pnbp->save();

        return redirect()->route('opt.pnbp.index')->with('success', 'Data berhasil diubah');
    }

    public function delete($id) {
        $pnbp = Pnbp::findOrFail($id);
        $pnbp->delete();
        return redirect()->route('opt.pnbp.index')->with('success', 'Data berhasil di hapus');
    }
}
