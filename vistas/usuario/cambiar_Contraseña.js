let patrones = {
    password: /[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{7,20}/
}
const formulario = document.getElementById('formcontraseña');

function handleSubmit() {
    //validar datos ingresados
    let password = patrones.password.test(document.getElementById('contraseña').value);


    if (document.getElementById('contraseña').value != "") {
        password ? 
            document.getElementById('advertenciaContraseña').hidden = true :
            document.getElementById('advertenciaContraseña').hidden = false; handleBloquearSubmit();
    } else {
        document.getElementById('advertenciaContraseña').hidden = true;
    }

    if (document.getElementById('contraseña2').value != "") {
        if ((document.getElementById('contraseña').value) === (document.getElementById('contraseña2').value)) {
            document.getElementById('submitButton').disabled = false;
            document.getElementById('advertenciaContraseña2').hidden = true;
        }
        else {
            handleBloquearSubmit();
            document.getElementById('advertenciaContraseña2').hidden = false;
        }
    }


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
function Guardar() {
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