<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IndexController extends Controller
{
    public function index()
    {
        $unit = Profile::all();
        return view("landing.index", compact('unit'));
    }
    public function produksi()
    {
        return view("landing.page.produksi.produksi");
    }
    public function produktivitas()
    {
        return view("landing.page.produktivitas.produktivitas");
    }
    public function pnbp()
    {
        return view("landing.page.pnbp.pnbp");
    }
    public function profile_upt()
    {
        $unit = Profile::where('status_sfv', 'UPT')->get();
        return view('landing.page.about.upt', compact('unit'));
    }
    public function profile_desa()
    {
        $unit = Profile::where('status_sfv', 'DESA')->get();
        return view('landing.page.about.desa', compact('unit'));
    }
    public function detail_sfv()
    {
        $unit = Profile::all();
        return view('landing.page.about.profile', compact('unit'));
    }
  //test api elatar
      public function test()
    {
        $response = Http::withToken('65429|OR3OYHJOcnPjDT1Of8lSK0FJwvpUugipmZA5bYFR389cd7a6')
            ->withBody(json_encode(['id' => '2759']), 'application/json')
            ->get("https://bppsdm.kkp.go.id/elatarapi/api/alumni/alumni_id");

        return $response;
    }
}
