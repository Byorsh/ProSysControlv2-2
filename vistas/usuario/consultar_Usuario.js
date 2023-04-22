let patrones = {
    rfc: /^[A-Z]{4}\d{6}[A-Z0-9]{3}$/,
    nombre: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ. $]{3,20}/,
    apellido: /[a-zA-ZáéíóúÁÉÍÓÚñÑ. ]{3,20}/,
    telefono: /\+?\(?\d{2,4}\)?[\d\s-]{8,10}/,
    correo: /^[a-zA-Z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/,
    usuario: /[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ. ]{3,20}/,
    password: /[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{7,20}/
}

function handleSubmit() {
    //validar datos ingresados
    let rfc = patrones.rfc.test(document.getElementById('rfc').value);
    let nombre = patrones.nombre.test(document.getElementById('nombre').value);
    let apellido = patrones.apellido.test(document.getElementById('apellido').value);
    let telefono = patrones.telefono.test(document.getElementById('telefono').value);
    let correo = patrones.correo.test(document.getElementById('correo').value);
    let usuario = patrones.usuario.test(document.getElementById('usuario').value);
    let password = patrones.password.test(document.getElementById('contraseña').value);
    let nivelprivilegio = document.getElementById('nivelprivilegio').value;

    if (document.getElementById('rfc').value != "") {
        rfc ?
            document.getElementById('advertenciaRfc').hidden = true :
            document.getElementById('advertenciaRfc').hidden = false;
    } else {
        document.getElementById('advertenciaRfc').hidden = true;
    }

    if (document.getElementById('nombre').value != "") {
        nombre ?
            document.getElementById('advertenciaNombre').hidden = true :
            document.getElementById('advertenciaNombre').hidden = false;
    } else {
        document.getElementById('advertenciaNombre').hidden = true;
    }

    if (document.getElementById('apellido').value != "") {
        apellido ?
            document.getElementById('advertenciaApellido').hidden = true :
            document.getElementById('advertenciaApellido').hidden = false;
    } else {
        document.getElementById('advertenciaApellido').hidden = true;
    }

    if (document.getElementById('telefono').value != "") {
        telefono ?
            document.getElementById('advertenciaTelefono').hidden = true :
            document.getElementById('advertenciaTelefono').hidden = false;
    } else {
        document.getElementById('advertenciaTelefono').hidden = true;
    }

    if (document.getElementById('correo').value != "") {
        correo ?
            document.getElementById('advertenciaCorreo').hidden = true :
            document.getElementById('advertenciaCorreo').hidden = false;
    } else {
        document.getElementById('advertenciaCorreo').hidden = true;
    }

    if (document.getElementById('usuario').value != "") {
        usuario ?
            document.getElementById('advertenciaUsuario').hidden = true :
            document.getElementById('advertenciaUsuario').hidden = false;
    } else {
        document.getElementById('advertenciaUsuario').hidden = true;
    }

    if (document.getElementById('contraseña').value != "") {
        password ?
            document.getElementById('advertenciaContraseña').hidden = true :
            document.getElementById('advertenciaContraseña').hidden = false;
    } else {
        document.getElementById('advertenciaContraseña').hidden = true;
    }

    //Si el formulario fue llenado correctamente se activa el boton enviar
    (nombre && apellido && telefono && correo && usuario && contraseña && nivelprivilegio) ?
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
            window.location.href = '?c=usuario';
        }
    })
}

function mayus(e) {
    e.value = e.value.toUpperCase();
}

function minus(e) {
    e.value = e.value.toLowerCase();
}