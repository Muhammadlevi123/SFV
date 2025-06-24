<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pnbp;
use App\Models\Produksi;
use App\Models\Aset;
use PDF; // Pastikan kamu mengimpor library PDF jika menggunakan laravel-dompdf atau laravel-snappy.

class DownloadController extends Controller
{
    public function downloadProduksi()
    {
        $session_id_unit = Session('id_unit');
        // $profile = Profile::where('id', $session_id_unit)->first();
        // $sesid = $this->session_id_unit;
        $data = Produksi::where('id_unit', $session_id_unit)
                    ->orderBy('tahun', 'asc') // Urutkan berdasarkan kolom 'tahun'
                    ->get();
        // $tahun_produksi = DB::select('SELECT tahun FROM t_produksi GROUP BY tahun');
        // // Logika untuk menghasilkan PDF dari data produksi
        // $produksiData = []; // Ambil data dari model atau database
        // $pdf = PDF::loadView('pdf.produksi', compact('produksiData'));
        // return $pdf->download('laporan_produksi.pdf');

        $pdf = PDF::loadView('admin.pdf.produksi', compact('data'));
    
        // Mengunduh file PDF
        return $pdf->download('laporan_produksi.pdf');
        // return view("admin.pdf.produksi", compact('data'));
    }

    public function downloadAset()
    {   
        $session_id_unit = Session('id_unit');
        // $profile = Profile::where('id', $session_id_unit)->first();
        // $sesid = $this->session_id_unit;
        $data = Aset::where('id_unit', $session_id_unit)
                    ->orderBy('tahun', 'asc') // Urutkan berdasarkan kolom 'tahun'
                    ->get();
        // // Logika untuk menghasilkan PDF dari data aset
        // $asetData = []; // Ambil data dari model atau database
        // $pdf = PDF::loadView('pdf.aset', compact('asetData'));
        // return $pdf->download('laporan_aset.pdf');

        $pdf = PDF::loadView('admin.pdf.aset', compact('data'));
    
        // Mengunduh file PDF
        return $pdf->download('laporan_aset.pdf');

        // return view("admin.pdf.aset", compact('data'));
    }

    public function downloadPnbp()
    {   

        $session_id_unit = Session('id_unit');
        // $profile = Profile::where('id', $session_id_unit)->first();
        // $sesid = $this->session_id_unit;
        $data = Pnbp::where('id_unit', $session_id_unit)
                    ->orderBy('tahun', 'asc') // Urutkan berdasarkan kolom 'tahun'
                    ->get();
        // // Logika untuk menghasilkan PDF dari data PNBP
        // $pnbpData = []; // Ambil data dari model atau database
        $pdf = PDF::loadView('admin.pdf.pnbp', compact('data'));
        return $pdf->download('laporan_pnbp.pdf');

        // return view("admin.pdf.pnbp", compact('data'));
    }
}
