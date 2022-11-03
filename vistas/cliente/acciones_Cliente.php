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
                          <input class="form-control" name="rfc" type="text" pattern="^([A-ZÑ\x26]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1]))([A-Z\d]{3})?$" placeholder="RFC" value="<?=$clienteSQL->getRfc()?>">
                        </div>
                      
                      <label class="col-md-3 " for="NombreCliente">Nombre</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="nombreCliente" type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ. ]{3,20}" placeholder="Nombre" value="<?=$clienteSQL->getNombre()?>" required="">
                        </div>

                      <label class="col-md-3 " for="ApellidoP">Apellido Paterno</label>
                        <div class="col-lg-10">
                        <input class="form-control" name="apellidoP" type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ. ]{2,20}" placeholder="Apellido" value="<?=$clienteSQL->getApellidoP()?>" required="">
                        </div>

                        <label class="col-md-3 " for="ApellidoM">Apellido Materno</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="apellidoM" type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ. ]{2,20}" placeholder="Apellido" value="<?=$clienteSQL->getApellidoM()?>" >
                        </div>

                      <label class="col-md-3 " for="NombreEmpresa">Nombre de la empresa</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="nombreEmpresa" type="text" placeholder="NombreEmpresa" value="<?=$clienteSQL->getNombreEmpresa()?>" >
                        </div>

                      <label class="col-md-3" for="Telefono">Telefono</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="telefono" type="text" pattern="[0-9]{10,13}" placeholder="Telefono" value="<?=$clienteSQL->getTelefono()?>" required="">
                        </div>

                      <label class="col-md-3" for="Email">Email</label>
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
                          <button class="btn btn-default" type="reset">Limpiar</button>
                          <button class="btn btn-primary" type="submit">Enviar</button>
                        </div>
                    </div>
                  
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