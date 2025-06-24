<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// use Illuminate\Http\Response;

class StatistikController extends Controller {

    // INDEX
    // pnbp x anggaran
    public function pnbpxanggaran(Request $request)
    {   
        $th = $request->th;
        $unit = $request->unit;
        if (empty($th) and empty($unit)) {
            $datas = DB::select('SELECT tahun, SUM(pnbp) as jml_pnbp, SUM(anggaran) as jml_anggaran  FROM `t_pnbp` GROUP BY tahun;');
        } elseif (empty($th) and isset($unit)) {
            $datas = DB::select('SELECT tahun, SUM(pnbp) as jml_pnbp, SUM(anggaran) as jml_anggaran  FROM `t_pnbp` WHERE id_unit = ? GROUP BY tahun;', [$unit]);
        } elseif (isset($th) and empty($unit)) {
            $datas = DB::select('SELECT tahun, SUM(pnbp) as jml_pnbp, SUM(anggaran) as jml_anggaran  FROM `t_pnbp` WHERE tahun = ? GROUP BY tahun;', [$th]);
        } elseif (isset($th) and isset($unit)) {
            $datas = DB::select('SELECT tahun, SUM(pnbp) as jml_pnbp, SUM(anggaran) as jml_anggaran  FROM `t_pnbp` WHERE tahun = ? and id_unit = ? GROUP BY tahun;', [$th, $unit]);
        }
        $thnpr = DB::select('SELECT tahun FROM t_produksi GROUP BY tahun');
        $ok = array('status' => true, 'datas' => $datas);
        return response()->json($ok);
    }

    // pnbp x anggaran
    public function anggaranxrealisasi(Request $request)
    {
        $th = $request->th;
        $unit = $request->unit;
        if (empty($th) and empty($unit)) {
            $datas = DB::select('SELECT tahun, SUM(anggaran) as jml_anggaran , SUM(realisasi) as jml_realisasi, SUM(anggaran-realisasi) as jml_sisa FROM `t_pnbp` WHERE tahun = 2023 GROUP BY tahun;');
        } elseif (empty($th) and isset($unit)) {
            $datas = DB::select('SELECT tahun, SUM(anggaran) as jml_anggaran , SUM(realisasi) as jml_realisasi, SUM(anggaran-realisasi) as jml_sisa FROM `t_pnbp` WHERE id_unit = ? AND tahun = 2023 GROUP BY tahun;', [$unit]);
        } elseif (isset($th) and empty($unit)) {
            $datas = DB::select('SELECT tahun, SUM(anggaran) as jml_anggaran , SUM(realisasi) as jml_realisasi, SUM(anggaran-realisasi) as jml_sisa FROM `t_pnbp` WHERE tahun = ? GROUP BY tahun;', [$th]);
        } elseif (isset($th) and isset($unit)) {
            $datas = DB::select('SELECT tahun, SUM(anggaran) as jml_anggaran , SUM(realisasi) as jml_realisasi, SUM(anggaran-realisasi) as jml_sisa FROM `t_pnbp` WHERE tahun = ? AND id_unit = ?  GROUP BY tahun;', [$th, $unit]);
        }
        $ok = array('status' => true, 'datas' => $datas);
        return response()->json($ok);
    }

    // produk x capaian
    public function produkxcapaian(Request $request)
    {
        $th = $request->th;
        $unit = $request->unit;
        if (empty($th) and empty($unit)) {
            $datas = DB::select('SELECT produk, SUM(capaian_produksi) as jml_produksi FROM `t_produksi` GROUP BY produk;');
        } elseif (empty($th) and isset($unit)) {
            $datas = DB::select('SELECT produk, SUM(capaian_produksi) as jml_produksi FROM `t_produksi` WHERE id_unit = ? GROUP BY produk;', [$unit]);
        } elseif (isset($th) and empty($unit)) {
            $datas = DB::select('SELECT produk, SUM(capaian_produksi) as jml_produksi FROM `t_produksi` WHERE tahun = ? GROUP BY produk;', [$th]);
        } elseif (isset($th) and isset($unit)) {
            $datas = DB::select('SELECT produk, SUM(capaian_produksi) as jml_produksi FROM `t_produksi` WHERE tahun = ? AND id_unit = ? GROUP BY produk;', [$th, $unit]);
        }
        $ok = array('status' => true, 'datas' => $datas);
        return response()->json($ok);
    }

    // aset x penggunaan
    public function asetxpenggunaan(Request $request)
    {
        $th = $request->th;
        $unit = $request->unit;
        if (empty($th) and empty($unit)) {
            $datas = DB::select('SELECT tahun, SUM(luas_aset) as luas_aset, SUM(penggunaan) as penggunaan, SUM(luas_aset-penggunaan) as luas_sisa FROM `t_aset` GROUP BY tahun;');
        } elseif (empty($th) and isset($unit)) {
            $datas = DB::select('SELECT tahun, SUM(luas_aset) as luas_aset, SUM(penggunaan) as penggunaan, SUM(luas_aset-penggunaan) as luas_sisa FROM `t_aset` WHERE id_unit = ? GROUP BY tahun;', [$unit]);
        } elseif (isset($th) and empty($unit)) {
            $datas = DB::select('SELECT tahun, SUM(luas_aset) as luas_aset, SUM(penggunaan) as penggunaan, SUM(luas_aset-penggunaan) as luas_sisa FROM `t_aset` WHERE tahun = ? GROUP BY tahun;', [$th]);
        } elseif (isset($th) and isset($unit)) {
            $datas = DB::select('SELECT tahun, SUM(luas_aset) as luas_aset, SUM(penggunaan) as penggunaan, SUM(luas_aset-penggunaan) as luas_sisa FROM `t_aset` WHERE tahun = ? AND id_unit = ? GROUP BY tahun;', [$th, $unit]);
        }
        $ok = array('status' => true, 'datas' => $datas);
        return response()->json($ok);
    }

    // aset x penggunaan x kategori
    public function asetxpenggunaanxkat(Request $request)
    {
        $th = $request->th;
        $unit = $request->unit;
        if (empty($th) and empty($unit)) {
            $datas = DB::select('SELECT tahun, nama_aset, SUM(luas_aset) as luas_aset, SUM(penggunaan) as penggunaan, SUM(luas_aset-penggunaan) as luas_sisa FROM `t_aset` GROUP BY tahun, nama_aset;');
        } elseif (empty($th) and isset($unit)) {
            $datas = DB::select('SELECT tahun, nama_aset, SUM(luas_aset) as luas_aset, SUM(penggunaan) as penggunaan, SUM(luas_aset-penggunaan) as luas_sisa FROM `t_aset` WHERE id_unit = ? GROUP BY tahun,nama_aset;', [$unit]);
        } elseif (isset($th) and empty($unit)) {
            $datas = DB::select('SELECT tahun, nama_aset, SUM(luas_aset) as luas_aset, SUM(penggunaan) as penggunaan, SUM(luas_aset-penggunaan) as luas_sisa FROM `t_aset` WHERE tahun = ? GROUP BY tahun,nama_aset;', [$th]);
        } elseif (isset($th) and isset($unit)) {
            $datas = DB::select('SELECT tahun, nama_aset, SUM(luas_aset) as luas_aset, SUM(penggunaan) as penggunaan, SUM(luas_aset-penggunaan) as luas_sisa FROM `t_aset` WHERE tahun = ? AND id_unit = ? GROUP BY tahun,nama_aset;', [$th, $unit]);
        }
        $ok = array('status' => true, 'datas' => $datas);
        return response()->json($ok);
    }

    // PRODUKSI
    // pagu x biaya produksi 
    public function paguxproduksi(Request $request)
    {
        $th = $request->th;
        $unit = $request->unit;
        if (empty($th) and empty($unit)) {
            $datas = DB::select('SELECT tahun, SUM(pagu) as jml_pagu, SUM(biaya_produksi) as jml_produksi FROM t_produksi GROUP BY tahun;');
        } elseif (empty($th) and isset($unit)) {
            $datas = DB::select('SELECT tahun, SUM(pagu) as jml_pagu, SUM(biaya_produksi) as jml_produksi FROM t_produksi WHERE id_unit = ? GROUP BY tahun;', [$unit]);
        } elseif (isset($th) and empty($unit)) {
            $datas = DB::select('SELECT tahun, SUM(pagu) as jml_pagu, SUM(biaya_produksi) as jml_produksi FROM t_produksi WHERE tahun = ? GROUP BY tahun;', [$th]);
        } elseif (isset($th) and isset($unit)) {
            $datas = DB::select('SELECT tahun, SUM(pagu) as jml_pagu, SUM(biaya_produksi) as jml_produksi FROM t_produksi WHERE tahun = ? AND id_unit = ? GROUP BY tahun;', [$th, $unit]);
        }
        $ok = array('status' => true, 'datas' => $datas);
        return response()->json($ok);
    }

    // target x capaian produksi 
    public function targetxcapaian(Request $request)
    {
        $th = $request->th;
        $unit = $request->unit;
        if (empty($th) and empty($unit)) {
            $datas = DB::select('SELECT tahun, SUM(target_produksi) as jml_target_produksi, SUM(capaian_produksi) as jml_capaian_produksi FROM t_produksi GROUP BY tahun;');
        } elseif (empty($th) and isset($unit)) {
            $datas = DB::select('SELECT tahun, SUM(target_produksi) as jml_target_produksi, SUM(capaian_produksi) as jml_capaian_produksi FROM t_produksi WHERE id_unit = ? GROUP BY tahun;', [$unit]);
        } elseif (isset($th) and empty($unit)) {
            $datas = DB::select('SELECT tahun, SUM(target_produksi) as jml_target_produksi, SUM(capaian_produksi) as jml_capaian_produksi FROM t_produksi WHERE tahun = ? GROUP BY tahun;', [$th]);
        } elseif (isset($th) and isset($unit)) {
            $datas = DB::select('SELECT tahun, SUM(target_produksi) as jml_target_produksi, SUM(capaian_produksi) as jml_capaian_produksi FROM t_produksi WHERE tahun = ? AND id_unit = ? GROUP BY tahun;', [$th, $unit]);
        }
        $ok = array('status' => true, 'datas' => $datas);
        return response()->json($ok);
    }

    // kunjungan
    // kategori x jumlah 
    public function kategorixjumlah(Request $request)
    {
        $th = $request->th;
        $unit = $request->unit;
        if (empty($th) and empty($unit)) {
            $datas = DB::select('SELECT kategori,SUM(jumlah) as jml FROM `t_kunjungan` GROUP BY kategori;');
        } elseif (empty($th) and isset($unit)) {
            $datas = DB::select('SELECT kategori,SUM(jumlah) as jml FROM `t_kunjungan` WHERE id_unit = ? GROUP BY kategori;', [$unit]);
        } elseif (isset($th) and empty($unit)) {
            $datas = DB::select('SELECT kategori,SUM(jumlah) as jml FROM `t_kunjungan` WHERE tahun = ? GROUP BY kategori;', [$th]);
        } elseif (isset($th) and isset($unit)) {
            $datas = DB::select('SELECT kategori,SUM(jumlah) as jml FROM `t_kunjungan` WHERE tahun = ? AND id_unit = ? GROUP BY kategori;', [$th, $unit]);
        }
        $ok = array('status' => true, 'datas' => $datas);
        return response()->json($ok);
    }

    // table pnbp
    public function tablepnbp(Request $request) {
        $th = $request->th;
        if (empty($th) || $th === 'all') {
            $datas = DB::select('SELECT b.nama_unit, a.tahun, SUM(a.pnbp) as pnbp, SUM(a.realisasi) as realisasi, SUM(a.anggaran) as anggaran FROM t_pnbp as a JOIN `profile` as b ON b.id = a.id_unit WHERE tahun = 2023 GROUP BY b.nama_unit, id_unit,tahun;');
            $is_all_years = true;
        } else {
            $datas = DB::select('SELECT b.nama_unit, a.tahun, SUM(a.pnbp) as pnbp, SUM(a.realisasi) as
            realisasi, SUM(a.anggaran) as anggaran FROM t_pnbp as a JOIN `profile` as b ON b.id = a.id_unit WHERE tahun = ? GROUP BY b.nama_unit, id_unit,tahun;', [$th]);
            $is_all_years = false;
        }
        
        $ok = array('status' => true, 'datas' => $datas);
        return response()->json($ok);  
    }

    // table aset
    public function tableaset(Request $request) {
        $th = $request->th;
        if (empty($th)) {
            $datas = DB::select('SELECT b.nama_unit,a.tahun, SUM(luas_aset) as luas, SUM(penggunaan) as penggunaan, SUM(luas_aset-penggunaan) as sisa FROM t_aset as a JOIN `profile` as b ON b.id = a.id_unit WHERE tahun = 2023 GROUP BY b.nama_unit, a.tahun;');
        } else {
            $datas = DB::select('SELECT b.nama_unit,a.tahun, SUM(luas_aset) as luas, SUM(penggunaan) as penggunaan, SUM(luas_aset-penggunaan) as sisa FROM t_aset as a JOIN `profile` as b ON b.id = a.id_unit WHERE tahun = ? GROUP BY b.nama_unit, a.tahun;', [$th]);
        }
        $ok = array('status' => true, 'datas' => $datas);
        return response()->json($ok);
    }





}
