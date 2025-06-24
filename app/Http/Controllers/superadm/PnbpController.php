<?php

namespace App\Http\Controllers\superadm;

use App\Http\Controllers\Controller;
use App\Models\Pnbp;
use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;

class PnbpController extends Controller
{
    public function index()
    {
        // Mengambil data pnbp dengan join ke tabel profile
        $data = DB::table('t_pnbp')
            ->join('profile', 't_pnbp.id_unit', '=', 'profile.id') // Menghubungkan pnbp dengan profile berdasarkan id_unit
            ->select(
                't_pnbp.id', 
                't_pnbp.anggaran', 
                't_pnbp.realisasi', 
                't_pnbp.pnbp', 
                't_pnbp.bulan', 
                't_pnbp.tahun', 
                'profile.nama_unit' // Mengambil nama unit dari tabel profile
            )
            ->get();

            $profiles = DB::table('profile')
            ->select('id', 'nama_unit') // Ambil id dan nama_unit
            ->get();

        // Mengirimkan data ke view
        return view('superadmin.page.pnbp.index', compact('data','profiles'));
    }

    public function store(Request $request) {

        $validatedData = $request->validate([
            'id_unit' => 'required|string|max:255',
            'anggaran_pnbp' => 'required|numeric',
            'realisasi_pnbp' => 'required|numeric',
            'pnbp' => 'required|numeric',
            'bulan_pnbp' => 'required|integer|min:1|max:12',
            'tahun_tambah' => 'required|integer|digits:4|min:1900|max:' . (date('Y') + 1),
        ], 
        [   
            'id_unit.required' => 'Nama Unit wajib dipilih atau ditambahkan.',
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

        $pnbp = new Pnbp;
        $pnbp->id_unit = $idUnit;
        $pnbp->anggaran = $request->input('anggaran_pnbp');
        $pnbp->realisasi = $request->input('realisasi_pnbp');
        $pnbp->pnbp = $request->input('pnbp');
        $pnbp->bulan = $request->input('bulan_pnbp');
        $pnbp->tahun = $request->input('tahun_tambah');

        $pnbp->save();
        // $save = Produksi::create($request->all());
        return redirect()->route('superadmin.pnbp.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, $id) {
        $pnbp = Pnbp::findOrFail($id);

        $validatedData = $request->validate([
            'id_unit' => 'required|exists:profile,id',
            'anggaran_pnbp' => 'required|numeric',
            'realisasi_pnbp' => 'required|numeric',
            'pnbp' => 'required|numeric',
            'bulan_pnbp' => 'required|integer|min:1|max:12',
            'tahun_edit' => 'required|integer|digits:4|min:1900|max:' . (date('Y') + 1),
        ], 
        [   
            'id_unit.required' => 'Nama Unit wajib dipilih.',
            'id_unit.exists' => 'Nama Unit yang dipilih tidak valid.',
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

        $pnbp->id_unit = $validatedData['id_unit'];
        $pnbp->anggaran = $request->input('anggaran_pnbp');
        $pnbp->realisasi = $request->input('realisasi_pnbp');
        $pnbp->pnbp = $request->input('pnbp');
        $pnbp->bulan = $request->input('bulan_pnbp');
        $pnbp->tahun = $request->input('tahun_edit');

        $pnbp->save();

        return redirect()->route('superadmin.pnbp.index')->with('success', 'Data berhasil diubah');
    }

    public function delete($id) {
        $pnbp = Pnbp::findOrFail($id);
        $pnbp->delete();
        return redirect()->route('superadmin.pnbp.index')->with('success', 'Data berhasil di hapus');
    }
}
