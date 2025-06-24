<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class UnitController extends Controller
{

    public function index(Request $request)
    {
        $profile_list = $this->profile_list;
        $id = $request->id;
        if (empty($id)) {
            $profile = array(
                'id' => '',
            );
            $idu = '0';
            $anggaran = DB::select('SELECT SUM(anggaran) as jml FROM `t_pnbp` WHERE tahun ');
            $pnbp = DB::select('SELECT SUM(pnbp) as jml FROM `t_pnbp` WHERE tahun ');
            $visitor = DB::select('SELECT SUM(jumlah) as jml FROM `t_kunjungan` WHERE tahun ');

        } else {
            $profile = Profile::where('id', $id)->first();
            $idu = $profile->id;
            $anggaran = DB::select('SELECT SUM(anggaran) as jml FROM `t_pnbp` WHERE tahun  AND id_unit = ?', [$id]);
            $pnbp = DB::select('SELECT SUM(pnbp) as jml FROM `t_pnbp` WHERE tahun  AND id_unit = ?', [$id]);
            $visitor = DB::select('SELECT SUM(jumlah) as jml FROM `t_kunjungan` WHERE tahun  AND id_unit = ?', [$id]);
        }
        $thnpr = DB::select('SELECT tahun FROM t_produksi GROUP BY tahun');
        $thnp = DB::select('SELECT tahun FROM t_pnbp GROUP BY tahun');
        $thna = DB::select('SELECT tahun FROM t_aset GROUP BY tahun');
        return view("landing.unit.detail", compact('profile_list', 'profile', 'idu', 'anggaran', 'pnbp', 'visitor','thnpr','thna','thnp'));
    }
    public function produksi(Request $request)
    {
        $profile_list = $this->profile_list;
        $id = $request->id;
        if (empty($id)) {
            $profile = array(
                'id' => '',
            );
            $idu = '0';
            $produksi = DB::select('SELECT SUM(target_produksi) as jml FROM `t_produksi` WHERE tahun');
            $capaian = DB::select('SELECT SUM(capaian_produksi) as jml FROM `t_produksi` WHERE tahun');
            $biayaproduksi = DB::select('SELECT SUM(biaya_produksi) as jml FROM `t_produksi` WHERE tahun ');

        } else {
            $profile = Profile::where('id', $id)->first();
            $idu = $profile->id;
            $produksi = DB::select('SELECT SUM(target_produksi) as jml FROM `t_produksi` WHERE tahun  AND id_unit = ?', [$id]);
            $capaian = DB::select('SELECT SUM(capaian_produksi) as jml FROM `t_produksi` WHERE tahun  AND id_unit = ?', [$id]);
            $biayaproduksi = DB::select('SELECT SUM(biaya_produksi) as jml FROM `t_produksi` WHERE tahun  AND id_unit = ?', [$id]);
        }
        $thnpr = DB::select('SELECT tahun FROM t_produksi GROUP BY tahun');
        return view("landing.unit.page.produksi.unit_produksi", compact('profile_list', 'profile', 'idu', 'produksi', 'capaian', 'biayaproduksi','thnpr'));
    }
    public function produktivitas(Request $request)
    {
        $profile_list = $this->profile_list;
        $id = $request->id;
        $kunjungan2023 = DB::select('SELECT SUM(jumlah) as jml FROM `t_kunjungan` WHERE tahun = 2023');
        if (empty($id)) {
            $profile = array(
                'id' => '',
            );
            $idu = '0';
            $kunjunganunit = DB::select('SELECT SUM(jumlah) as jml FROM `t_kunjungan` WHERE tahun = 2023');
        } else {
            $profile = Profile::where('id', $id)->first();
            $idu = $profile->id;
            $kunjunganunit = DB::select('SELECT SUM(jumlah) as jml FROM `t_kunjungan` WHERE tahun = 2023 AND id_unit = ?', [$id]);
        }
        return view("landing.unit.page.produktivitas.unit_produktivitas", compact('profile_list', 'profile', 'idu', 'kunjungan2023', 'kunjunganunit'));
    }
    public function pnbp(Request $request)
    {
        $profile_list = $this->profile_list;
        $id = $request->id;
        $pnbpall = DB::select('SELECT SUM(pnbp) as jml FROM `t_pnbp` WHERE tahun ');
        
        if (empty($id)) {
            $profile = array(
                'id' => '',
            );
            $idu = '0';
            $pnbpunit = DB::select('SELECT SUM(pnbp) as jml FROM `t_pnbp` WHERE tahun');
        } else {
            $profile = Profile::where('id', $id)->first();
            $idu = $profile->id;
            $pnbpunit = DB::select('SELECT SUM(pnbp) as jml FROM `t_pnbp` WHERE tahun AND id_unit = ?', [$id]);
        }
        $thnp = DB::select('SELECT tahun FROM t_pnbp GROUP BY tahun');
        return view("landing.unit.page.pnbp.unit_pnbp", compact('profile_list', 'profile', 'idu', 'pnbpall', 'pnbpunit', 'thnp'));
    }
    public function aset(Request $request)
    {
        $profile_list = $this->profile_list;
        $id = $request->id;
        $kunjungan2023 = DB::select('SELECT SUM(jumlah) as jml FROM `t_kunjungan` WHERE tahun');
        if (empty($id)) {
            $profile = array(
                'id' => '',
            );
            $idu = '0';
        } else {
            $profile = Profile::where('id', $id)->first();
            $idu = $profile->id;
        }
        $thna = DB::select('SELECT tahun FROM t_aset GROUP BY tahun');
        return view("landing.unit.page.aset.unit_aset", compact('profile_list', 'profile', 'idu','thna'));
    }
    public function profile_unit()
    {
        $profile_list = $this->profile_list;
        return view("landing.unit.page.index_unit", compact('profile_list'));
    }
}
