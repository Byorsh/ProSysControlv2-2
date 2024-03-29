<!-- script que hace que los campos se validen que esten llenos-->
<div class="content-wrapper">
  <div class="page-title">
    <div>
      <h1><i class="fa fa-edit"></i><?= $titulo ?> Usuario</h1>
      <p>Modulo para <?= $titulo ?> usuarios</p>
    </div>
    <div>
      <a class="btn btn-info btn-flat" href="?c=usuario&a=FormCrear&id=<?= $usuarioSQL->getId() ?>">Actualizar <i class="fa fa-lg fa-refresh"></i></a>
      <a class="btn btn-warning btn-flat" href="?c=usuario">Retroceder <i class="fa fa-lg fa-reply"></i></a>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="row">

          <div class="well bs-component">
            <?php
            require_once 'modelos/regex.php';
            $regex = new Regex;
            $camposporllenar = true;
            if ($_SESSION['tipoUsuario'] != 'Admin' || !isset($_SESSION['tipoUsuario'])) {
              include("page-error.php");

              $regex->sweet_alerts("Modulo no permitido");
            } else {
              $tipoUsuarioDefecto = $usuarioSQL->getPrivilegio();
            ?>
              <!--variable de php para verificar si faltan campos por llenar-->
              <form class="form-horizontal" method="POST" action="?c=usuario&a=Guardar">
                <fieldset>
                <legend class="control-label"><?= $titulo ?> Usuario</legend>
                <div class="form-group">
                  <div class="col-md-8">
                    <input class="form-control" name="id" type="hidden" value="<?= $usuarioSQL->getId() ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3" for="Rfc">RFC</label>
                  <div class="col-md-8">
                    <input class="form-control" disabled name="rfc" id="rfc" type="text" placeholder="RFC" value="<?= $usuarioSQL->getRfc() ?>" onkeyup="mayus(this); handleSubmit();"" maxlength=" 13" min="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 97 && event.charCode <= 122))" />
                    <div class="alert alert-danger" role="alert" id="advertenciaRfc" hidden>
                      EL RFC no cumple con un formato valido
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3" for="Nombre">Nombre *</label>
                  <div class="col-md-8">
                    <input class="form-control"disabled name="nombre" id="nombre" type="text" placeholder="Nombre" value="<?= $usuarioSQL->getNombre() ?>" onkeyup="mayus(this); handleSubmit();" maxlength="20" min="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode == 32) || (event.charCode >= 97 && event.charCode <= 122))" />
                    <div class="alert alert-danger" role="alert" id="advertenciaNombre" hidden>
                      El nombre solo debe contener letras y espacio
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3" for="Apellido">Apellido *</label>
                  <div class="col-md-8">
                    <input class="form-control" disabled name="apellido" id="apellido" type="text" placeholder="Apellido" value="<?= $usuarioSQL->getApellido() ?>" onkeyup="mayus(this); handleSubmit();" maxlength="50" min="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode == 32) || (event.charCode >= 97 && event.charCode <= 122))" />
                    <div class="alert alert-danger" role="alert" id="advertenciaApellido" hidden>
                      El usuario unicamente puede contener letras y espacios
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3" for="Telefono">Telefono *</label>
                  <div class="col-md-8">
                    <input class="form-control" disabled name="telefono" id="telefono" type="text" placeholder="Telefono" value="<?= $usuarioSQL->getTelefono() ?>" onkeyup="handleSubmit()" maxlength="10" min="1" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))" />
                    <div class="alert alert-danger" role="alert" id="advertenciaTelefono" hidden>
                      Numero de telefono no valido
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3" for="Email">Correo electronico *</label>
                  <div class="col-md-8">
                    <input class="form-control" disabled name="email" id="correo" type="text" placeholder="email" value="<?= $usuarioSQL->getEmail() ?>" onkeyup="minus(this); handleSubmit();" />
                    <div class="alert alert-danger" role="alert" id="advertenciaCorreo" hidden>
                      Formato de correo electronico no valido <strong>ejemplo@ejemplo.com</strong>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3" for="User">Usuario *</label>
                  <div class="col-md-8">
                    <input class="form-control" disabled name="user" id="usuario" type="text" placeholder="Usuario" value="<?= $usuarioSQL->getUser() ?>" onkeyup="mayus(this); handleSubmit();" maxlength="20" min="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode == 32) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57))" />
                    <div class="alert alert-danger" role="alert" id="advertenciaUsuario" hidden>
                      El usuario unicamente puede contener letras y espacios
                    </div>
                  </div>
                </div>
                <!--<?php if(!$actualizandoBandera ){ 
                  $_GET?>
                <div class="form-group">
                  <label class="control-label col-md-3" for="Contrasenia">Contraseña *</label>
                  <div class="col-md-8">
                    <input class="form-control" disabled name="contrasenia" id="contraseña" type="password" placeholder="Contraseña" value="<?= $usuarioSQL->getContrasenia() ?>" onkeyup="handleSubmit()">
                    <div class="alert alert-danger" role="alert" id="advertenciaContraseña" hidden>
                      Contraseña muy corta
                    </div>
                  </div>
                </div>
                <?php } ?>-->
                <div class="form-group">
                  <label class="control-label col-md-3" for="Privilegio">Nivel de privilegio *</label>
                  <div class="col-md-8">
                    <select class="form-control" disabled name="privilegio" id="nivelprivilegio" onchange="handleSubmit()">
                      <option value selected disabled>Seleccione una opcion</option>
                      <option value="1" <?php if ($tipoUsuarioDefecto == "1") { ?> selected="true" <?php } ?>>Administrador</option>
                      <option value="2" <?php if ($tipoUsuarioDefecto == "2") { ?> selected="true" <?php } ?>>Tecnico</option>
                      <option value="3" <?php if ($tipoUsuarioDefecto == "3") { ?> selected="true" <?php } ?>>Secretaria</option>
                    </select>
                    <br>
                  </div>
                </div>
                
                <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <script src="vistas/usuario/consultar_Usuario.js"></script>