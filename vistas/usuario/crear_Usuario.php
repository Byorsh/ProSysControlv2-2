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
      <ul class="breadcrumb">
        <li><i class="fa fa-home fa-lg"></i></li>
        <li>Usuario</li>
        <li><a href="#"><?=$titulo?> Usuario</a></li>
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
                        <input class="form-control" name="id" type="hidden" value="<?=$usuarioSQL->getId()?>">
                      </div>

                      <label class="col-md-3" for="Rfc">RFC</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="rfc" type="text" pattern="^([A-ZÑ\x26]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1]))([A-Z\d]{3})?$" placeholder="RFC" value="<?=$usuarioSQL->getRfc()?>">
                        </div>
                      
                      <label class="col-md-3 " for="Nombre">Nombre *</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="nombre" id="nombre" type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ. ]{3,20}" placeholder="Nombre" value="<?=$usuarioSQL->getNombre()?>" onchange="toggleButton()">
                        </div>

                      <label class="col-md-3 " for="Apellido">Apellido *</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="apellido" id="apellido" type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ. ]{2,20}" placeholder="Apellido" value="<?=$usuarioSQL->getApellido()?>" onchange="toggleButton()">
                        </div>

                      <label class="col-md-3 " for="Telefono">Telefono *</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="telefono" id="telefono" type="text" placeholder="Telefono" pattern="[0-9]{10,13}" value="<?=$usuarioSQL->getTelefono()?>" onchange="toggleButton()">
                        </div>

                      <label class="col-md-3" for="Email">Correo electronico *</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="email" id="correo" type="text" pattern="^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$" placeholder="email" value="<?=$usuarioSQL->getEmail()?>" onchange="toggleButton()">
                        </div>

                      <label class="col-md-3" for="User">Usuario *</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="user" id="usuariou" type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ. ]{3,20}" placeholder="Usuario" value="<?=$usuarioSQL->getUser()?>" required="" onchange="toggleButton()">
                        </div>

                      <label class="col-md-3" for="Contrasenia">Contraseña *</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="contrasenia" id="contraseña" type="password" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{7,20}" placeholder="Contraseña" value="<?=$usuarioSQL->getContrasenia()?>" required="" onchange="toggleButton()" >
                        </div>

                      <!--<label class="col-md-3" for="Contrasenia2">Confirma tu Contraseña</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="contrasenia2" type="password" placeholder="Contraseña">
                        </div>-->

                        
                      <label class="col-md-3" for="Privilegio">Nivel de privilegio</label>
                        <div class="col-lg-10">
                          <select class="form-control" name="privilegio" id="nivelprivilegio" required="" onchange="toggleButton()">
                            <option value selected disabled>Seleccione una opcion</option>
                            <option value="1" <?php if($tipoUsuarioDefecto=="1"){ ?> selected="true" <?php } ?>>Administrador</option>
                            <option value="2" <?php if($tipoUsuarioDefecto=="2"){ ?> selected="true" <?php } ?>>Tecnico</option>
                            <option value="3" <?php if($tipoUsuarioDefecto=="3"){ ?> selected="true" <?php } ?>>Secretaria</option>
                            
                          </select><br>
                          
                   
                        </div>
                        <!--Se muestra si faltan campos-->
                        <label class="col-md-3" id="advertencia" ><?php if($camposporllenar){echo("Faltan campos por llenar");}?></label>

                        <div class="col-lg-10 col-lg-offset-2">
                          <button class="btn btn-default" type="button" onclick="cancelarUsuario()">Cancelar</button>
                          <button class="btn btn-default" type="reset">Limpiar</button>
                          <button class="btn btn-primary" type="submit" id="submitButton" disabled>Enviar</button>
                          
                        </div>
                        
                    </div>
                    <?php } ?>
                  
                  <!--<div class="form-group">
                    <label class="control-label" for="inputDefault">RFC</label>
                    <input class="form-control" id="inputDefault" type="text">
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label" for="inputEmail">Email</label>
                    <div class="col-lg-10">
                      <input class="form-control" id="inputEmail" type="text" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label" for="inputPassword">Password</label>
                    <div class="col-lg-10">
                      <input class="form-control" id="inputPassword" type="password" placeholder="Password">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox">Checkbox
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label" for="textArea">Textarea</label>
                    <div class="col-lg-10">
                      <textarea class="form-control" id="textArea" rows="3"></textarea><span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Radios</label>
                    <div class="col-lg-10">
                      <div class="radio">
                        <label>
                          <input id="optionsRadios1" type="radio" name="optionsRadios" value="option1" checked="">Option one is this
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input id="optionsRadios2" type="radio" name="optionsRadios" value="option2">Option two can be something else
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label" for="select">Selects</label>
                    <div class="col-lg-10">
                      <select class="form-control" id="select">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select><br>
                      <select class="form-control" multiple="">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      <button class="btn btn-default" type="reset">Cancel</button>
                      <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
          <div class="col-lg-4 col-lg-offset-1">
            <form class="bs-component">
              <div class="form-group">
                <label class="control-label" for="inputDefault">RFC</label>
                <input class="form-control" id="inputDefault" type="text">
              </div>
              <div class="form-group">
                <label class="control-label" for="focusedInput">Focused input</label>
                <input class="form-control" id="focusedInput" type="text" value="This is focused...">
              </div>
              <div class="form-group">
                <label class="control-label" for="disabledInput">Disabled input</label>
                <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input here..." disabled="">
              </div>
              <div class="form-group has-warning">
                <label class="control-label" for="inputWarning">Input warning</label>
                <input class="form-control" id="inputWarning" type="text">
              </div>
              <div class="form-group has-error">
                <label class="control-label" for="inputError">Input error</label>
                <input class="form-control" id="inputError" type="text">
              </div>
              <div class="form-group has-success">
                <label class="control-label" for="inputSuccess">Input success</label>
                <input class="form-control" id="inputSuccess" type="text">
              </div>
              <div class="form-group">
                <label class="control-label" for="inputLarge">Large input</label>
                <input class="form-control input-lg" id="inputLarge" type="text">
              </div>
              <div class="form-group">
                <label class="control-label" for="inputDefault">Default input</label>
                <input class="form-control" id="inputDefault" type="text">
              </div>
              <div class="form-group">
                <label class="control-label" for="inputSmall">Small input</label>
                <input class="form-control input-sm" id="inputSmall" type="text">
              </div>
              <div class="form-group">
                <label class="control-label">Input addons</label>
                <div class="input-group"><span class="input-group-addon">$</span>
                  <input class="form-control" type="text"><span class="input-group-btn">
                    <button class="btn btn-default" type="button">Button</button></span>
                </div>
              </div>
            </form>
          </div>-->
        </div>
      </div>
    </div>
  </div>
  <script>
                            //funcion para regresar en cancelar------------------------------
                            function cancelarUsuario()         
                            {
                              //aqui la direccion a cambiar----------------------------------
                              var result = confirm("¿Deseas regresar a la lista y deshacer el registro?");
                              if (result == true) {
                                window.location.href ='?c=usuario';
                              } else {
                                  
                              }
                              
                            }
                        </script> 