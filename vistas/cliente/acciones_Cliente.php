<div class="content-wrapper">
  <div class="page-title">
    <div>
      <h1><i class="fa fa-edit"></i><?= $titulo ?> Cliente</h1>
      <p>Modulo para <?= $titulo ?> clientes</p>
    </div>
    <div>
      <ul class="breadcrumb">
        <li><i class="fa fa-home fa-lg"></i></li>
        <li>Clientes</li>
        <li><a href="#"><?= $titulo ?> Cliente</a></li>
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
                    <input class="form-control" name="idClientes" type="hidden" value="<?= $clienteSQL->getId() ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="Rfc">RFC </label>
                  <div class="col-md-8">
                    <input class="form-control" name="rfc" id="rfc" type="text" placeholder="Introduce el rfc del cliente" value="<?= $clienteSQL->getRfc() ?>" onchange="handleSubmit(); mayus(this);" maxlength="15" min="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 97 && event.charCode <= 122))">
                    <div class="alert alert-danger" role="alert" id="advertenciaRfc" hidden>
                      EL RFC no cumple con un formato valido
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="NombreCliente">Nombre *</label>
                  <div class="col-md-8">
                    <input class="form-control" name="nombreCliente" id="nombre" type="text" placeholder="Nombre" value="<?= $clienteSQL->getNombre() ?>" onchange="handleSubmit()" maxlength="30" min="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))">
                    <div class="alert alert-danger" role="alert" id="advertenciaCliente" hidden>
                      El nombre solo debe contener letras y espacio
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="ApellidoP">Apellido Paterno *</label>
                  <div class="col-md-8">
                    <input class="form-control" name="apellidoP" id="apellidoPaterno" type="text" placeholder="Apellido Paterno" value="<?= $clienteSQL->getApellidoP() ?>" onchange="handleSubmit()" maxlength="30" min="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))">
                    <div class="alert alert-danger" role="alert" id="advertenciaApellidoPaterno" hidden>
                      El usuario unicamente puede contener letras y espacios
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="ApellidoM">Apellido Materno *</label>
                  <div class="col-md-8">
                    <input class="form-control" name="apellidoM" id="apellidoMaterno" type="text" placeholder="Apellido Materno" value="<?= $clienteSQL->getApellidoM() ?>" onchange="handleSubmit()" maxlength="30" min="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))">
                    <div class="alert alert-danger" role="alert" id="advertenciaApellidoMaterno" hidden>
                      El usuario unicamente puede contener letras y espacios
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="NombreEmpresa">Nombre de la empresa</label>
                  <div class="col-md-8">
                    <input class="form-control" name="nombreEmpresa" id="nombreEmpresa" type="text" placeholder="Nombre de la Empresa" value="<?= $clienteSQL->getNombreEmpresa() ?>" onchange="handleSubmit()" maxlength="30" min="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 32 && event.charCode <= 46) )">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="Telefono">Telefono *</label>
                  <div class="col-md-8">
                    <input class="form-control" name="telefono" id="telefono" type="text" placeholder="Telefono" value="<?= $clienteSQL->getTelefono() ?>" onchange="handleSubmit()" maxlength="10" min="1" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))">
                    <div class="alert alert-danger" role="alert" id="advertenciaTelefono" hidden>
                      Numero de telefono invalido
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="NombreEmpresa">Email *</label>
                  <div class="col-md-8">
                    <input class="form-control" name="email" id="email" type="text" placeholder="Correo Electronico" value="<?= $clienteSQL->getEmail() ?>" onchange="handleSubmit()">
                    <div class="alert alert-danger" role="alert" id="advertenciaEmail" hidden>
                      Formato de correo electronico no valido <strong>ejemplo@ejemplo.com</strong>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="NombreEmpresa">Domicilio</label>
                  <div class="col-md-8">
                    <input class="form-control" name="domicilio" id="domicilio" type="text" placeholder="Domicilio" value="<?= $clienteSQL->getDomicilio() ?>" onchange="handleSubmit()" maxlength="30" min="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 32 && event.charCode <= 47))">
                  </div>
                </div>

                <div>
                  <div class="col-lg-10 col-lg-offset-2">
                    <button class="btn btn-primary" type="submit" id="submitButton" disabled>Enviar</button>
                    <button class="btn btn-default" type="reset" onclick="handleBloquearSubmit()">Limpiar</button>
                    <button class="btn btn-default" type="button" onclick="handleCancelar()">Cancelar</button>
                  </div>
                </div>
          </div>
        </div>
      </div>
    </div>

    <script src="vistas/cliente/acciones_Cliente.js"></script>