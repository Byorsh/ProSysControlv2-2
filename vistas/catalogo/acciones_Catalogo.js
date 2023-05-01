let patrones = {
    descripcion: /[a-zA-Z0-9]{3,100}/,
    cantidad: /[0-9]{1,6}/,
    precioDeCompra: /[0-9.]{1,12}/,
    precioDeVenta: /[0-9.]{1,12}/,
    porcentajeGanancia: /[0-9.]{1,12}/
}

function handleSubmit() {
    //validar datos ingresados
    let descripcion = patrones.descripcion.test(document.getElementById('descripcion').value);
    let cantidad = patrones.cantidad.test(document.getElementById('cantidad').value);
    let precioDeCompra = patrones.precioDeCompra.test(document.getElementById('preciocompratxt').value);
    let precioDeVenta = patrones.precioDeVenta.test(document.getElementById('precioventatxt').value);
    let porcentajeGanancia = patrones.porcentajeGanancia.test(document.getElementById('porcentajeGanancia').value);

    let iva = document.getElementById('impuestolista').value;
    console.log('iva ' + iva );

    if (document.getElementById('descripcion').value != "") {
        descripcion != "" ?
            document.getElementById('advertenciaDescripcion').hidden = true :
            document.getElementById('advertenciaDescripcion').hidden = false;
    } else {
        document.getElementById('advertenciaDescripcion').hidden = true;
    }

    if (document.getElementById('cantidad').value != "") {
        cantidad ?
            document.getElementById('advertenciaCantidad').hidden = true :
            document.getElementById('advertenciaCantidad').hidden = false;
    } else {
        document.getElementById('advertenciaCantidad').hidden = true;
    }

    if (document.getElementById('preciocompratxt').value != "") {
        precioDeCompra ?
            document.getElementById('advertenciaPrecioCompra').hidden = true :
            document.getElementById('advertenciaPrecioCompra').hidden = false;
    } else {
        document.getElementById('advertenciaPrecioCompra').hidden = true;
    }

    if (document.getElementById('precioventatxt').value != "") {
        precioDeVenta ?
            document.getElementById('advertenciaPrecioVenta').hidden = true :
            document.getElementById('advertenciaPrecioVenta').hidden = false;
    } else {
        document.getElementById('advertenciaPrecioVenta').hidden = true;
    }

    if (document.getElementById('porcentajeGanancia').value != "") {
        porcentajeGanancia ?
            document.getElementById('advertenciaPorcentajeCompra').hidden = true :
            document.getElementById('advertenciaPorcentajeCompra').hidden = false;
    } else {
        document.getElementById('advertenciaPorcentajeCompra').hidden = true;
    }

    calcularPrecioVenta();

    //Si el formulario fue llenado correctamente se activa el boton enviar
    (descripcion && cantidad && precioDeCompra && precioDeVenta && porcentajeGanancia) ?
        document.getElementById('submitButton').disabled = false :
        handleBloquearSubmit();
}

function calcularPrecioVenta(){
    let precioDeCompra = document.getElementById('preciocompratxt').value;
    let precioDeVenta = document.getElementById('precioventatxt');
    let porcentajeGanancia = document.getElementById('porcentajeGanancia').value;
    let iva = document.getElementById('impuestolista').value;

    let nuevoPrecioVenta = ((precioDeCompra / (100-porcentajeGanancia)) * 100).toFixed(2);

    precioDeVenta.value = (nuevoPrecioVenta * ((iva / 100) + 1)).toFixed(2);
}

function handleBloquearSubmit() {
    document.getElementById('submitButton').disabled = true;
}

function handleCancelar() {
    Swal.fire({
        title: '¿Deseas regresar a la lista y deshacer el registro?',
        showDenyButton: true,
        confirmButtonText: 'Confirmar',
        denyButtonText: `Cancelar`,
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '?c=catalogo';
        }
    })
}

function mayus(e) {
    e.value = e.value.toUpperCase();
}