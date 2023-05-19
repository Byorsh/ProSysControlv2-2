let patrones = {
    problematica: /[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ. ]{5,100}/
}
const formulario = document.getElementById('form');

//este creo q no se usa
function handleSubmit() {
    let idc = document.getElementById('idc').value;
    let obs = patrones.problematica.test(document.getElementById('obs').value);
    let fecha = document.getElementById('fecha').value;
    let telefonoCliente = document.getElementById('listaTc').value;
    let correoCliente = document.getElementById('listaCc').value;
    let direccionCliente = document.getElementById('listaDc').value;

    if (document.getElementById("obs").value != "") {
        obs ?
            document.getElementById('advertenciaProblematica').hidden = true :
            document.getElementById('advertenciaProblematica').hidden = false
    } else {
        document.getElementById('advertenciaProblematica').hidden = true;
    }

    (obs && (fecha != "") && ((idc && telefonoCliente && correoCliente && direccionCliente) >= 0)) ?
        document.getElementById('submitButton').disabled = false :
        handleBloquearSubmit();
}

//Funcion para poner en automatico los datos del cliente seleccionandolo de la lista
function toggleListadeclientes() {
    document.getElementById('listaTc').value = document.getElementById('idc').value;
    document.getElementById('listaCc').value = document.getElementById('idc').value;
    document.getElementById('listaDc').value = document.getElementById('idc').value;
}

function handleBloquearSubmit() {
    document.getElementById('submitButton').disabled = true;
}

function handleCancelar() {
    let obs = document.getElementById('obs').value;

    if (obs == "") {
            window.location.href = '?c=domicilio';
    } else {
        Swal.fire({
            title: '¿Deseas regresar a la lista y deshacer el registro?',
            showDenyButton: true,
            confirmButtonText: 'Confirmar',
            denyButtonText: `Cancelar`,
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '?c=domicilio';
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