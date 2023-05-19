let patrones = {
    rfc: /^[A-Z]{4}\d{6}[A-Z0-9]{3}$/,
    nombre: /[a-zA-ZáéíóúÁÉÍÓÚñÑ. ]{4,30}/,
    apellidos: /[a-zA-ZáéíóúÁÉÍÓÚñÑ. ]{4,30}/,
    telefono: /\+?\(?\d{2,4}\)?[\d\s-]{8,10}/,
    correo: /^[a-zA-Z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/,
}

function handleSubmit() {
    let rfc = patrones.rfc.test(document.getElementById('rfc').value);
    let nombre = patrones.nombre.test(document.getElementById('nombre').value);
    let apellidos = patrones.apellidos.test(document.getElementById('apellidos').value);
    let telefono = patrones.telefono.test(document.getElementById('telefono').value);
    let correo = patrones.correo.test(document.getElementById('email').value);

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

    if (document.getElementById('apellidos').value != "") {
        apellidos ?
            document.getElementById('advertenciaApellidos').hidden = true :
            document.getElementById('advertenciaApellidos').hidden = false;
    } else {
        document.getElementById('advertenciaApellidos').hidden = true;
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

    if (document.getElementById('rfc').value != "") {
        (nombre && apellidos && telefono && telefono && correo && rfc) ?
            document.getElementById('submitButton').disabled = false :
            handleBloquearSubmit();
    } else {
        (nombre && apellidos && telefono && telefono && correo) ?
            document.getElementById('submitButton').disabled = false :
            handleBloquearSubmit();
    }

}

function handleBloquearSubmit() {
    document.getElementById('submitButton').disabled = true;
}

function handleCancelar() {
    let rfc = document.getElementById('rfc').value;
    let nombre = document.getElementById('nombre').value;
    let apellidos = document.getElementById('apellidos').value;
    let nombreEmpresa = document.getElementById('nombreEmpresa').value;
    let telefono = document.getElementById('telefono').value;
    let correo = document.getElementById('email').value;
    let domicilio = document.getElementById('domicilio').value;

    if (rfc == "" && nombre == "" && apellidos == "" && nombreEmpresa == "" && telefono == ""
        && correo == "" && domicilio == "") {
        window.location.href = '?c=cliente';
    } else {
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
}

function Guardar() {
    const formulario = document.getElementById('formcliente');
    Swal.fire({
        title: "¿Son los datos correctos?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sí, guardar registro",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            // El usuario hizo clic en "Aceptar", envía los cambios
            console.log("si");
            formulario.submit();
        } else {
            // El usuario hizo clic en "Cancelar", no envía los cambios
            return false;
        }
    });
}

function Actualizar() {
    Swal.fire({
        title: "¿Estás seguro?",
        text: "¿Quieres enviar los cambios?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sí, enviar cambios",
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

function minus(e) {
    e.value = e.value.toLowerCase();
}