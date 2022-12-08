<div class="content-wrapper">
  <div class="page-title">
    <div>
      <h1><i class="fa fa-edit"></i><?=$titulo?> Cliente</h1>
      <p>Modulo para <?=$titulo?> clientes</p>
    </div>
    <div>
    <a class="btn btn-info btn-flat" href="?c=cliente&a=FormCrear&id=<?=$clienteSQL->getId()?>"><i class="fa fa-lg fa-refresh"></i></a> 
        <a class="btn btn-warning btn-flat" onclick = "return confirm('¿Realmente desea eliminar?')" href="?c=cliente&a=Borrar&id=<?=$clienteSQL->idClientes?>"><i class="fa fa-lg fa-trash" ></i></a>
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
                          <input class="form-control" name="rfc" type="text" pattern="^([A-ZÑ\x26]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1]))([A-Z\d]{3})?$" placeholder="RFC" value="<?=$clienteSQL->getRfc()?>" disabled>
                        </div>
                      
                      <label class="col-md-3 " for="NombreCliente">Nombre *</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="nombreCliente" type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ. ]{3,20}" placeholder="Nombre" value="<?=$clienteSQL->getNombre()?>" required="" disabled>
                        </div>

                      <label class="col-md-3 " for="ApellidoP">Apellido Paterno *</label>
                        <div class="col-lg-10">
                        <input class="form-control" name="apellidoP" type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ. ]{2,20}" placeholder="Apellido" value="<?=$clienteSQL->getApellidoP()?>" required="" disabled>
                        </div>

                        <label class="col-md-3 " for="ApellidoM">Apellido Materno *</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="apellidoM" type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ. ]{2,20}" placeholder="Apellido" value="<?=$clienteSQL->getApellidoM()?>" disabled>
                        </div>

                      <label class="col-md-3 " for="NombreEmpresa">Nombre de la empresa</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="nombreEmpresa" type="text" placeholder="NombreEmpresa" value="<?=$clienteSQL->getNombreEmpresa()?>" disabled>
                        </div>

                      <label class="col-md-3" for="Telefono">Telefono *</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="telefono" type="text" pattern="[0-9]{10,13}" placeholder="Telefono" value="<?=$clienteSQL->getTelefono()?>" required="" disabled>
                        </div>

                      <label class="col-md-3" for="Email">Email *</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="email" type="text" pattern="^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$" placeholder="email" value="<?=$clienteSQL->getEmail()?>" required="" disabled>
                        </div>

                      <label class="col-md-3" for="Domicilio">Domicilio</label>
                        <div class="col-lg-10">
                        <input class="form-control" name="domicilio" type="text" pattern="{0,100}" placeholder="Domicilio" value="<?=$clienteSQL->getDomicilio()?>" disabled>
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
                        
                    </div>
                  
                  
        </div>
      </div>
    </div>
  </div>