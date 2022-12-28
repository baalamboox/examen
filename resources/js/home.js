import axios from 'axios';
import 'datatables.net-bs5';
import { mandar_datos } from './generar_factura';

$(document).ready(() => {
    const facturas = [];
    axios.get('/get_ps').then(response => {
        response.data.map((item) => {
            $('#clave_ps').append(`<option value="${ item.clave }">${ item.clave } - ${ item.descripcion }</option>`);
        })
    });
    $('#tabla_facturas').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.1/i18n/es-MX.json'
        }
    });
    $('#cantidad').on('input', () => {
        $('#importe').val($('#cantidad').val() * $('#valor_unitario').val());
    })
    $('#valor_unitario').on('input', () => {
        $('#importe').val($('#cantidad').val() * $('#valor_unitario').val());
    })
    $('#agregar_nuevo').click(() => {
        $('#formulario_factura')[0].reset();
    });
    $('#agregar_concepto').click(() => {
        let subtotal = 0, total = 0;
        $('#row_facturas').removeClass('d-none');
        $('#contenedor_facturas').empty();
        facturas.push({
            clave_ps: $('#clave_ps').val(),
            descripcion: $('#descripcion').val(),
            nombre_receptor: $('#nombre_receptor').val(),
            rfc_receptor: $('#rfc_receptor').val(),
            regimen_fiscal_receptor: $('#regimen_fiscal_receptor').val(),
            domicilio_fiscal_receptor: $('#domicilio_fiscal_receptor').val(),
            uso_cfdi: $('#uso_cfdi').val(),
            metodo_pago: $('#metodo_pago').val(),
            forma_pago: $('#forma_pago').val(),
            clave_unidad: $('#clave_unidad').val(),
            cantidad: $('#cantidad').val(),
            valor_unitario: $('#valor_unitario').val(),
            importe: $('#importe').val()
        });
        facturas.map((item) => {
            subtotal = subtotal + parseFloat(item.importe);
            total = subtotal + (subtotal * 0.16)
            $('#contenedor_facturas').append(`
                <div class="alert border-secondary alert-dismissible fade show" role="alert">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Clave</th>
                                    <th scope="col">Producto/Servicio</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Valor unitario</th>
                                    <th scope="col">Importe</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">${ item.clave_ps }</th>
                                    <td>${ item.clave_ps }</td>
                                    <td>${ item.cantidad }</td>
                                    <td>${ item.valor_unitario }</td>
                                    <td>${ item.importe }</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>  
            `)
            $('#subtotal').val(subtotal);
            $('#total').val(total)
        })
    });
    $('#generar_factura').click(() => {
        mandar_datos({ 
            facturas,
            subtotal: $('#subtotal').val(),
            total: $('#total').val()
        })
    });
});