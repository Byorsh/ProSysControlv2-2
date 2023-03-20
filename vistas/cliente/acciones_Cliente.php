<div class="content-wrapper">
  <div class="page-title">
    <div>
    <h1><i class="fa fa-edit"></i><?=$titulo?> Cliente</h1>
      <p>Modulo para <?=$titulo?> clientes</p>
    </div>
    <div>
      <ul class="breadcrumb">
        <li><i class="fa fa-home fa-lg"></i></li>
        <li>Clientes</li>
        <li><a href="#"><?=$titulo?> Cliente</a></li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="row">
          
            <div class="well bs-component">
                <form class="form-horizontal" method="POST" action="?c=cliente&a=Guardar">
                <fieldset>
                <legend>Registro del Cliente</legend>
                    
                    <div class="form-group">
                        <div class="col-lg-10">
                        <input class="form-control" name="idClientes" type="hidden" value="<?=$clienteSQL->getId()?>">
                      </div>
                    </div>

                    <div class="form-group">
                    <label class="control-label col-md-3" for="Rfc" >RFC </label>
                    <div class="col-md-8">
                      <input class="form-control" name="rfc" id="rfc" type="text" placeholder="Introduce el rfc del cliente" pattern="^([a-zA-ZÑ\x26]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1]))([a-zA-Z\d]{3})?$" value="<?=$clienteSQL->getRfc()?>">
                    </div>
                    </br>
                    </div>

                 
                    <div class="form-group">
                    <label class="control-label col-md-3" for="NombreCliente">Nombre *</label>
                    <div class="col-md-8">
                      <input class="form-control" name="nombreCliente" id="nombreCliente" type="text" placeholder="Nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ. ]{2,20}" value="<?=$clienteSQL->getNombre()?>" required="">
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="control-label col-md-3" for="ApellidoP">Apellido Paterno *</label>
                    <div class="col-md-8">
                      <input class="form-control" name="apellidoP" id="apellidoP" type="text" placeholder="Apellido Paterno" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ. ]{2,20}" value="<?=$clienteSQL->getApellidoP()?>" required="">
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="control-label col-md-3" for="ApellidoM">Apellido Materno *</label>
                    <div class="col-md-8">
                      <input class="form-control" name="apellidoM" id="apellidoM" type="text" placeholder="Apellido Materno" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ. ]{2,20}" value="<?=$clienteSQL->getApellidoM()?>" required="">
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="control-label col-md-3" for="NombreEmpresa">Nombre de la empresa</label>
                    <div class="col-md-8">
                      <input class="form-control" name="nombreEmpresa" id="nombreEmpresa" type="text" placeholder="Nombre de la Empresa" value="<?=$clienteSQL->getNombreEmpresa()?>">
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="control-label col-md-3" for="Telefono">Telefono *</label>
                    <div class="col-md-8">
                      <input class="form-control" name="telefono" id="telefono" type="text" placeholder="Telefono" value="<?=$clienteSQL->getTelefono()?>" required="">
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="control-label col-md-3" for="NombreEmpresa">Email *</label>
                    <div class="col-md-8">
                      <input class="form-control" name="email" id="email" type="text" placeholder="Correo Electronico" pattern="^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$" value="<?=$clienteSQL->getEmail()?>" required="">
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="control-label col-md-3" for="NombreEmpresa">Domicilio</label>
                    <div class="col-md-8">
                      <input class="form-control" name="domicilio" id="domicilio" type="text" placeholder="Domicilio" value="<?=$clienteSQL->getDomicilio()?>">
                    </div>
                    </div>
                    
                    <div>
                        <label class="col-md-3" for=""></label>
                        <label class="col-md-3" for=""></label>
                        <label class="col-md-3" for=""></label>
                      </div>
                        <div class="col-lg-10 col-lg-offset-2">
                          <button class="btn btn-default" type="button" onclick="cancelarCliente()">Cancelar</button>
                          <button class="btn btn-default" type="reset">Limpiar</button>
                          <button class="btn btn-primary" type="submit">Enviar</button>
                        </div>
                    </div>
        </div>
      </div>
    </div>
  </div>
  <form class="form-horizontal" method="POST" action="?c=taller&a=Guardar">
    <fieldset>
    
    <fieldset>
  </form>
 
  <script>
    //funcion para regresar en cancelar------------------------------
    function cancelarCliente()         
    {
      //aqui la direccion a cambiar----------------------------------
      var result = confirm("¿Deseas regresar a la lista y deshacer el registro?");
      if (result == true) {
        window.location.href ='?c=cliente';
      } else {
          
      }
    }
  </script>  
