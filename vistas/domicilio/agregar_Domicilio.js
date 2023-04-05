let patrones = {
    problematica: /[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ. ]{3,100}/
}

//este creo q no se usa
function handleSubmit() {
    var idc = document.getElementById('idc').value;
    var obs = patrones.problematica.test(document.getElementById('obs').value);
    var fecha = document.getElementById('fecha').value;
    let telefonoCliente = document.getElementById('listaTc').value;
    let correoCliente = document.getElementById('listaCc').value;
    let direccionCliente = document.getElementById('listaDc').value;

    if (document.getElementById("obs").value != "") {
        obs ?
            document.getElementById('advertenciaProblematica').hidden = true :
            document.getElementById('advertenciaProblematica').hidden = false
    }

    (obs && (fecha != "") && ((idc && telefonoCliente && correoCliente && direccionCliente) >= 0)) ?
        document.getElementById('submitButton').disabled = false :
        bloquearBotonEnviar();
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
    Swal.fire({
        title: '¿Deseas regresar a la lista y deshacer el registro?',
        showCancelButton: true,
        confirmButtonText: 'Confirmar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '?c=domicilio';
        }
    })
}