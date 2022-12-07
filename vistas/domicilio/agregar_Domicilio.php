<div class="content-wrapper">
  <div class="page-title">
    <div>
      <h1><i class="fa fa-edit"></i><?=$titulo?> Servicio a domicilio</h1>
      <p>Modulo para <?=$titulo?> Servicio a domicilio</p>
    </div>
    <div>
      <ul class="breadcrumb">
        <li><i class="fa fa-home fa-lg"></i></li>
        <li>Domicilio</li>
        <li><a href="#"><?=$titulo?> Servicio a domicilio</a></li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="row">
          
            <div class="well bs-component">
              <?php
                date_default_timezone_set('America/Mazatlan');
                $fechadiadeHOY=date("Y-m-d");
                
              ?>
                <form class="form-horizontal" method="POST" action="?c=domicilio&a=Guardar">
                <fieldset>
                <legend>Servicio a domicilio</legend>
                    <div class="col-lg-10">
                        <h4>Datos del Cliente</h4>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10">
                        <input class="form-control" name="id" type="hidden">
                      </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" for="IdCliente" >Nombre del Cliente *</label>
                        <div class="col-md-8">
                            <select class="form-control" id="idc" name="idCliente" method="post" type="text" placeholder="Selecciona el nombre del cliente"
                              required="" >
                            <option  value disabled>Seleccione un cliente</option>
                            <?php foreach($this->modelo->ListarClientes() as $tallerSQL): ?>
                            <option id="<?=$tallerSQL->idClientes?>" value="<?=$tallerSQL->idClientes?>"><?= $tallerSQL->nombreCliente," ",$tallerSQL->apellidoP." ",$tallerSQL->apellidoM?></option>
                            <?php endforeach; ?>
                            </select><br>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Nombre del Cliente</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" placeholder="Nombre del cliente" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Telefono del Cliente</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" placeholder="Telefono del cliente" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Correo del Cliente</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" placeholder="Correo del cliente" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Direccion del Cliente</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" placeholder="Direccion del cliente" disabled>
                        </div>
                    </div>                    
                    <div class="col-lg-10">
                        <h4>Informacion del servicio</h4>
                    </div>
                    <div class="form-group">
                    
                  <div class="form-group">
                    <label class="control-label col-md-3" for="Problematica">Problematica para el servicio</label>
                    <div class="col-md-8">
                      <textarea class="form-control" name="problematica" rows="4" placeholder="Problematica para el servicio" required=""></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                        <div class="col-lg-10">
                        <input class="form-control" name="observaciones" type="hidden">
                      </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10">
                        <input class="form-control" name="presupuesto" type="hidden">
                      </div>
                    </div>
                  
                    <div class="form-group">
                        <div class="col-lg-10">
                        <input class="form-control" name="costoTotal" type="hidden">
                      </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10">
                        <input class="form-control" name="horaInicio" type="hidden">
                      </div>
                    </div>
                  
                    <div class="form-group">
                        <div class="col-lg-10">
                        <input class="form-control" name="horaFinal" type="hidden">
                      </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10">
                        <input class="form-control" name="horasRealizadas" type="hidden">
                      </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3" for="FechaProgramada">Fecha solicitud de servicio</label>
                        <div class="col-md-8">
                            <input class="form-control" name="fechaProgramada" type="date" min="<?=$fechadiadeHOY?>" max="2030-01-01" placeholder="Fecha de solicitud de servicio" required="">
                        </div>
                    </div>
                    
                        <!--<label class="col-md-3" for="Contrasenia2">Confirma tu Contraseña</label>
                        <div class="col-lg-10">
                            <input class="form-control" name="contrasenia2" type="password" placeholder="Contraseña">
                        </div>-->

                        <div class="col-lg-10 col-lg-offset-2">
                            <button class="btn btn-default" type="reset">Limpiar</button>
                            <button class="btn btn-primary" type="submit">Enviar</button>
                        </div>
                    </div>
        </div>
      </div>
    </div>
  </div>