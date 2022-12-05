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
                            <input class="form-control" type="text" placeholder="Nombre del cliente" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ. ]{3,15}" value="<?$tallerSQL->nombreCliente?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Telefono del Cliente</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" placeholder="Telefono del cliente" pattern="[0-9]{10,13}" value="<?$tallerSQL->telefono?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Correo del Cliente</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" 
                            pattern="^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$" placeholder="Correo del cliente" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Direccion del Cliente</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" placeholder="Direccion del cliente" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ. ]{15,30}" disabled>
                        </div>
                    </div>                    
                    <div class="col-lg-10">
                        <h4>Informacion del servicio</h4>
                    </div>
                    <div class="form-group">
                    
                  <div class="form-group">
                    <label class="control-label col-md-3" for="Problematica">Problematica para el servicio</label>
                    <div class="col-md-8">
                      <textarea class="form-control" name="problematica" rows="4" placeholder="Problematica para el servicio" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ. ]{7,100}" required=""></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                        <div class="col-lg-10">
                        <input class="form-control" name="observaciones" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ. ]{7,100}" type="hidden">
                      </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10">
                        <input class="form-control" name="presupuesto" pattern="[0-9.]{1,12}" type="hidden">
                      </div>
                    </div>
                  
                    <div class="form-group">
                        <div class="col-lg-10">
                        <input class="form-control" name="costoTotal" pattern="[0-9.]{1,12}" type="hidden">
                      </div>
                    </div>
                    <?php
                        date_default_timezone_set('America/Mazatlan');
                        $fecha_actual=date("Y-m-d");
                        $hora_actual=date("H:i:S");
                        ?>
                    <div class="form-group">
                        <div class="col-lg-10">
                        <input class="form-control" name="horaInicio" type="hidden" placeholder= "Hora" value="<?= $hora_actual?>">
                      </div>
                    </div>
                  
                    <div class="form-group">
                        <div class="col-lg-10">
                        <input class="form-control" name="horaFinal" type="hidden">
                      </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10">
                        <input class="form-control" name="horasRealizadas" type="hidden" placeholder= "horas realizadas" pattern="[0-9.]{1,12}">
                      </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3" for="FechaProgramada">Fecha solicitud de servicio</label>
                        <div class="col-md-8">
                            <input class="form-control" name="fechaProgramada" type="text" placeholder="Fecha de solicitud de servicio" 
                            pattern="(19|20)(((([02468][048])|([13579][26]))-02-29)|(\d{2})-((02-((0[1-9])|1\d|2[0-8]))|((((0[13456789])|1[012]))-((0[1-9])|((1|2)\d)|30))|(((0[13578])|(1[02]))-31)))" 
                            value="" required="" >
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