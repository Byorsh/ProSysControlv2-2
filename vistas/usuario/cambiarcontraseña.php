<!-- script que hace que los campos se validen que esten llenos-->
<div class="content-wrapper">
  <div class="page-title">
    <div>
      <h1><i class="fa fa-edit"></i>Cambiar Contraseña Usuario</h1>
      <p>Modulo para cambiar contraseña a usuarios</p>
    </div>
    <div>
      <ul class="breadcrumb">
        <li><i class="fa fa-home fa-lg"></i></li>
        <li>Usuario</li>
        <li><a href="#"><?= $titulo ?> Usuario</a></li>
      </ul>
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

            if (isset($_GET['id']) && $_SESSION['tipoUsuario'] != 'Admin') {
              include("page-error.php");
            } else {

            ?>
              <!--variable de php para verificar si faltan campos por llenar-->
              <form class="form-horizontal" method="POST" id="formcontraseña" action="?c=usuario&a=Guardarcontraseña">
                <legend class="control-label">Cambio de contraseña</legend>
                <div class="form-group">
                  <div class="col-md-8">
                    <input class="form-control" name="id" type="hidden" value="<?= $usuarioSQL->getId() ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="Contrasenia">Nueva Contraseña <p style="color: red;display: inline;">*</p></label>
                  <div class="col-md-8">
                    <input class="form-control" name="contrasenia" id="contraseña" type="password" placeholder="Contraseña" value="" onkeyup="handleSubmit()">
                    <div class="alert alert-danger" role="alert" id="advertenciaContraseña" hidden>
                      Minimo de 7 caracteres requerido
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3" for="Contrasenia">Repite la Contraseña <p style="color: red;display: inline;">*</p></label>
                  <div class="col-md-8">
                    <input class="form-control" name="contrasenia validada" id="contraseña2" type="password" placeholder="Contraseña" value="" onkeyup="handleSubmit()">
                    <div class="alert alert-danger" role="alert" id="advertenciaContraseña2" hidden>
                      Contraseña no coincide
                    </div>
                  </div>
                </div>
                <div class="col-lg-10 col-lg-offset-2">
                  <button class="btn btn-primary" type="button" id="submitButton" disabled onclick="Guardar()">Enviar</button>
                  <button class="btn btn-default" type="reset" onclick="handleBloquearSubmit()">Limpiar</button>
                  <button class="btn btn-danger" type="button" onclick="handleCancelar()">Cancelar</button>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
    <script src="vistas/usuario/cambiar_Contraseña.js"></script>
  <?php  } ?>