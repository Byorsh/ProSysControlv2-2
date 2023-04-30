let patrones = {
    ns: /[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ. ]{6,30}/,
    marca: /[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ. ]{3,50}/,
    modelo: /[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ. ]{3,50}/,
    observaciones: /[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ. ]{4,100}/,
}

function handleSubmit() {
    let ns = patrones.ns.test(document.getElementById('ns').value);
    let marca = patrones.marca.test(document.getElementById('marca').value);
    let modelo = patrones.modelo.test(document.getElementById('modelo').value);
    let observaciones = patrones.observaciones.test(document.getElementById('obs').value);
    let tecnicoAsignado = document.getElementById('idtec');
    let fecha = document.getElementById('fecha').value;
    let idCliente = document.getElementById('idc').value;
    let telefonoCliente = document.getElementById('listaTc').value;
    let correoCliente = document.getElementById('listaCc').value;

    console.log(`id cliente: ${idCliente}`);
    console.log(`telefono cliente: ${telefonoCliente}`);
    console.log(`correo cliente: ${correoCliente}`);

    if (document.getElementById('ns').value != "") {
        ns ?
            document.getElementById('advertenciaSerie').hidden = true :
            document.getElementById('advertenciaSerie').hidden = false;
    } else {
        document.getElementById('advertenciaSerie').hidden = true;
    }

    if (document.getElementById('marca').value != "") {
        marca ?
            document.getElementById('advertenciaMarca').hidden = true :
            document.getElementById('advertenciaMarca').hidden = false;
    } else {
        document.getElementById('advertenciaMarca').hidden = true;
    }

    if (document.getElementById('modelo').value != "") {
        modelo ?
            document.getElementById('advertenciaModelo').hidden = true :
            document.getElementById('advertenciaModelo').hidden = false;
    } else {
        document.getElementById('advertenciaModelo').hidden = true;
    }

    if (document.getElementById('obs').value != "") {
        observaciones ?
            document.getElementById('advertenciaObservaciones').hidden = true :
            document.getElementById('advertenciaObservaciones').hidden = false;
    } else {
        document.getElementById('advertenciaObservaciones').hidden = true;
    }

    //Si el formulario fue llenado correctamente se activa el boton enviar
    (ns && marca && modelo && observaciones && (tecnicoAsignado.value >= 0) && (fecha != "") && ((idCliente && telefonoCliente && correoCliente) > 0)) ?
        document.getElementById('submitButton').disabled = false :
        handleBloquearSubmit();
}

function toggleListadeclientes() {
    document.getElementById('listaTc').value = document.getElementById('idc').value;
    document.getElementById('listaCc').value = document.getElementById('idc').value;
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
            window.location.href = '?c=taller';
        }
    })
}

function mayus(e) {
    e.value = e.value.toUpperCase();
}