<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\c_ClaveProductoServicio;
use App\Models\c_RegimenFiscal;
use App\Models\c_UsoCFDI;
use App\Models\c_MetodoPago;
use App\Models\c_FormaPago;
use App\Models\c_ClaveUnidad;
use App\Models\Facturas;
use App\Models\Conceptos;

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
        $clave_unidades = c_ClaveUnidad::all()->take(200);
        $facturas = Facturas::all()->where('usuario_id', Auth::user()->id);
        return view('pages.home', [ 
            'regimenes_fiscales' => $regimenes_fiscales,
            'usos_cfdi' => $usos_cfdi,
            'metodos_pago' => $metodos_pago,
            'formas_pago' => $formas_pago,
            'clave_unidades' => $clave_unidades,
            'facturas' => $facturas
        ]);
    }
    public function get_ps() {
        echo json_encode(c_ClaveProductoServicio::all()->take(200));
    }
    public function create_bill(Request $request) {
        $comprobanteAtributos = [
            'Serie' => 'XXX',
            'Folio' => '0000123456',
            'Certificado' => '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',
        ];
        $creator = new \CfdiUtils\CfdiCreator40($comprobanteAtributos);
        $comprobante = $creator->comprobante();
        $factura = new Facturas();
        $factura->usuario_id = Auth::user()->id;
        $factura->descripcion = 'Factura';
        $factura->subtotal = $request['subtotal'];
        $factura->total = $request['total'];
        if($factura->save()) {
            $facturas = json_decode($request['facturas'], true);
            $comprobante->addReceptor([
                'IDFactura' => Facturas::latest('id')->first()->id,
                'Descripcion' => 'Factura',
                'Subtotal' => $request['subtotal'],
                'Total' => $request['total']
            ]);
            foreach ($facturas as $factura) {
                $conceptos = new Conceptos();
                $conceptos->factura_id = Facturas::latest('id')->first()->id;
                $conceptos->clave_producto_servicio = $factura['clave_ps'];
                $conceptos->descripcion = $factura['descripcion'];
                $conceptos->nombre_receptor = $factura['nombre_receptor'];
                $conceptos->rfc_receptor = $factura['rfc_receptor'];
                $conceptos->regimen_fiscal = $factura['regimen_fiscal_receptor'];
                $conceptos->domicilio_fiscal_receptor = $factura['domicilio_fiscal_receptor'];
                $conceptos->uso_cfdi = $factura['uso_cfdi'];
                $conceptos->metodo_pago = $factura['metodo_pago'];
                $conceptos->forma_pago = $factura['forma_pago'];
                $conceptos->clave_unidad = $factura['clave_unidad'];
                $conceptos->cantidad = $factura['cantidad'];
                $conceptos->valor_unitario = $factura['valor_unitario'];
                $conceptos->importe = $factura['importe'];
                $conceptos->save();
                $comprobante->addConcepto([
                    'ClaveProductoServicio' => $factura['clave_ps'],
                    'Descripcion' => $factura['descripcion'],
                    'NombreReceptor' => $factura['nombre_receptor'],
                    'RFCReceptor' => $factura['rfc_receptor'],
                    'RegimenFiscalReceptor' => $factura['regimen_fiscal_receptor'],
                    'DomicilioFiscalReceptor' => $factura['domicilio_fiscal_receptor'],
                    'UsoCFDI' => $factura['uso_cfdi'],
                    'MetodoPago' => $factura['metodo_pago'],
                    'FormaPago' => $factura['forma_pago'],
                    'ClaveUnidad' => $factura['clave_unidad'],
                    'Cantidad' => $factura['cantidad'],
                    'ValorUnitario' => $factura['valor_unitario'],
                    'Importe' => $factura['importe']
                ]);
            }
            $creator->saveXml('./Factura.xml');
            echo './public/Factura.xlm';
        } else {
            echo 'OH! No!';
        };
    }
}
