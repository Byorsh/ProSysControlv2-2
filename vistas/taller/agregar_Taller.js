let patrones = {
    ns: /[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ. ]{6,30}/,
    marca: /[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ. ]{3,50}/,
    modelo: /[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ. ]{3,50}/,
    observaciones: /[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ. ]{7,100}/,
}

function handleSubmit() {
    var ns = patrones.ns.test(document.getElementById('ns').value);
    var marca = patrones.marca.test(document.getElementById('marca').value);
    var modelo = patrones.modelo.test(document.getElementById('modelo').value);
    var observaciones = patrones.observaciones.test(document.getElementById('obs').value);
    let tecnicoAsignado = document.getElementById('idtec');
    var fecha = document.getElementById('fecha').value;

    if (document.getElementById('ns').value != "") {
        ns ?
            document.getElementById('advertenciaSerie').hidden = true :
            document.getElementById('advertenciaSerie').hidden = false;
    }

    if (document.getElementById('marca').value != "") {
        marca ?
            document.getElementById('advertenciaMarca').hidden = true :
            document.getElementById('advertenciaMarca').hidden = false;
    }

    if (document.getElementById('modelo').value != "") {
        modelo ?
            document.getElementById('advertenciaModelo').hidden = true :
            document.getElementById('advertenciaModelo').hidden = false;
    }

    if (document.getElementById('obs').value != "") {
        observaciones ?
            document.getElementById('advertenciaObservaciones').hidden = true :
            document.getElementById('advertenciaObservaciones').hidden = false;
    }

    //Si el formulario fue llenado correctamente se activa el boton enviar
    (ns && marca && modelo && observaciones && (tecnicoAsignado.value >= 0) && (fecha != "")) ?
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
        showCancelButton: true,
        confirmButtonText: 'Confirmar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '?c=taller';
        }
    })
}