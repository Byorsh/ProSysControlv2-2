let patrones = {
    rfc: /^[A-Z]{4}\d{6}[A-Z0-9]{3}$/,
    nombre: /[a-zA-ZáéíóúÁÉÍÓÚñÑ. ]{4,30}/,
    apellidoPaterno: /[a-zA-ZáéíóúÁÉÍÓÚñÑ. ]{4,30}/,
    apellidoMaterno: /[a-zA-ZáéíóúÁÉÍÓÚñÑ. ]{4,30}/,
    telefono: /\+?\(?\d{2,4}\)?[\d\s-]{8,10}/,
    correo: /^[a-zA-Z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/,
}

function handleSubmit() {
    let rfc = patrones.rfc.test(document.getElementById('rfc').value);
    let nombre = patrones.nombre.test(document.getElementById('nombre').value);
    let apellidoPaterno = patrones.apellidoPaterno.test(document.getElementById('apellidoPaterno').value);
    let apellidoMaterno = patrones.apellidoMaterno.test(document.getElementById('apellidoMaterno').value);
    let telefono = patrones.telefono.test(document.getElementById('telefono').value);
    let correo = patrones.correo.test(document.getElementById('email').value);

    console.log(rfc);

    if (document.getElementById('rfc').value != "") {
        rfc ?
            document.getElementById('advertenciaRfc').hidden = true :
            document.getElementById('advertenciaRfc').hidden = false;
    } else {
        document.getElementById('advertenciaRfc').hidden = true;
    }

    if (document.getElementById('nombre').value != "") {
        nombre ?
            document.getElementById('advertenciaCliente').hidden = true :
            document.getElementById('advertenciaCliente').hidden = false;
    } else {
        document.getElementById('advertenciaCliente').hidden = true;
    }

    if (document.getElementById('apellidoPaterno').value != "") {
        apellidoPaterno ?
            document.getElementById('advertenciaApellidoPaterno').hidden = true :
            document.getElementById('advertenciaApellidoPaterno').hidden = false;
    } else {
        document.getElementById('advertenciaApellidoPaterno').hidden = true;
    }

    if (document.getElementById('apellidoMaterno').value != "") {
        apellidoMaterno ?
            document.getElementById('advertenciaApellidoMaterno').hidden = true :
            document.getElementById('advertenciaApellidoMaterno').hidden = false;
    } else {
        document.getElementById('advertenciaApellidoMaterno').hidden = true;
    }

    if (document.getElementById('telefono').value != "") {
        telefono ?
            document.getElementById('advertenciaTelefono').hidden = true :
            document.getElementById('advertenciaTelefono').hidden = false;
    } else {
        document.getElementById('advertenciaTelefono').hidden = true;
    }

    if (document.getElementById('email').value != "") {
        correo ?
            document.getElementById('advertenciaEmail').hidden = true :
            document.getElementById('advertenciaEmail').hidden = false;
    } else {
        document.getElementById('advertenciaEmail').hidden = true;
    }

    (nombre && apellidoMaterno && apellidoPaterno && telefono && telefono && correo) ?
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
            window.location.href = '?c=cliente';
        }
    })
}

function mayus(e) {
    e.value = e.value.toUpperCase();
}

function minus(e) {
    e.value = e.value.toLowerCase();
}