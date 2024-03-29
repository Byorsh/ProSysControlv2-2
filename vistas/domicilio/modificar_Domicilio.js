let patrones = {
    problematica: /[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ. ]{3,100}/,
};
const formulario = document.getElementById('form');

function handleSubmit() {
    let problematica = patrones.problematica.test(document.getElementById("problematica").value);
    let observaciones = patrones.problematica.test(document.getElementById("observaciones").value);

    if (document.getElementById("problematica").value != "") {
        problematica
            ? (document.getElementById("advertenciaProblematica").hidden = true)
            : (document.getElementById("advertenciaProblematica").hidden = false);
    } else {
        document.getElementById("advertenciaProblematica").hidden = true;
    }

    if (document.getElementById("observaciones").value != "") {
        observaciones
            ? (document.getElementById("advertenciaObservaciones").hidden = true)
            : (document.getElementById("advertenciaObservaciones").hidden = false);
    } else {
        document.getElementById("advertenciaObservaciones").hidden = true;
    }

    calcularHoras();

    observaciones && problematica
        ? (document.getElementById("submitButton").disabled = false)
        : handleBloquearSubmit();
}

//Funcion para poner en automatico los datos del cliente seleccionandolo de la lista
function toggleListadeclientes() {
    document.getElementById("listaTc").value =
        document.getElementById("idc").value;
    document.getElementById("listaCc").value =
        document.getElementById("idc").value;
    document.getElementById("listaDc").value =
        document.getElementById("idc").value;
}

function handleBloquearSubmit() {
    document.getElementById("submitButton").disabled = true;
}

function handleCancelar() {
    let problematica = document.getElementById("problematica").value;
    let observaciones = document.getElementById("observaciones").value;
    let presupuesto = document.getElementById('presupuesto').value;
    

    if (problematica == "" && presupuesto == "" && observaciones == "") {
        window.location.href = "?c=domicilio";
    } else {
        Swal.fire({
            title: "¿Deseas regresar a la lista y deshacer el registro?",
            showDenyButton: true,
            confirmButtonText: "Confirmar",
            denyButtonText: `Cancelar`,
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "?c=domicilio";
            }
        });
    }
}

function calcularHoras() {

    let presupuesto = (document.getElementById("presupuesto").value);
    let horaInicio = (document.getElementById("horaInicio").value).toString();
    let horaFinal = document.getElementById("horaFinal").value;
    let horasRealizadas = document.getElementById("horasRealizadas");
    let costoTotal = document.getElementById("costoTotal");
    console.log('pasa?');
    console.log(`hora inicio: ${horaInicio}`);
    console.log(`hora final: ${horaFinal}`);

    //Calcular costo total
    var hora1 = horaInicio.split(":"),
        hora2 = horaFinal.split(":"),
        t1 = new Date(),
        t2 = new Date();

    t1.setHours(hora1[0], hora1[1]);
    t2.setHours(hora2[0], hora2[1]);

    //Aquí hago la resta
    t1.setHours(
        t2.getHours() - t1.getHours(),
        t2.getMinutes() - t1.getMinutes()
    );

    //Convirto horas a decimal
    let horasRealizadasDecimal = ((t1.getHours() * 60) + t1.getMinutes()) / 60;
    if (t1.getMinutes() > 0) {
        horasRealizadas.value = horasRealizadasDecimal.toFixed(2);
    } else {
        horasRealizadas.value = horasRealizadasDecimal;
    }

    //Calculo costo total
    let calcularCostoTotal = presupuesto * document.getElementById("horasRealizadas").value;
    costoTotal.value = calcularCostoTotal.toFixed(2);


}

function Guardar() {
    Swal.fire({
        title: "¿Estás seguro de enviar los cambios?",
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
