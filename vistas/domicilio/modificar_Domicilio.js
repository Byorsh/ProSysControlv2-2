let patrones = {
    problematica: /[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ. ]{3,100}/
}

function handleSubmit() {
    let problematica = patrones.problematica.test(document.getElementById('problematica').value);
    let observaciones = patrones.problematica.test(document.getElementById('observaciones').value);

    if (document.getElementById('problematica').value != "") {
        problematica ?
            document.getElementById('advertenciaProblematica').hidden = true :
            document.getElementById('advertenciaProblematica').hidden = false;
    }

    if (document.getElementById("observaciones").value != "") {
        observaciones ?
            document.getElementById('advertenciaObservaciones').hidden = true :
            document.getElementById('advertenciaObservaciones').hidden = false
    }

    (observaciones && problematica) ?
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