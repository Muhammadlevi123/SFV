<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $session_id_unit;
    protected $profile_list;

    public function __construct()
    {
        // menu profile
        $this->profile_list = Profile::all();
        View::share('site_settings', $this->profile_list);
        // session id_unit
        $this->session_id_unit = Session('id_unit');
        View::share('site_settings', $this->session_id_unit);

    }
}
