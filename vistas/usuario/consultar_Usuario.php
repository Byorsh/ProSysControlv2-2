<!-- script que hace que los campos se validen que esten llenos-->
<script>
                            function toggleButton()
                            {
                                var nombre = document.getElementById('nombre').value;
                                var apellido = document.getElementById('apellido').value;
                                var telefono = document.getElementById('telefono').value;
                                var correo = document.getElementById('correo').value;
                                var usuariou = document.getElementById('usuariou').value;
                                var contraseña = document.getElementById('contraseña').value;
                                var nivelprivilegio = document.getElementById('nivelprivilegio').value;
                
                                if (nombre && apellido && telefono && correo && usuariou && contraseña ) {
                                    document.getElementById('submitButton').disabled = false;
                                    document.getElementById('advertencia').className = "hidden";
                                    //agregar un handler al boton de enviar que faltan campos o colocar como visible
                                    <?php $camposporllenar = true?>
                                } else {
                                    document.getElementById('submitButton').disabled = true;
                                    document.getElementById('advertencia').className = "col-md-3";
                                    <?php $camposporllenar = false?>
                                }
                            }
                        </script>
                        
<div class="content-wrapper">
  <div class="page-title">
    <div>
      <h1><i class="fa fa-edit"></i><?=$titulo?> Usuario</h1>
      <p>Modulo para <?=$titulo?> usuarios</p>
    </div>
    <div>
    <a class="btn btn-info btn-flat" href="?c=usuario&a=FormCrear&id=<?=$usuarioSQL->getId()?>"><i class="fa fa-lg fa-refresh"></i></a> 
    <a class="btn btn-warning btn-flat" href="?c=usuario"><i class="fa fa-lg fa-reply"></i></a>
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
              if($_SESSION['tipoUsuario']!='Admin' || !isset($_SESSION['tipoUsuario'])){
                include("page-error.php");

                $regex->sweet_alerts("Modulo no permitido");
              }
              else{
              $tipoUsuarioDefecto = $usuarioSQL->getPrivilegio();
              ?>
              <!--variable de php para verificar si faltan campos por llenar-->
              <form class="form-horizontal" method="POST" action="?c=usuario&a=Guardar">
                <fieldset>
                <legend><?=$titulo?> Usuario</legend>
                    <div class="form-group">
                      <div class="col-lg-10">
                        <input class="form-control" name="id" type="hidden" value="<?=$usuarioSQL->getId()?>" disabled>
                      </div>
                    <div class="form-group">
                      <label class="control-label col-md-3" for="Rfc">RFC</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="rfc" type="text" pattern="^([A-ZÑ\x26]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1]))([A-Z\d]{3})?$" placeholder="RFC" value="<?=$usuarioSQL->getRfc()?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3" for="Nombre">Nombre *</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="nombre" id="nombre" type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ. ]{3,20}" placeholder="Nombre" value="<?=$usuarioSQL->getNombre()?>" onchange="toggleButton()" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3" for="Apellido">Apellido *</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="apellido" id="apellido" type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ. ]{2,20}" placeholder="Apellido" value="<?=$usuarioSQL->getApellido()?>" onchange="toggleButton()" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3" for="Telefono">Telefono *</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="telefono" id="telefono" type="text" placeholder="Telefono" pattern="[0-9]{10,13}" value="<?=$usuarioSQL->getTelefono()?>" onchange="toggleButton()" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3" for="Email">Correo electronico *</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="email" id="correo" type="text" pattern="^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$" placeholder="email" value="<?=$usuarioSQL->getEmail()?>" onchange="toggleButton()" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3" for="User">Usuario *</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="user" id="usuariou" type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ. ]{3,20}" placeholder="Usuario" value="<?=$usuarioSQL->getUser()?>" required="" onchange="toggleButton()" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3" for="Contrasenia">Contraseña *</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="contrasenia" id="contraseña" type="password" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{7,20}" placeholder="Contraseña" value="<?=$usuarioSQL->getContrasenia()?>" required="" onchange="toggleButton()" disabled>
                        </div>
                    </div>
                      <!--<label class="control-label col-md-3" for="Contrasenia2">Confirma tu Contraseña</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="contrasenia2" type="password" placeholder="Contraseña">
                        </div>-->

                        
                      <label class="control-label col-md-3" for="Privilegio">Nivel de privilegio</label>
                        <div class="col-lg-10">
                          <select class="form-control" name="privilegio" id="nivelprivilegio" required="" onchange="toggleButton()" disabled>
                            <option value selected disabled>Seleccione una opcion </option>
                            <option value="1" <?php if($tipoUsuarioDefecto=="1"){ ?> selected="true" <?php } ?>>Administrador</option>
                            <option value="2" <?php if($tipoUsuarioDefecto=="2"){ ?> selected="true" <?php } ?>>Tecnico</option>
                            <option value="3" <?php if($tipoUsuarioDefecto=="3"){ ?> selected="true" <?php } ?>>Secretaria</option>
                            
                          </select><br>
                          
                   
                        </div>
                        <!--Se muestra si faltan campos-->
                
                        
                    </div>
                    <?php } ?>
        </div>
      </div>
    </div>
  </div>