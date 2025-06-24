<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController as IND;
use App\Http\Controllers\UnitController as UNC;
use App\Http\Controllers\StatistikController as STC;
use App\Http\Controllers\LoginController as LGC;
use App\Http\Controllers\OperatorController as OPT;
// 
use App\Http\Controllers\adm\AsetController as ASTL;
use App\Http\Controllers\adm\PnbpController as PNBL;
use App\Http\Controllers\adm\ProduksiController as PRDL;
use App\Http\Controllers\adm\ProfileController as PRFL;
use App\Http\Controllers\adm\ProduktivitasController as PRVL;
use App\Http\Controllers\adm\UserController as USRL;
use App\Http\Controllers\adm\DownloadController;
//
use App\Http\Controllers\superadm\AsetController as ASTLS;
use App\Http\Controllers\superadm\PnbpController as PNBLS;
use App\Http\Controllers\superadm\ProduksiController as PRDLS;
use App\Http\Controllers\superadm\ProfileController as PRFLS;
use App\Http\Controllers\superadm\ProduktivitasController as PRVLS;

use App\Http\Controllers\LocationController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('landing.index');
// });


Route::controller(LGC::class)->group(
    function () {
        Route::get('unit/login', 'login')->name('unit.login');
        Route::post('unit/auth', 'authenticate')->name('unit.auth');
        Route::post('unit/logout', 'logout')->name('unit.logout');
    }
);
Route::group(['middleware' => ['useroperator']], function () {
// adminsuper
Route::controller(PRFLS::class)->group(
    function () {
        Route::get('superadmin/home', 'index')->name('superadmin.home');
        // Route::get('superadmin/pnbp', 'pnbp')->name('superadmin.pnbp');
        // Route::get('superadmin/produksi', 'produksi')->name('superadmin.produksi');
        // Route::get('superadmin/produktivitas', 'produktivitas')->name('superadmin.produktivitas');
        // Route::get('superadmin/aset', 'aset')->name('superadmin.aset');
        Route::post('superadmin/home/store', 'store')->name('superadmin.home.store');
        Route::put('superadmin/home/update/{id}', 'update')->name('superadmin.home.update');
        Route::delete('superadmin/home/delete/{id}', 'delete')->name('superadmin.home.delete');
        
    }
);
    Route::controller(ASTLS::class)->group(
        function () {
            Route::get('superadmin/aset/index', 'index')->name('superadmin.aset.index');
            Route::post('superadmin/aset/store', 'store')->name('superadmin.aset.store');
            Route::put('superadmin/aset/update/{id}', 'update')->name('superadmin.aset.update');
            Route::delete('superadmin/aset/delete/{id}', 'delete')->name('superadmin.aset.delete');
        }
    );
    Route::controller(PRDLS::class)->group(
        function () { 
            Route::get('superadmin/produksi/index', 'index')->name('superadmin.produksi.index');
            Route::post('superadmin/produksi/store', 'store')->name('superadmin.produksi.store');
            Route::delete('superadmin/produksi/delete/{id}', 'delete')->name('superadmin.produksi.delete');
            Route::put('superadmin/produksi/update/{id}', 'update')->name('superadmin.produksi.update'); 
            // Route::get('produksi/index', [produksiController::class, 'index'])->name('opt.produksi.index');
            // Route::get('produksi/create', [ProduksiController::class, 'create'])->name('opt.produksi.create');
            // Route::post('produksi', [produksiController::class, 'store'])->name('opt.produksi.store');
            // Route::get('produksi/{produksi}/edit', [ProduksiController::class, 'edit'])->name('opt.produksi.edit');
            // Route::put('produksi/{produksi}', [ProduksiController::class, 'update'])->name('opt.produksi.update');
            // Route::delete('produksi/{produksi}', [ProduksiController::class, 'destroy'])->name('opt.produksi.destroy');         
        }
    );
    // produktivitas
    Route::controller(PRVLS::class)->group(
        function () {
            Route::get('superadmin/produktivitas/index', 'index')->name('superadmin.produktivitas.index');
            Route::get('superadmin/produktivitas/store', 'store')->name('superadmin.produktivitas.store');
            Route::get('superadmin/produktivitas/edit', 'edit')->name('superadmin.produktivitas.edit');
            Route::get('superadmin/produktivitas/delete', 'delete')->name('superadmin.produktivitas.delete');
            Route::get('superadmin/produktivitas/view/{id}', 'view')->name('superadmin.produktivitas.view.id');
        }
    );
    // pnbp
    Route::controller(PNBLS::class)->group(
        function () {
            Route::get('superadmin/pnbp/index', 'index')->name('superadmin.pnbp.index');
            Route::post('superadmin/pnbp/store', 'store')->name('superadmin.pnbp.store');
            Route::delete('superadmin/pnbp/delete/{id}', 'delete')->name('superadmin.pnbp.delete');
            Route::put('superadmin/pnbp/update/{id}', 'update')->name('superadmin.pnbp.update');
        }
    );
});

// adm
Route::group(['middleware' => ['useroperator']], function () {
    Route::controller(OPT::class)->group(
        function () {
            // Route::get('operator/home', 'index')->name('opt.home');
            Route::get('operator/pnbp', 'pnbp')->name('opt.pnbp');
            Route::get('operator/produksi', 'produksi')->name('opt.produksi');
            Route::get('operator/produktivitas', 'produktivitas')->name('opt.produktivitas');
            Route::get('operator/aset', 'aset')->name('opt.aset');
        }
    );
    // aset
    Route::controller(ASTL::class)->group(
        function () {
            Route::get('aset/index', 'index')->name('opt.aset.index');
            Route::post('aset/store', 'store')->name('opt.aset.store');
            Route::put('aset/update/{id}', 'update')->name('opt.aset.update');
            Route::delete('aset/delete/{id}', 'delete')->name('opt.aset.delete');
        }
    );
    // produksi
    Route::controller(PRDL::class)->group(
        function () { 
            Route::get('produksi/index', 'index')->name('opt.produksi.index');
            Route::post('produksi/store', 'store')->name('opt.produksi.store');
            Route::delete('produksi/delete/{id}', 'delete')->name('opt.produksi.delete');
            Route::put('produksi/update/{id}', 'update')->name('opt.produksi.update'); 
            // Route::get('produksi/index', [produksiController::class, 'index'])->name('opt.produksi.index');
            // Route::get('produksi/create', [ProduksiController::class, 'create'])->name('opt.produksi.create');
            // Route::post('produksi', [produksiController::class, 'store'])->name('opt.produksi.store');
            // Route::get('produksi/{produksi}/edit', [ProduksiController::class, 'edit'])->name('opt.produksi.edit');
            // Route::put('produksi/{produksi}', [ProduksiController::class, 'update'])->name('opt.produksi.update');
            // Route::delete('produksi/{produksi}', [ProduksiController::class, 'destroy'])->name('opt.produksi.destroy');         
        }
    );
    // produktivitas
    Route::controller(PRVL::class)->group(
        function () {
            Route::get('produktivitas/index', 'index')->name('opt.produktivitas.index');
            Route::get('produktivitas/store', 'store')->name('opt.produktivitas.store');
            Route::get('produktivitas/edit', 'edit')->name('opt.produktivitas.edit');
            Route::get('produktivitas/delete', 'delete')->name('opt.produktivitas.delete');
            Route::get('produktivitas/view/{id}', 'view')->name('opt.produktivitas.view.id');
        }
    );
    // pnbp
    Route::controller(PNBL::class)->group(
        function () {
            Route::get('pnbp/index', 'index')->name('opt.pnbp.index');
            Route::post('pnbp/store', 'store')->name('opt.pnbp.store');
            Route::delete('pnbp/delete/{id}', 'delete')->name('opt.pnbp.delete');
            Route::put('pnbp/update/{id}', 'update')->name('opt.pnbp.update');
        }
    );
    // user
    Route::controller(USRL::class)->group(
        function () {
            Route::get('user/index', 'index')->name('user.index');
            Route::PUT('user/update/{id}', 'update')->name('user.update');
            // Route::get('user/edit', 'edit')->name('user.edit');
            // Route::get('user/delete', 'delete')->name('user.delete');
            // Route::get('user/view/{id}', 'view')->name('user.view.id');
        }
    );
    //dowload pdf
    Route::get('/download/produksi', [DownloadController::class, 'downloadProduksi'])->name('download.produksi');
    Route::get('/download/aset', [DownloadController::class, 'downloadAset'])->name('download.aset');
    Route::get('/download/pnbp', [DownloadController::class, 'downloadPnbp'])->name('download.pnbp');
});

Route::controller(IND::class)->group(
    function () {
        Route::get('/', 'index')->name('/');
        Route::get('pnbp', 'pnbp')->name('pnbp.index');
        Route::get('produktivitas', 'produktivitas')->name('produktivitas.index');
        Route::get('produksi', 'produksi')->name('produksi.index');
        Route::get('profile_upt', 'profile_upt')->name('upt.index');
        Route::get('profile_desa', 'profile_desa')->name('desa.index');
        Route::get('detail_sfv', 'detail_sfv')->name('detail.index');
      //test
       Route::get('testhit', 'test')->name('elatar.test');
    }
);

Route::controller(UNC::class)->group(
    function () {
        Route::get('unit', 'index')->name('unit');
        Route::get('pnbp_unit', 'pnbp')->name('pnbp.unit');
        Route::get('produktivitas_unit', 'produktivitas')->name('produktivitas.unit');
        Route::get('produksi_unit', 'produksi')->name('produksi.unit');
        Route::get('profile_unit', 'profile_unit')->name('profile.unit');
        Route::get('aset_unit', 'aset')->name('aset.unit');
    }
);

Route::controller(PRFL::class)->group(
    function () {
        Route::get('dashboard', 'index')->name('opt.dashboard.index');
        Route::get('pnbpxanggaran', 'pnbpxanggaran')->name('dashboard.pnbpxanggaran');
        Route::get('anggaranxrealisasi', 'anggaranxrealisasi')->name('dashboard.anggaranxrealisasi');
        Route::get('produkxcapaian', 'produkxcapaian')->name('dashboard.produkxcapaian');
        Route::get('asetxpenggunaan', 'asetxpenggunaan');
        Route::get('asetxpenggunaanxkat', 'asetxpenggunaanxkat');
        Route::get('paguxproduksi', 'paguxproduksi')->name('paguxproduksi');
        Route::get('produksixcapaian', 'produksixcapaian') ->name('produksixcapaian');
        Route::get('kategorixjumlah', 'kategorixjumlah');
        Route::get('tablepnbp', 'tablepnbp')->name('tablepnbp');
        Route::get('tableaset', 'tableaset')->name('tableaset');
    }
);

Route::controller(STC::class)->group(
    function () {
        Route::get('operator/profile', 'profile')->name('opt.profile');
        Route::get('operator/pnbp', 'tablepnbp')->name('opt.pnbp');
        Route::get('operator/aset', 'tableaset')->name('opt.aset');
        Route::get('operator/produksi', 'produksi')->name('opt.produksi');
        Route::get('operator/produktivitas', 'produktivitas')->name('opt.produktivitas');
        // Route::get('operator/aset', 'aset')->name('opt.aset');

        Route::get('operator/pnbpxanggaran', 'pnbpxanggaran')->name('opt.pnbpxanggaran');
        Route::get('operator/asetxpenggunaan', 'asetxpenggunaan')->name('opt.asetxpenggunaan');
        Route::get('operator/asetxpenggunaanxkat', 'asetxpenggunaanxkat')->name('opt.asetxpenggunaanxkat');
        Route::get('operator/paguxproduksi', 'paguxproduksi')->name('opt.paguxproduksi');
        Route::get('operator/targetxcapaian', 'targetxcapaian')->name('opt.targetxcapaian');
        Route::get('operator/produkxcapaian', 'produkxcapaian')->name('opt.produkxcapaian');
        Route::get('operator/anggaranxrealisasi', 'anggaranxrealisasi')->name('opt.anggaranxrealisasi');
    }
);
