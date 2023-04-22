let patrones = {
    descripcion: /[a-zA-Z0-9]{3,100}/,
    cantidad: /[0-9]{1,6}/,
    precioDeCompra: /[0-9.]{1,12}/,
    precioDeVenta: /[0-9.]{1,12}/
}

function handleSubmit() {
    //validar datos ingresados
    let descripcion = patrones.descripcion.test(document.getElementById('descripcion').value);
    let cantidad = patrones.cantidad.test(document.getElementById('cantidad').value);
    let precioDeCompra = patrones.precioDeCompra.test(document.getElementById('preciocompratxt').value);
    let precioDeVenta = patrones.precioDeVenta.test(document.getElementById('precioventatxt').value);

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

    //Si el formulario fue llenado correctamente se activa el boton enviar
    (descripcion && cantidad && precioDeCompra && precioDeVenta) ?
        document.getElementById('submitButton').disabled = false :
        handleBloquearSubmit();
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
    e.value = e.value.toLowerCase();
}