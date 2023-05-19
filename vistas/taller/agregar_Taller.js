let patrones = {
    ns: /[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ. ]{2,30}/,
    marca: /[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ. ]{1,50}/,
    modelo: /[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ. ]{1,50}/,
    observaciones: /[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ. ]{4,100}/,
}
const formulario = document.getElementById('form');

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
    /*
    console.log(`id cliente: ${idCliente}`);
    console.log(`telefono cliente: ${telefonoCliente}`);
    console.log(`correo cliente: ${correoCliente}`);
    */
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
    let ns = document.getElementById('ns').value;
    let marca = document.getElementById('marca').value;
    let modelo = document.getElementById('modelo').value;
    let tipoEquipo = document.getElementById('tipoEquipo').value;
    let observaciones = document.getElementById('obs').value;
    let accesorios = document.getElementById('accesorios').value;
    let fecha = document.getElementById('fecha').value;

    if (ns == "" && marca == "" && modelo == "" && tipoEquipo == "" && observaciones == ""
        && accesorios == "" && fecha == "") {
        window.location.href = '?c=taller';
    } else {
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
}

function Guardar() {
    Swal.fire({
        title: "¿Son los datos correctos?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sí, guardar registro",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            // El usuario hizo clic en "Aceptar", envía los cambios
            formulario.submit();
        } else {
            // El usuario hizo clic en "Cancelar", no envía los cambios
            return false;
        }
    });
}

function mayus(e) {
    e.value = e.value.toUpperCase();
}