<!-- script que hace que los campos se validen que esten llenos-->
                        <script>
                            let patrones = {
                              rfc: /^[A-ZÑ&]{4}\d{6}[A-Z0-9]{3}$/,
                              nombre: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ. $]{3,20}/,
                              apellido: /[a-zA-ZáéíóúÁÉÍÓÚñÑ. ]{3,20}/,
                              telefono: /[0-9]{10,13}/,
                              correo: /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/,
                              usuario: /[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ. ]{3,20}/,
                              password: /[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{7,20}/
                            }


                            function toggleButton()
                            {
                              //validar datos ingresados
                              let rfc = patrones.rfc.test(document.getElementById('rfc'));
                              let nombre = patrones.nombre.test(document.getElementById('nombre').value);
                              let apellido = patrones.apellido.test(document.getElementById('apellido').value);
                              let telefono = patrones.telefono.test(document.getElementById('telefono').value);
                              let correo = patrones.correo.test(document.getElementById('correo').value);
                              let usuario = patrones.usuario.test(document.getElementById('usuario').value);
                              let password = patrones.password.test(document.getElementById('contraseña').value);
                              let nivelprivilegio = document.getElementById('nivelprivilegio').value;
                              
                              //Se valida que los campos no esten vacios y con su correspondiente formato
                              //RFC no acepta ninguna entrada
                              if (document.getElementById('rfc').value != "") {
                                rfc ? 
                                  document.getElementById('advertencia-rfc').hidden = true :
                                  document.getElementById('advertencia-rfc').hidden = false;
                              }

                              if (document.getElementById('nombre').value != "") {
                                nombre ? 
                                  document.getElementById('advertencia-nombre').hidden = true :
                                  document.getElementById('advertencia-nombre').hidden = false;  
                              }
                              
                              if (document.getElementById('apellido').value != "") {
                                apellido ? 
                                  document.getElementById('advertencia-apellido').hidden = true :
                                  document.getElementById('advertencia-apellido').hidden = false; 
                              }
                              
                              if (document.getElementById('telefono').value != "") {
                                telefono ? 
                                  document.getElementById('advertencia-telefono').hidden = true :
                                  document.getElementById('advertencia-telefono').hidden = false; 
                              }
                                
                              if (document.getElementById('correo').value != "") {
                                correo ? 
                                  document.getElementById('advertencia-correo').hidden = true :
                                  document.getElementById('advertencia-correo').hidden = false; 
                              }
                              
                              if (document.getElementById('usuario').value != "") {
                                usuario ? 
                                  document.getElementById('advertencia-usuario').hidden = true :
                                  document.getElementById('advertencia-usuario').hidden = false; 
                              }

                              if (document.getElementById('contraseña').value != "") {
                                password ? 
                                  document.getElementById('advertencia-contraseña').hidden = true :
                                  document.getElementById('advertencia-contraseña').hidden = false; 
                              }

                              //Si el formulario fue llenado correctamente se activa el boton enviar
                              if ((nombre && apellido && telefono && correo && usuario && contraseña && nivelprivilegio) ) {
                                document.getElementById('submitButton').disabled = false;
                              } else {
                                document.getElementById('submitButton').disabled = true;         
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
                      <div class="col-md-8">
                        <input class="form-control" name="id" type="hidden" value="<?=$usuarioSQL->getId()?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3" for="Rfc" id="rfc">RFC</label>
                        <div class="col-md-8">
                          <input class="form-control" name="rfc" type="text" placeholder="RFC" value="<?=$usuarioSQL->getRfc()?>" onkeyup="toggleButton()">
                          <div class="alert alert-danger" role="alert" id="advertencia-rfc" hidden>
                            EL RFC no cumple con un formato valido
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3" for="Nombre">Nombre</label>
                        <div class="col-md-8">
                          <input class="form-control" name="nombre" id="nombre" type="text" placeholder="Nombre" value="<?=$usuarioSQL->getNombre()?>" onkeyup="toggleButton()">
                          <div class="alert alert-danger" role="alert" id="advertencia-nombre" hidden>
                            El nombre solo debe contener letras y espacio
                          </div>  
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3" for="Apellido">Apellido</label>
                        <div class="col-md-8">
                          <input class="form-control" name="apellido" id="apellido" type="text" placeholder="Apellido" value="<?=$usuarioSQL->getApellido()?>" onkeyup="toggleButton()">
                          <div class="alert alert-danger" role="alert" id="advertencia-apellido" hidden>
                            El usuario unicamente puede contener letras y espacios
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3" for="Telefono">Telefono</label>
                        <div class="col-md-8">
                          <input class="form-control" name="telefono" id="telefono" type="text" placeholder="Telefono" value="<?=$usuarioSQL->getTelefono()?>" onkeyup="toggleButton()">
                          <div class="alert alert-danger" role="alert" id="advertencia-telefono" hidden>
                            Numero de telefono no valido
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3" for="Email">Correo electronico</label>
                        <div class="col-md-8">
                          <input class="form-control" name="email" id="correo" type="text" placeholder="email" value="<?=$usuarioSQL->getEmail()?>" onkeyup="toggleButton()">
                          <div class="alert alert-danger" role="alert" id="advertencia-correo" hidden>
                            Formato de correo electronico no valido <strong>ejemplo@ejemplo.com</strong>
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3" for="User">Usuario</label>
                        <div class="col-md-8">
                          <input class="form-control" name="user" id="usuario" type="text" placeholder="Usuario" value="<?=$usuarioSQL->getUser()?>" onkeyup="toggleButton()">
                          <div class="alert alert-danger" role="alert" id="advertencia-usuario" hidden>
                            El usuario unicamente puede contener letras y espacios
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3" for="Contrasenia">Contraseña</label>
                        <div class="col-md-8">
                          <input class="form-control" name="contrasenia" id="contraseña" type="password" placeholder="Contraseña" value="<?=$usuarioSQL->getContrasenia()?>" onkeyup="toggleButton()" >
                          <div class="alert alert-danger" role="alert" id="advertencia-contraseña" hidden>
                            Contraseña muy corta
                          </div>
                        </div>
                    </div>
                      <!--<label class="control-label col-md-3" for="Contrasenia2">Confirma tu Contraseña</label>
                        <div class="col-md-8">
                          <input class="form-control" name="contrasenia2" type="password" placeholder="Contraseña">
                        </div>-->

                    <div class="form-group">
                      <label class="control-label col-md-3" for="Privilegio">Nivel de privilegio</label>
                        <div class="col-md-8">
                          <select class="form-control" name="privilegio" id="nivelprivilegio" onchange="toggleButton()">
                            <option value selected disabled>Seleccione una opcion</option>
                            <option value="1" <?php if($tipoUsuarioDefecto=="1"){ ?> selected="true" <?php } ?>>Administrador</option>
                            <option value="2" <?php if($tipoUsuarioDefecto=="2"){ ?> selected="true" <?php } ?>>Tecnico</option>
                            <option value="3" <?php if($tipoUsuarioDefecto=="3"){ ?> selected="true" <?php } ?>>Secretaria</option>
                            
                          </select>
                          <br>
                          
                   
                        </div>
                    </div>
                        <div class="col-lg-10 col-lg-offset-2">
                          <button class="btn btn-primary" type="submit" id="submitButton" disabled>Enviar</button>
                          <button class="btn btn-default" onclick="toggleButton()">Limpiar</button>
                          <button class="btn btn-default" type="button" onclick="cancelarUsuario()">Cancelar</button>                          
                        </div>
                        
                    
                    <?php } ?>
                  
                  <!--<div class="form-group">
                    <label class="control-label" for="inputDefault">RFC</label>
                    <input class="form-control" id="inputDefault" type="text">
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label" for="inputEmail">Email</label>
                    <div class="col-md-8">
                      <input class="form-control" id="inputEmail" type="text" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label" for="inputPassword">Password</label>
                    <div class="col-md-8">
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
                    <div class="col-md-8">
                      <textarea class="form-control" id="textArea" rows="3"></textarea><span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Radios</label>
                    <div class="col-md-8">
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
                    <div class="col-md-8">
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
                              Swal.fire({
                                title: '¿Deseas regresar a la lista y deshacer el registro?',
                                showCancelButton: true,
                                confirmButtonText: 'Confirmar',
                              }).then((result) => {
                                if (result.isConfirmed) {
                                  window.location.href ='?c=usuario';
                                }
                              }) 
                            }
                        </script> 