import axios from 'axios';

$(document).ready(() => {
    const facturas = [];
    axios.get('/get_ps').then(response => {
        response.data.map((item, index) => {
            $('#clave_ps').append(`<option value="${ item.clave }">${ item.clave } - ${ item.descripcion }</option>`);
        })
    });
    $('#cantidad').on('input', () => {
        $('#importe').val($('#cantidad').val() * $('#valor_unitario').val());
    })
    $('#valor_unitario').on('input', () => {
        $('#importe').val($('#cantidad').val() * $('#valor_unitario').val());
    })
    $('#agregar_concepto').click(() => {
        $('#contenedor_facturas').empty();
        facturas.push({
            clave_ps: $('#clave_ps').val(),
            descripcion: $('#descripcion').val()
        });
        facturas.map((item, index) => {
            $('#contenedor_facturas').append(`
                <div class="alert alert-primary" role="alert">
                    ${ item.clave_ps }
                </div>    
            `)
        })
        
    });
});