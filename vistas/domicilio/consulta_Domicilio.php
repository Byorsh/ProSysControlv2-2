<div class="content-wrapper">
  <div class="page-title">
    <div>
      <h1><i class="fa fa-edit"></i><?=$titulo?> Servicio a domicilio</h1>
      <p>Modulo para <?=$titulo?> Servicio a domicilio</p>
    </div>
    <div>
    <a class="btn btn-info btn-flat" href="?c=domicilio&a=FormModificar&id=<?=$domicilioSQL->getId()?>">Actualizar <i class="fa fa-lg fa-refresh"></i></a> 
    <a class="btn btn-warning btn-flat" href="?c=domicilio">Retroceder <i class="fa fa-lg fa-reply"></i></a> 
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="row">

        <?php
              date_default_timezone_set('America/Mazatlan');
              $fechadiadeHOY=date("Y-m-d");
              require_once 'modelos/regex.php';
              $regex = new Regex;
              $camposporllenar = true;
              $this->modelo->Obtener($domicilioSQL->getId());              
              $idclient = $domicilioSQL->getIdCliente();
              $datoscliente = $domicilioSQL ->buscarCliente($idclient);

              ?>
          
            <div class="well bs-component">
                <form class="form-horizontal" method="POST" action="?c=domicilio&a=Guardar">
                <fieldset>
                <legend>Servicio a domicilio</legend>
                    <div class="col-lg-10">
                        <h4>Datos del Cliente</h4>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10">
                        <input class="form-control" name="id" type="hidden" value="<?=$domicilioSQL->getId()?>">
                      </div>
                    </div>
                    <div class="form-group">
                        
                        <div class="col-md-8">
                            <input class="form-control" name="idCliente" type="hidden" placeholder="Introduce el id del cliente" value="<?=$domicilioSQL->getIdCliente()?>" disabled>
                        </div>
                    </div>
                    <?php foreach($datoscliente as $campo): ?>                     
                    <div class="form-group">
                        <label class="control-label col-md-3">Nombre del Cliente</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" placeholder="Nombre del cliente" value="<?=$campo->nombreCliente," ",$campo->apellidosC?>"
                             disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Telefono del Cliente</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" placeholder="Telefono del cliente" value="<?=$campo->telefono?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Correo del Cliente</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" placeholder="Correo del cliente" value="<?=$campo->email?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Domicilio del Cliente</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" placeholder="Domicilio del cliente" value="<?=$campo->domicilio?>" disabled>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <div class="col-lg-10">
                        <h4>Informacion del Servicio</h4>
                    </div>                
                  <div class="form-group">
                    <label class="control-label col-md-3" for="Problematica">Problematica del servicio *</label>
                    <div class="col-md-8">
                      <textarea class="form-control" name="problematica" rows="4" required="" placeholder="Problematica para el servicio" disabled><?=$domicilioSQL->getProblematica()?></textarea>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label col-md-3" for="Observaciones">Observaciones *</label>
                    <div class="col-md-8">
                      <textarea class="form-control" name="observaciones" rows="4" required="" placeholder="Observaciones" disabled><?=$domicilioSQL->getObservaciones()?></textarea>
                    </div>
                  </div>

                    <div class="form-group">
                        <label class="control-label col-md-3" for="FechaProgramada">Fecha solicitud de servicio</label>
                        <div class="col-md-8">
                            <input class="form-control" name="fechaProgramada"  type="date" max="2030-01-01" placeholder="Fecha de solicitud de servicio" value="<?=$domicilioSQL->getFechaProgramada()?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3" for="Presupuesto">Presupuesto</label>
                        <div class="col-md-8">
                            <input class="form-control" name="presupuesto" type="text" placeholder="Presupuesto" value="<?=$domicilioSQL->getPresupuesto()?>" disabled>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3" for="HoraInicio">Hora de Inicio</label>
                        <div class="col-md-8">
                            <input class="form-control" name="horaInicio" type="text" placeholder="Hora de inicio del servicio" value="<?=$domicilioSQL->getHoraInicio()?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3" for="HoraFinal">Hora de Finalizacion</label>
                        <div class="col-md-8">
                            <input class="form-control" name="horaFinal" type="text" placeholder="Hora de terminacion del servicio" value="<?=$domicilioSQL->getHoraFinal()?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3" for="HorasRealizadas">Horas Realizadas</label>
                        <div class="col-md-8">
                            <input class="form-control" name="horasRealizadas" type="text" placeholder="Hora realizadas en el servicio" value="<?=$domicilioSQL->getTotalHoras()?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3" for="CostoTotal">Costo total</label>
                        <div class="col-md-8">
                            <input class="form-control" name="costoTotal" type="text" placeholder="Costo total" value="<?=$domicilioSQL->getCostoTotal()?>" disabled>
                        </div>
                    </div>

                    <!--<div class="form-group">
                       <!AQUI ES DONDE SE ASIGNAN LOS VALORES DE LA FECHA Y HORA ACTUALES 
                        <?php
                        date_default_timezone_set('America/Mazatlan');
                        $fecha_actual=date("Y-m-d");
                        $hora_actual=date("H:i:S");
                        ?>
                        <div class="col-md-8">
                            <input class="form-control" name="fechaEntrada" type="hidden" placeholder="Fecha prometida" value="<?= $fecha_actual?>">
                        </div>
                    </div>
                    <div class="form-group">
                        
                        <div class="col-md-8">
                            <input class="form-control" name="horaEntrada" type="hidden" placeholder="Fecha prometida" value="<?= $hora_actual?>">
                        </div>
                    </div>-->
                        <div>
                        <label class="col-md-3" for=""></label>
                        <label class="col-md-3" for=""></label>
                        <label class="col-md-3" for=""></label>
                        </div>
                        
                    </div>
        </div>
      </div>
    </div>
  </div>