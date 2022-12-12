<div class="content-wrapper">
  <div class="page-title">
    <div>
      <h1><i class="fa fa-edit"></i><?=$titulo?> Cliente</h1>
      <p>Modulo para <?=$titulo?> clientes</p>
    </div>
    <div>
      <ul class="breadcrumb">
        <li><i class="fa fa-home fa-lg"></i></li>
        <li>Cliente</li>
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
                <legend><?=$titulo?> Cliente</legend>
                    <div class="form-group">
                      <div class="col-lg-10">
                        <input class="form-control" name="idClientes" type="hidden" value="<?=$clienteSQL->getId()?>">
                      </div>

                      <label class="col-md-3" for="Rfc">RFC</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="rfc" type="text" pattern="^([a-zA-ZÑ\x26]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1]))([a-zA-Z\d]{3})?$" placeholder="RFC" value="<?=$clienteSQL->getRfc()?>">
                        </div>
                      
                      <label class="col-md-3 " for="NombreCliente">Nombre *</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="nombreCliente" type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ. ]{3,20}" placeholder="Nombre" value="<?=$clienteSQL->getNombre()?>" required="">
                        </div>

                      <label class="col-md-3 " for="ApellidoP">Apellido Paterno *</label>
                        <div class="col-lg-10">
                        <input class="form-control" name="apellidoP" type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ. ]{2,20}" placeholder="Apellido" value="<?=$clienteSQL->getApellidoP()?>" required="">
                        </div>

                        <label class="col-md-3 " for="ApellidoM">Apellido Materno *</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="apellidoM" type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ. ]{2,20}" placeholder="Apellido" value="<?=$clienteSQL->getApellidoM()?>" >
                        </div>

                      <label class="col-md-3 " for="NombreEmpresa">Nombre de la empresa</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="nombreEmpresa" type="text" placeholder="NombreEmpresa" value="<?=$clienteSQL->getNombreEmpresa()?>" >
                        </div>

                      <label class="col-md-3" for="Telefono">Telefono *</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="telefono" type="text" pattern="[0-9]{10,13}" placeholder="Telefono" value="<?=$clienteSQL->getTelefono()?>" required="">
                        </div>

                      <label class="col-md-3" for="Email">Email *</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="email" type="text" pattern="^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$" placeholder="email" value="<?=$clienteSQL->getEmail()?>" required="">
                        </div>

                      <label class="col-md-3" for="Domicilio">Domicilio</label>
                        <div class="col-lg-10">
                        <input class="form-control" name="domicilio" type="text" pattern="{0,100}" placeholder="Domicilio" value="<?=$clienteSQL->getDomicilio()?>">
                        </div>

                      <!--<label class="col-md-3" for="Contrasenia2">Confirma tu Contraseña</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="contrasenia2" type="password" placeholder="Contraseña">
                        </div>-->

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