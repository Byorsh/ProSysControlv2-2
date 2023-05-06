
function alertaLogin(tipoAlerta){//son iguales solo cambia segun el tipo de error
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
    if(tipoAlerta=="Modulo no permitido"){
        swal({
            title:"ERROR",
            text:"Esta seccion no esta permitida",
            icon:"warning",
            buttons:false,
            dangerMode: true,
        })
    }
    if(tipoAlerta=="No se encontro ningun resultado"){
        swal({
            title:"No hay resultados",
            text:"No se encontro ningun resultado, prueba realizando otra busqueda",
            icon:"info",
            buttons:false,
            dangerMode: true,
        })
    }
    if(tipoAlerta=="Registro realizado"){
        swal({
            icon: 'success',
            title: 'Registro Exitoso',
            text: '¡El usuario ha sido registrado exitosamente!',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Aceptar'
          }).then((result) => {
            if (result.isConfirmed) {
              // Aquí puedes redirigir al usuario a una página específica, si es necesario
            }
          })
    }
    if(tipoAlerta=="Base respaldada"){
        swal({
            icon: 'success',
            title: 'Respaldo Exitoso',
            text: '¡El respaldo se a subido y descargado exitosamente!',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Aceptar'
          }).then((result) => {
            if (result.isConfirmed) {
              // Aquí puedes redirigir al usuario a una página específica, si es necesario
            }
          })
    }
    if(tipoAlerta=="Entrada"){
        swal({
            icon: 'success',
            title: 'Inicio de sesion exitoso'
          })
    }if(tipoAlerta=="Registro"){
        swal({
            icon: 'success',
            title: 'Registro Exitoso',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Aceptar'
          }).then((result) => {
            if (result.isConfirmed) {
              // Aquí puedes redirigir al usuario a una página específica, si es necesario
            }
          })
    }
      
    
}