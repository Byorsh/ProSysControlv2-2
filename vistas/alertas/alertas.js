
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
    
    /*swal({
        title:"Atencion",
        text:"Faltan campos por llenar",
        icon:"warning",
        buttons:false,
        dangerMode: true,
    })
    .then((willDelete)=>{
        if(willDelete){
            swal("C mamut", {
                icon: "success",
            });
        }else{
            swal("c paput");
        }
    }); */
}