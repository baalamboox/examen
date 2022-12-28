import axios from "axios"

export const mandar_datos = ({ facturas, subtotal, total }) => {
    axios.post('/create_bill', {
        facturas: JSON.stringify(facturas),
        subtotal: subtotal, 
        total: total
    }).then(resolve => resolve.status == 200 ? [
        window.location.href = '/home',
    ] : false);
}