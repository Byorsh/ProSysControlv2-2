<div class="content-wrapper">
  <div class="page-title">
    <div>
      <h1><i class="fa fa-edit"></i><?=$titulo?> Equipo en Taller</h1>
      <p>Modulo para <?=$titulo?> Equipo en Taller</p>
    </div>
    <div>
        <a class="btn btn-info btn-flat" href="?c=taller&a=FormModificar&id=<?=$tallerSQL->getId()?>">Actualizar <i class="fa fa-lg fa-refresh"></i></a> 
        <a class="btn btn-warning btn-flat" href="?c=taller">Retroceder <i class="fa fa-lg fa-reply"></i></a>
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
              require_once 'modelos/regex.php';
              $regex = new Regex;
              $camposporllenar = true;
              $this->modelo->Obtener($tallerSQL->getId());              
              $var = $tallerSQL->gettipoEquipo();
              $fechaprom = $tallerSQL->getFechaPrometida();
              $tecnicoasignadoOriginal = $tallerSQL->gettecnicoAsignado();
              $idclient = $tallerSQL->getIdCliente();
              $datoscliente = $tallerSQL ->buscarCliente($idclient);

              ?>
                <form class="form-horizontal" method="POST" action="?c=taller&a=Guardar">
                <fieldset>
                <legend>Equipo en Taller <?php echo($tecnicoasignadoOriginal); ?></legend>
                    <div class="col-lg-10">
                        <h4>Datos del Cliente</h4>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10">
                        <input class="form-control" name="id" type="hidden">
                      </div>
                    </div>
                    <div class="col-lg-10">
                        <input class="form-control" name="id" type="hidden" value="<?=$tallerSQL->getId()?>" disabled>
                      </div>
                    <div class="form-group">
                        
                        <div class="col-md-8">
                            <input class="form-control" name="idCliente" type="hidden" placeholder="Introduce el id del cliente" value="<?=$tallerSQL->getIdCliente()?>" disabled>
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
                        <label class="control-label col-md-3">Domicilio</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" placeholder="Domicilio del cliente" value="<?=$campo->domicilio?>" disabled>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <div class="col-lg-10">
                        <h4>Datos del Equipo</h4>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-md-3" for="Ns" >Numero de Serie *</label>
                    <div class="col-md-8">
                      <input class="form-control" name="ns" id="ns" type="text" placeholder="Introduce el numero de serie del equipo" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ. ]{6,30}" required="" onchange="toggleButtonagregarTaller()" value="<?=$tallerSQL->getNs()?>" disabled>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3" for="Marca" >Marca *</label>
                    <div class="col-md-8">
                      <input class="form-control col-md-8" id="marca" name="marca" type="text" placeholder="Marca del equipo"  pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ. ]{3,50}" required="" onchange="toggleButtonagregarTaller()" value="<?=$tallerSQL->getMarca()?>" disabled>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3" for="Modelo" >Modelo *</label>
                    <div class="col-md-8">
                    <input class="form-control col-md-8" id="modelo" name="modelo" type="text" placeholder="Modelo del equipo" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ. ]{3,50}" required="" onchange="toggleButtonagregarTaller()" value="<?=$tallerSQL->getModelo()?>" disabled>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3" for="TipoEquipo" >Tipo de Equipo</label>
                    <div class="col-md-8">
                      <input class="form-control col-md-8" id="tipoEquipo" name="tipoEquipo" type="text" placeholder="Tipo de equipo" value="<?=$tallerSQL->gettipoEquipo()?>" disabled>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3" for="Observaciones" >Problematica del equipo *</label>
                    <div class="col-md-8">
                      <!--Por alguna razon no agarra la validacion para el minimo de caracteres-->
                      <textarea class="form-control" id="obs" name="observaciones" type="text" rows="4" placeholder="Problema del equipo" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ. ]{7,100}" required="" onchange="toggleButtonagregarTaller()" disabled><?=$tallerSQL->getObservaciones()?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3" for="Accesorios">Accesorios</label>
                    <div class="col-md-8">
                      <textarea class="form-control" name="accesorios" rows="4" placeholder="Accesorios del equipo" disabled><?=$tallerSQL->getAccesorios()?></textarea >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3" for="EstadoEquipo">Estado del equipo</label>
                        <div class="col-md-8">
                          <select class="form-control" name="estadoEquipo" id="estadoEquipo" required="" onchange="toggleButton()" value="<?=$tallerSQL->getestadoEquipo()?>" disabled>
                            <option value disabled>Seleccione una opcion</option>
                            <option value="1">Recien entrante</option>
                            <option value="2">En diagnostico</option>
                            <option value="3">Diagnosticado</option>
                            <option value="4">Presupuestado</option>
                            <option value="5">Presupuesto aceptado</option>
                            <option value="6">En reparacion</option>
                            <option value="7">Reparado</option>
                            <option value="8">No reparado</option>
                            <option value="9">En espera para entrega</option>
                            <option value="10">Entregado</option>
                            
                          </select><br>
                          
                   
                        </div>
                    </div>

                    <div class="col-lg-10">
                        <h4>Registrar Orden</h4>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3" for="TecnicoAsignado" >Tecnico Asignado *</label>
                        <div class="col-md-8">
                            <select class="form-control" id="idtec" name="tecnicoAsignado" type="text" placeholder="Id del Tecnico asignado" pattern="[0-9]{1,3}"
                            value="hatapu" required="" onchange="toggleButtonagregarTaller()" disabled>mama mi let mi go
                            <option value disabled >Seleccione un técnico o administrador</option>
                            <optgroup label="Tecnicos">
                            <?php 
                            foreach($this->modelo->ListarTecnicos() as $tallerSQL):?>
                            <option value="<?=$tallerSQL->id?>" <?php if($tecnicoasignadoOriginal==$tallerSQL->id){ ?> selected="true" <?php } ?> ><?= $tallerSQL->nombre," ",$tallerSQL->apellido?></option disabled>
                            <?php endforeach; ?>
                            <optgroup label="Admnistradores">
                            <?php 
                            foreach($this->modelo->ListarAdministradores() as $tallerSQL):?>
                            <option value="<?=$tallerSQL->id?>" <?php if($tecnicoasignadoOriginal==$tallerSQL->id){ ?> selected="true" <?php } ?> ><?= $tallerSQL->nombre," ",$tallerSQL->apellido?></option disabled>
                            <?php endforeach; ?>

                            </select><br>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3" for="FechaPrometida" >Fecha Prometida *</label>
                        <div class="col-md-8">
                            <input type="date"  max="2030-01-01" class="form-control" id="fecha" name="fechaPrometida" type="text" placeholder="Fecha prometida"
                            pattern="(19|20)(((([02468][048])|([13579][26]))-02-29)|(\d{2})-((02-((0[1-9])|1\d|2[0-8]))|((((0[13456789])|1[012]))-((0[1-9])|((1|2)\d)|30))|(((0[13578])|(1[02]))-31)))"
                            value="<?php echo($fechaprom); ?>" required="" onchange="toggleButtonagregarTaller()" disabled>
                        </div>
                        
                    </div>
                    <div class="form-group">
                      
                    </div>

                    <div class="form-group">
                       <!--AQUI ES DONDE SE ASIGNAN LOS VALORES DE LA FECHA Y HORA ACTUALES -->
                        <?php
                        date_default_timezone_set('America/Mazatlan');
                        $fecha_actual=date("Y-m-d");
                        $hora_actual=date("H:i:S");
                        ?>
                        <div class="col-md-8">
                            <input class="form-control" name="fechaEntrada" type="hidden" placeholder="Fecha prometida" value="<?= $fecha_actual?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        
                        <div class="col-md-8">
                            <input class="form-control" name="horaEntrada" type="hidden" placeholder="Fecha prometida" value="<?= $hora_actual?>" disabled>
                        </div>
                    </div>
                        <!--<label class="col-md-3" for="Contrasenia2">Confirma tu Contraseña</label>
                        <div class="col-lg-10">
                            <input class="form-control" name="contrasenia2" type="password" placeholder="Contraseña">
                        </div>-->
                        
                    </div>
                    </div>
                  </div>
                </div>
              </div>
              <script>
                            function toggleButtonagregarTaller()
                            {                                
                                var ns = document.getElementById('ns').value;
                                var marca = document.getElementById('marca').value;
                                var modelo = document.getElementById('modelo').value;
                                var obs = document.getElementById('obs').value;
                                var idtec = document.getElementById('idtec').value;
                                var fecha = document.getElementById('fecha').value;
                
                                if (ns && marca && modelo && obs && idtec && fecha  ) {
                                    document.getElementById('submitButton').disabled = false;
                                    document.getElementById('advertencia').className = "hidden";
                                    
                                    //agregar un handler al boton de enviar que faltan campos o colocar como visible
                                    
                                } else {
                                    document.getElementById('submitButton').disabled = true;
                                    document.getElementById('advertencia').className = "col-md-3";
                                    $camposporllenar = true;

                                    
                                }
                            }
                        </script> 