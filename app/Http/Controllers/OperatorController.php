<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OperatorController extends Controller
{
    function index()
    { 
        return view('admin.page.index');
    }
    function pnbp()
    {
        return view('admin.page.pnbp.index');
    }
    function produksi()
    {
        return view('admin.page.produksi.index');
    }
    function produktivitas()
    {
        return view('admin.page.produktivitas.index');
    }
    function aset()
    {
        return view('admin.page.aset.index');
    }
}
