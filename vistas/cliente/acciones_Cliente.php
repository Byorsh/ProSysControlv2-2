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
        <li><a href="#"><?= $titulo ?> Cliente  </a></li>
        <button class="btn btn-danger" type="button" onclick="handleCancelar()">Retroceder <i class="fa fa-lg fa-reply"></i></button>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="row">

          <div class="well bs-component">
            <form class="form-horizontal"  id="formcliente" method="POST" action="?c=cliente&a=Guardar">
              <fieldset>
                <h3 class="control-label">Registro del Cliente</h3>
                <hr/>
                <div class="form-group">
                  <div class="col-lg-10">
                    <input class="form-control" name="idClientes" type="hidden" value="<?= $clienteSQL->getId() ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="Rfc" >RFC </label>
                  <div class="col-md-8">
                    <input class="form-control" name="rfc" id="rfc" type="text" placeholder="Introduce el rfc del cliente" value="<?= $clienteSQL->getRfc() ?>" onkeyup="mayus(this); handleSubmit();" maxlength="13" min="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 97 && event.charCode <= 122))">
                    <div class="alert alert-danger" role="alert" id="advertenciaRfc" hidden>
                      EL RFC no cumple con un formato valido
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="NombreCliente">Nombre *</label>
                  <div class="col-md-8">
                    <input class="form-control" name="nombreCliente" id="nombre" type="text" placeholder="Nombre" value="<?= $clienteSQL->getNombre() ?>" onkeyup="mayus(this); handleSubmit();" maxlength="49" min="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32)
                     || (event.charCode >= 160 && event.charCode <= 165) || (event.charCode == 224) || (event.charCode == 181) || (event.charCode == 130) || (event.charCode == 233) || (event.charCode == 144) || (event.charCode == 214))">
                    <div class="alert alert-danger" role="alert" id="advertenciaCliente" hidden>
                      El nombre solo debe contener letras y espacio, Mínimo de 4 caracteres
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="ApellidosC">Apellidos *</label>
                  <div class="col-md-8">

                    <input class="form-control" name="apellidosC" id="apellidos" type="text" placeholder="Apellidos" value="<?= $clienteSQL->getApellidos() ?>" onkeyup="handleSubmit(); mayus(this);" maxlength="49" min="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32)
                     || (event.charCode >= 160 && event.charCode <= 165) || (event.charCode == 224) || (event.charCode == 181) || (event.charCode == 130) || (event.charCode == 233) || (event.charCode == 144) || (event.charCode == 214))">
                    <div class="alert alert-danger" role="alert" id="advertenciaApellidos" hidden>
                      Los apellidos unicamente pueden contener letras y espacios, Mínimo de 4 caracteres
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="NombreEmpresa">Nombre de la empresa</label>
                  <div class="col-md-8">
                    <input class="form-control" name="nombreEmpresa" id="nombreEmpresa" type="text" placeholder="Nombre de la Empresa" value="<?= $clienteSQL->getNombreEmpresa() ?>" onkeyup="mayus(this); handleSubmit();" maxlength="70" min="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) 
                    || (event.charCode == 46) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 160 && event.charCode <= 165) || (event.charCode == 224) || (event.charCode == 181) || (event.charCode == 130) || (event.charCode == 233) || (event.charCode == 144) || (event.charCode == 214))">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="Telefono">Telefono *</label>
                  <div class="col-md-8">
                    <input class="form-control" name="telefono" id="telefono" type="text" placeholder="Telefono" value="<?= $clienteSQL->getTelefono() ?>" onkeyup="handleSubmit()" maxlength="10" min="1" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))">
                    <div class="alert alert-danger" role="alert" id="advertenciaTelefono" hidden>
                      Numero de telefono invalido
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="NombreEmpresa">Email *</label>
                  <div class="col-md-8">
                    <input class="form-control" name="email" id="email" type="text" placeholder="Correo Electronico" value="<?= $clienteSQL->getEmail() ?>" maxlength="70" onkeyup="minus(this); handleSubmit();">
                    <div class="alert alert-danger" role="alert" id="advertenciaEmail" hidden>
                      Formato de correo electronico no valido <strong>ejemplo@ejemplo.com</strong>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="NombreEmpresa">Domicilio</label>
                  <div class="col-md-8">
                    <input class="form-control" name="domicilio" id="domicilio" type="text" placeholder="Domicilio" value="<?= $clienteSQL->getDomicilio() ?>" onkeyup="mayus(this); handleSubmit();" maxlength="149" min="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57) 
                    || (event.charCode == 46) || (event.charCode == 32) || (event.charCode == 35) || (event.charCode >= 160 && event.charCode <= 165) || (event.charCode == 224) || (event.charCode == 181) || (event.charCode == 130) || (event.charCode == 233) || (event.charCode == 144) || (event.charCode == 214))">
                  </div>
                </div>

                <div>
                  <div class="control-label">
                    <button class="btn btn-primary" type="button" id="submitButton" onclick="Guardar()" disabled>Enviar</button>
                    <button class="btn btn-default" type="reset" onclick="handleBloquearSubmit()">Limpiar</button>
                    <button class="btn btn-danger" type="button" onclick="handleCancelar()">Cancelar</button>
                  </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="vistas/cliente/acciones_Cliente.js"></script>