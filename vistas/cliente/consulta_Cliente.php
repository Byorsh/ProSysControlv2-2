<div class="content-wrapper">
  <div class="page-title">
    <div>
      <h1><i class="fa fa-edit"></i><?=$titulo?> Cliente</h1>
      <p>Modulo para <?=$titulo?> clientes</p>
    </div>
    <div>
    <a class="btn btn-info btn-flat" href="?c=cliente&a=FormCrear&id=<?=$clienteSQL->getId()?>">Actualizar <i class="fa fa-lg fa-refresh"></i></a> 
    <a class="btn btn-warning btn-flat" href="?c=cliente">Retroceder <i class="fa fa-lg fa-reply"></i></a>
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
                  </div>

                  <div class="form-group">
                  <label class="control-label col-md-3" for="Rfc" >RFC </label>
                  <div class="col-md-8">
                    <input class="form-control" name="rfc" id="rfc" type="text" placeholder="Introduce el rfc del cliente" pattern="^([a-zA-ZÑ\x26]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1]))([a-zA-Z\d]{3})?$" value="<?=$clienteSQL->getRfc()?>" disabled>
                  </div>
                  </div>

                  <div class="form-group">
                  <label class="control-label col-md-3" for="NombreCliente">Nombre *</label>
                  <div class="col-md-8">
                    <input class="form-control" name="nombreCliente" id="nombreCliente" type="text" placeholder="Nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ. ]{2,20}" value="<?=$clienteSQL->getNombre()?>" required="" disabled>
                  </div>
                  </div>

                  <div class="form-group">
                  <label class="control-label col-md-3" for="ApellidosC">Apellidos *</label>
                  <div class="col-md-8">
                    <input class="form-control" name="apellidosC" id="apellidoPaterno" type="text" placeholder="Apellidos" value="<?= $clienteSQL->getApellidos() ?>" onchange="handleSubmit()" maxlength="30" min="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))" disabled>
                    <div class="alert alert-danger" role="alert" id="advertenciaApellidoPaterno" hidden>
                      Los apellidos unicamente pueden contener letras y espacios
                    </div>
                  </div>
                </div>

                  <div class="form-group">
                  <label class="control-label col-md-3" for="NombreEmpresa">Nombre de la empresa</label>
                  <div class="col-md-8">
                    <input class="form-control" name="nombreEmpresa" id="nombreEmpresa" type="text" placeholder="Nombre de la Empresa" value="<?=$clienteSQL->getNombreEmpresa()?>" disabled>
                  </div>
                  </div>

                  <div class="form-group">
                  <label class="control-label col-md-3" for="Telefono">Telefono *</label>
                  <div class="col-md-8">
                    <input class="form-control" name="telefono" id="telefono" type="text" placeholder="Telefono" value="<?=$clienteSQL->getTelefono()?>" required="" disabled>
                  </div>
                  </div>

                  <div class="form-group">
                  <label class="control-label col-md-3" for="NombreEmpresa">Email *</label>
                  <div class="col-md-8">
                    <input class="form-control" name="email" id="email" type="text" placeholder="Correo Electronico" pattern="^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$" value="<?=$clienteSQL->getEmail()?>" required="" disabled>
                  </div>
                  </div>

                  <div class="form-group">
                  <label class="control-label col-md-3" for="NombreEmpresa">Domicilio</label>
                  <div class="col-md-8">
                    <input class="form-control" name="domicilio" id="domicilio" type="text" placeholder="Domicilio" value="<?=$clienteSQL->getDomicilio()?>" disabled>
                  </div>
                  </div>
                  
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