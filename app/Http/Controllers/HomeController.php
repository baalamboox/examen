<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\c_ClaveProductoServicio;
use App\Models\c_RegimenFiscal;
use App\Models\c_UsoCFDI;
use App\Models\c_MetodoPago;
use App\Models\c_FormaPago;
use App\Models\c_ClaveUnidad;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $regimenes_fiscales = c_RegimenFiscal::all();
        $usos_cfdi = c_UsoCFDI::all();
        $metodos_pago = c_MetodoPago::all();
        $formas_pago = c_FormaPago::all();
        $clave_unidades = c_ClaveUnidad::all()->take(100);
        return view('pages.home', [ 
            'regimenes_fiscales' => $regimenes_fiscales,
            'usos_cfdi' => $usos_cfdi,
            'metodos_pago' => $metodos_pago,
            'formas_pago' => $formas_pago,
            'clave_unidades' => $clave_unidades
        ]);
    }
    public function get_products_services() {
        echo json_encode(c_ClaveProductoServicio::all()->take(10));
    }
}
