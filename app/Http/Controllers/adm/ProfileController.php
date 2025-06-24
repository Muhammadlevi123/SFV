<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller {
    public function index() {
        // Ambil id_unit dari session
        $session_id_unit = Session('id_unit');

        $profile = Profile::where('id', $session_id_unit)->first();
        // dd($profile);
        
        // Jalankan query untuk mendapatkan data berdasarkan session_id_unit
        $kunjungan = DB::select('SELECT SUM(jumlah) as jml FROM `t_kunjungan` WHERE tahun AND id_unit = ?', [$session_id_unit]);
        $pnbpunit = DB::select('SELECT SUM(pnbp) as jml FROM `t_pnbp` WHERE tahun AND id_unit = ?', [$session_id_unit]);
        $produksi = DB::select('SELECT SUM(capaian_produksi) as jml FROM `t_produksi` WHERE tahun AND id_unit = ?', [$session_id_unit]);
        $tahun_pnbp = DB::select('SELECT tahun FROM t_pnbp GROUP BY tahun');
        $tahun_produksi = DB::select('SELECT tahun FROM t_produksi GROUP BY tahun');

        // dd($kunjungan, $pnbpunit, $produksi); // Uncomment untuk debug

        return view('admin.page.index', [
            'kunjungan' => $kunjungan,
            'pnbpunit' => $pnbpunit,
            'produksi' => $produksi,
            'profile' => $profile,
            'tahun_produksi' => $tahun_produksi,
            'tahun_pnbp' => $tahun_pnbp
            
        ]);
    }
    public function pnbpxanggaran(Request $request) {
        $session_id_unit = Session('id_unit');
        $tahun = $request->query('year', 2023);
    
        $anggaran = DB::select('SELECT anggaran FROM t_pnbp WHERE tahun = ? AND id_unit = ? ORDER BY bulan ASC', [$tahun, $session_id_unit]);
        $pnbp = DB::select('SELECT pnbp FROM t_pnbp WHERE tahun = ? AND id_unit = ? ORDER BY bulan ASC', [$tahun, $session_id_unit]);
    
        $bulan = DB::table('t_pnbp')
                    ->where('tahun', $tahun)
                    ->where('id_unit', $session_id_unit)
                    ->orderBy('bulan', 'ASC')
                    ->pluck('bulan');

    
        return response()->json([
            'bulan' => $bulan,
            'anggaran' => $anggaran,
            'pnbp' => $pnbp,
        ]);
    }
    public function produkxcapaian(Request $request) {
        $session_id_unit = Session('id_unit');
        $tahun = $request->query('year', 2023);
    
        // Mendapatkan data produk dan capaian
        $produk = DB::select('SELECT target_produksi FROM t_produksi WHERE tahun = ? AND id_unit = ?', [$tahun, $session_id_unit]);
        $capaian = DB::select('SELECT capaian_produksi FROM t_produksi WHERE tahun = ? AND id_unit = ?', [$tahun, $session_id_unit]);
    
        // Menghitung total produk dan capaian
        $totalProduk = array_sum(array_column($produk, 'target_produksi'));
        $totalCapaian = array_sum(array_column($capaian, 'capaian_produksi'));
        $selisihProduk = $totalProduk - $totalCapaian;

        // dd($totalProduk, $totalCapaian, $selisihProduk);
    
        return response()->json([
            'totalProduk' => $totalProduk,
            'totalCapaian' => $totalCapaian,
            'selisihProduk' => $selisihProduk
        ]);
    }
    public function paguxproduksi(Request $request) {
        $session_id_unit = Session('id_unit');
        $tahun = $request->query('year', 2023);
    
        // Mendapatkan data produk dan capaian
        $pagu = DB::select('SELECT pagu FROM t_produksi WHERE tahun = ? AND id_unit = ?', [$tahun, $session_id_unit]);
        $produksi = DB::select('SELECT biaya_produksi FROM t_produksi WHERE tahun = ? AND id_unit = ?', [$tahun, $session_id_unit]);
        
    
        // Menghitung total produk dan capaian
        $totalpagu = array_sum(array_column($pagu, 'pagu'));
        $totalproduksi = array_sum(array_column($produksi, 'biaya_produksi'));
        $selisihBiaya = $totalpagu - $totalproduksi;
    
        return response()->json([
            'totalpagu' => $totalpagu,
            'totalproduksi' => $totalproduksi,
            'selisihBiaya' => $selisihBiaya
        ]);
    }
    public function anggaranxrealisasi(Request $request) {
        $session_id_unit = Session('id_unit');
        $tahun = $request->query('year', 2023);
    
        // Mendapatkan data produk dan capaian
        $anggaran = DB::select('SELECT anggaran FROM t_pnbp WHERE tahun = ? AND id_unit = ?', [$tahun, $session_id_unit]);
        $realisasi = DB::select('SELECT realisasi FROM t_pnbp WHERE tahun = ? AND id_unit = ?', [$tahun, $session_id_unit]);
    
        // Menghitung total produk dan capaian
        $totalanggaran = array_sum(array_column($anggaran, 'anggaran'));
        $totalrealisasi = array_sum(array_column($realisasi, 'realisasi'));
        $selisihRealisasi = $totalanggaran - $totalrealisasi;

        // dd($totalProduk, $totalCapaian, $selisihProduk);
    
        return response()->json([
            'totalanggaran' => $totalanggaran,
            'totalrealisasi' => $totalrealisasi,
            'selisihRealisasi' => $selisihRealisasi
        ]);
    }
    // table pnbp
    public function tablepnbp(Request $request) {

    $session_id_unit = Session('id_unit');
    $th = $request->th;

    if (empty($th) || $th === 'all') {
        // Query untuk menangani semua tahun, tambahkan kolom tahun
        $datas = DB::select(
            'SELECT a.tahun, a.bulan, SUM(a.pnbp) as pnbp, SUM(a.realisasi) as realisasi, SUM(a.anggaran) as anggaran
             FROM t_pnbp as a
             WHERE a.id_unit = ?
             GROUP BY a.tahun, a.bulan
             ORDER BY a.tahun ASC, a.bulan ASC',
            [$session_id_unit]
        );

        // Tandai apakah data untuk semua tahun
        $is_all_years = true;
    } else {
        // Query untuk tahun tertentu, tanpa kolom tahun
        $datas = DB::select(
            'SELECT a.bulan, SUM(a.pnbp) as pnbp, SUM(a.realisasi) as realisasi, SUM(a.anggaran) as anggaran
             FROM t_pnbp as a
             WHERE a.id_unit = ? AND a.tahun = ?
             GROUP BY a.bulan
             ORDER BY a.bulan ASC',
            [$session_id_unit, $th]
        );

        $is_all_years = false;
    }

    // Pemetaan angka bulan ke nama bulan
    $bulan_map = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember',
    ];

    // Mengubah bulan angka menjadi nama bulan
    foreach ($datas as $data) {
        $data->bulan = $bulan_map[$data->bulan] ?? 'Unknown'; // Ganti angka bulan dengan nama bulan
    }

    
    $ok = array('status' => true, 'datas' => $datas);
    return response()->json($ok);
}

}

