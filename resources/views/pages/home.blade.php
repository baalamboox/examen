@extends('layouts.main')

@section('title', '¡Hola, ' . Auth::user()->name . '!')

@section('main_container')
<div class="container">
    <div class="row">
        <form action="#" method="POST" id="formulario_factura">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <span class="fs-5 fw-light mb-4">Datos producto/Servicio</span>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <select type="text" class="form-select" id="clave_ps" name="clave_ps" placeholder="Clave Producto/Servicio" required>
                                    <option value="null">Selecciona la clave</option>
                                </select>
                                <label for="clave_ps">Clave Producto/Servicio</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripción" required style="height: 100px"></textarea>
                                <label for="descripcion">Descripción</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <span class="fs-5 fw-light mb-4">Datos receptor</span>
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="nombre_receptor" name="nombre_receptor" placeholder="Nombre receptor" required>
                                        <label for="nombre_receptor">Nombre receptor</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="rfc_receptor" name="rfc_receptor" placeholder="RFC receptor" required></input>
                                        <label for="rfc_receptor">RFC receptor</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="regimen_fiscal_receptor" name="regimen_fiscal_receptor" placeholder="Regimen fiscal receptor" required>
                                            <option value="null">Seleccionar regimen</option>
                                            @foreach ($regimenes_fiscales as $regimen_fiscal)
                                                <option value="{{ $regimen_fiscal->clave }}">{{ $regimen_fiscal->clave . ' - ' . $regimen_fiscal->descripcion }}</option>
                                            @endforeach
                                        </select>
                                        <label for="regimen_fiscal_receptor">Regimen fiscal receptor</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="domicilio_fiscal_receptor" name="domicilio_fiscal_receptor" placeholder="Domicilio fiscal receptor" required></input>
                                        <label for="domicilio_fiscal_receptor">Domicilio fiscal receptor</label>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="uso_cfdi" name="uso_cfdi" placeholder="Uso CFDI" required>
                                            <option value="null">Seleccionar uso</option>
                                            @foreach ($usos_cfdi as $uso_cfdi)
                                                <option value="{{ $uso_cfdi->clave }}">{{ $uso_cfdi->clave . ' - ' . $uso_cfdi->descripcion }}</option>
                                            @endforeach
                                        </select>
                                        <label for="uso_cfdi">Uso CFDI</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <span class="fs-5 fw-light mb-4">Datos monetarios</span>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <select type="text" class="form-select" id="metodo_pago" name="metodo_pago" placeholder="Método pago" required>
                                    <option value="null">Seleccionar método</option>
                                    @foreach ($metodos_pago as $metodo_pago)
                                        <option value="{{ $metodo_pago->clave }}">{{ $metodo_pago->clave . ' - ' . $metodo_pago->descripcion }}</option>
                                    @endforeach
                                </select>
                                <label for="metodo_pago">Método de pago</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <select type="text" class="form-select" id="forma_pago" name="forma_pago" placeholder="Forma pago" required>
                                    <option value="null">Seleccionar forma</option>
                                    @foreach ($formas_pago as $forma_pago)
                                        <option value="{{ $forma_pago->clave }}">{{ $forma_pago->clave . ' - ' . $forma_pago->descripcion }}</option>
                                    @endforeach
                                </select>
                                <label for="forma_pago">Forma de pago</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <select type="text" class="form-select" id="clave_unidad" name="clave_unidad" placeholder="Clave unidad" required>
                                    <option value="null">Seleccionar unidad</option>
                                    @foreach ($clave_unidades as $clave_unidad)
                                        <option value="{{ $clave_unidad->clave }}">{{ $clave_unidad->clave . ' - ' . $clave_unidad->descripcion }}</option>
                                    @endforeach
                                </select>
                                <label for="clave_unidad">Clave unidad</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad" value="0" required>
                                <label for="cantidad">Cantidad</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="valor_unitario" name="valor_unitario" placeholder="Valor unitario" value="0" required>
                                <label for="valor_unitario">Valor unitario</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-floating mb-3 mb-lg-0 mb-xl-0 mb-xxl-0">
                                <input type="text" class="form-control" id="importe" name="importe" placeholder="Importe" value="0" readonly disabled required>
                                <label for="importe">Importe</label>
                            </div>
                        </div>
                        <div class="col-md-8 text-center d-flex align-items-center">
                            <div class="btn-group w-100">
                                <span class="btn btn-warning" id="agregar_nuevo">Agregar nuevo</span>
                                <span class="btn btn-secondary" id="agregar_concepto">Agregar concepto</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4 d-none" id="row_facturas">
                        <div class="col-md-12 overflow-scroll" id="contenedor_facturas" style="height: 200px">                                                        
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="row mt-4">
        <span class="fs-5 fw-light mb-4">Totales</span>
        <div class="col-md-4">
            <div class="form-floating mb-3 mb-lg-0 mb-xl-0 mb-xxl-0">
                <input type="text" class="form-control" id="subtotal" name="subtotal" placeholder="Subtotal" value="0" readonly disabled required>
                <label for="subtotal">Subtotal</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-floating mb-3 mb-lg-0 mb-xl-0 mb-xxl-0">
                <input type="text" class="form-control" id="total" name="total" placeholder="Total" value="0" readonly disabled required>
                <label for="total">Total</label>
            </div>
        </div>
        <div class="col-md-4 text-center d-flex align-items-center">
            <a href="./Factura.xml" download="./Factura.xml" class="btn btn-primary w-100" id="generar_factura">Generar factura</a>
        </div>
    </div>
    <div class="row my-5">
        <span class="fs-5 fw-light mb-4">Facturas</span>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="tabla_facturas">
                        <thead>
                          <tr>
                            <th scope="col">ID factura</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Total</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($facturas as $factura)
                                <tr>
                                    <td>{{ $factura->id }}</td>
                                    <td>{{ $factura->descripcion }}</td>
                                    <td>{{ $factura->subtotal }}</td>
                                    <td>{{ $factura->total }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
