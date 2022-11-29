
function alertaLogin(tipoAlerta){
    if(tipoAlerta=="faltan campos"){
        swal({
            title:"Atencion",
            text:"Faltan campos por llenar",
            icon:"warning",
            buttons:false,
            dangerMode: true,
        })
    }
    if(tipoAlerta=="faltaUsuario"){
        swal({
            title:"Atencion",
            text:"Falta ingresar el usuario",
            icon:"warning",
            buttons:false,
            dangerMode: true,
        })
    }
    if(tipoAlerta=="faltaContraseña"){
        swal({
            title:"Atencion",
            text:"Falta ingresar la contraseña",
            icon:"warning",
            buttons:false,
            dangerMode: true,
        })
    }
    if(tipoAlerta=="Inicio de sesion error"){
        swal({
            title:"Atencion",
            text:"Los datos no coinciden con ninguna cuenta",
            icon:"warning",
            buttons:false,
            dangerMode: true,
        })
    }
    if(tipoAlerta=="Sesion no iniciada"){
        swal({
            title:"ERROR",
            text:"Necesitas iniciar sesion para poder usar el sitio o no tienes acceso a la direccion url ingresada",
            icon:"warning",
            buttons:false,
            dangerMode: true,
        })
    }
    
}