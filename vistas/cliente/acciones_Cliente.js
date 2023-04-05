let patrones = {
    nombre: /[a-zA-ZáéíóúÁÉÍÓÚñÑ. ]{4,20}/,
    apellidoPaterno: /[a-zA-ZáéíóúÁÉÍÓÚñÑ. ]{4,20}/,
    apellidoMaterno: /[a-zA-ZáéíóúÁÉÍÓÚñÑ. ]{4,20}/,
    telefono: /\+?\(?\d{2,4}\)?[\d\s-]{8,14}/,
    correo: /^[a-zA-Z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/,
}

function handleSubmit() {
    let nombre = patrones.nombre.test(document.getElementById('nombre').value);
    let apellidoPaterno = patrones.apellidoPaterno.test(document.getElementById('apellidoPaterno').value);
    let apellidoMaterno = patrones.apellidoMaterno.test(document.getElementById('apellidoMaterno').value);
    let telefono = patrones.telefono.test(document.getElementById('telefono').value);
    let correo = patrones.correo.test(document.getElementById('email').value);

    if (document.getElementById('nombre').value != "") {
        nombre ?
            document.getElementById('advertenciaCliente').hidden = true :
            document.getElementById('advertenciaCliente').hidden = false;
    }

    if (document.getElementById('apellidoPaterno').value != "") {
        apellidoPaterno ?
            document.getElementById('advertenciaApellidoPaterno').hidden = true :
            document.getElementById('advertenciaApellidoPaterno').hidden = false;
    }

    if (document.getElementById('apellidoMaterno').value != "") {
        apellidoMaterno ?
            document.getElementById('advertenciaApellidoMaterno').hidden = true :
            document.getElementById('advertenciaApellidoMaterno').hidden = false;
    }

    if (document.getElementById('telefono').value != "") {
        telefono ?
            document.getElementById('advertenciaTelefono').hidden = true :
            document.getElementById('advertenciaTelefono').hidden = false;
    }

    if (document.getElementById('email').value != "") {
        correo ?
            document.getElementById('advertenciaEmail').hidden = true :
            document.getElementById('advertenciaEmail').hidden = false;
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
        showCancelButton: true,
        confirmButtonText: 'Confirmar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '?c=cliente';
        }
    })
}