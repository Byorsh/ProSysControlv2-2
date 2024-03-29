<div class="content-wrapper">
  <div class="page-title">
    <div>
      <h1><i class="fa fa-edit"></i><?= $titulo ?> Equipo en Taller</h1>
      <p>Modulo para <?= $titulo ?> Equipo en Taller</p>
    </div>
    <div>
      <ul class="breadcrumb">
        <li><i class="fa fa-home fa-lg"></i></li>
        <li>Taller</li>
        <li><a href="#"><?= $titulo ?> Equipo en Taller</a></li>
        <button class="btn btn-danger" type="button" onclick="handleCancelar()">Retroceder <i class="fa fa-lg fa-reply"></i></button>
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
            $fechadiadeHOY = date("Y-m-d");
            require_once 'modelos/regex.php';
            $regex = new Regex;
            $camposporllenar = true;
            $this->modelo->Obtener($tallerSQL->getId());
            $var = $tallerSQL->gettipoEquipo();
            $fechaprom = $tallerSQL->getFechaPrometida();
            $fechaentrada = $tallerSQL->getFechaEntrada();
            $horaentrada = $tallerSQL->getHoraEntrada();
            $tecnicoasignadoOriginal = $tallerSQL->gettecnicoAsignado();
            $idclient = $tallerSQL->getIdCliente();
            $datoscliente = $tallerSQL->buscarCliente($idclient);

            ?>
            <form class="form-horizontal" id="form" method="POST" action="?c=taller&a=Guardar">
              <fieldset>
                <legend class="control-label">Equipo en Taller</legend>
                <div class="control-label col-md-3">
                  <h4>Datos del Cliente</h4>
                </div>

                <input class="form-control" name="id" type="hidden">

                <div class="col-lg-10">
                  <input class="form-control" name="id" type="hidden" value="<?= $tallerSQL->getId() ?>">
                </div>

                <div class="form-group">
                  <div class="col-md-8">
                    <input class="form-control" name="idCliente" type="hidden" placeholder="Introduce el id del cliente" value="<?= $idclient ?>">
                  </div>
                </div>

                <?php foreach ($datoscliente as $campo) : ?>
                  <div class="form-group">
                    <label class="control-label col-md-3">Nombre del Cliente</label>
                    <div class="col-md-8">
                      <input class="form-control" type="text" placeholder="Nombre del cliente" value="<?= $campo->nombreCliente, " ", $campo->apellidosC ?>" disabled>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3">Telefono del Cliente</label>
                    <div class="col-md-8">
                      <input class="form-control" type="text" placeholder="Telefono del cliente" value="<?= $campo->telefono ?>" disabled>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3">Correo del Cliente</label>
                    <div class="col-md-8">
                      <input class="form-control" type="text" placeholder="Correo del cliente" value="<?= $campo->email ?>" disabled>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3">Domicilio</label>
                    <div class="col-md-8">
                      <input class="form-control" type="text" placeholder="Domicilio del cliente" value="<?= $campo->domicilio ?>" disabled>
                    </div>
                  </div>
                <?php endforeach; ?>

                <br>
                <div class="control-label col-md-3">
                  <h4>Datos del Equipo</h4>
                </div>
                <br>
                <br>
                <hr>

                <div class="form-group">
                  <label class="control-label col-md-3" for="Ns">Numero de Serie <p style="color: red;display: inline;">*</p></label>
                  <div class="col-md-8">
                    <input class="form-control" name="ns" id="ns" type="text" placeholder="Introduce el numero de serie del equipo" onkeyup="mayus(this); handleSubmit();" maxlength="25" min="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 97 && event.charCode <= 122)
                     || (event.charCode >= 160 && event.charCode <= 165) || (event.charCode == 224) || (event.charCode == 181) || (event.charCode == 130) || (event.charCode == 233) || (event.charCode == 144) || (event.charCode == 214))" value="<?= $tallerSQL->getNs() ?>">
                    <div class="alert alert-danger" role="alert" id="advertenciaNumeroSerie" hidden>
                      Campo obligatorio, Mínimo de 2 caracteres
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="Marca">Marca <p style="color: red;display: inline;">*</p></label>
                  <div class="col-md-8">
                    <input class="form-control col-md-8" id="marca" name="marca" type="text" placeholder="Marca del equipo" onkeyup="mayus(this); handleSubmit();" maxlength="20" min="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 45) || (event.charCode == 47) || (event.charCode == 32)
                     || (event.charCode >= 160 && event.charCode <= 165) || (event.charCode == 224) || (event.charCode == 181) || (event.charCode == 130) || (event.charCode == 233) || (event.charCode == 144) || (event.charCode == 214))" value="<?= $tallerSQL->getMarca() ?>">
                    <div class="alert alert-danger" role="alert" id="advertenciaMarca" hidden>
                      Campo obligatorio
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="Modelo">Modelo <p style="color: red;display: inline;">*</p></label>
                  <div class="col-md-8">
                    <input class="form-control col-md-8" id="modelo" name="modelo" type="text" placeholder="Modelo del equipo" onkeyup="mayus(this); handleSubmit();" maxlength="30" min="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32)
                     || (event.charCode >= 160 && event.charCode <= 165) || (event.charCode == 224) || (event.charCode == 181) || (event.charCode == 130) || (event.charCode == 233) || (event.charCode == 144) || (event.charCode == 214))" value="<?= $tallerSQL->getModelo() ?>">
                    <div class="alert alert-danger" role="alert" id="advertenciaModelo" hidden>
                      Campo obligatorio
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="TipoEquipo">Tipo de Equipo</label>
                  <div class="col-md-8">
                    <input class="form-control col-md-8" id="tipoEquipo" name="tipoEquipo" type="text" placeholder="Tipo de equipo" onkeyup="mayus(this); handleSubmit();" maxlength="50" min="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 45) 
                    || (event.charCode == 47) || (event.charCode >= 160 && event.charCode <= 165) || (event.charCode == 224) || (event.charCode == 181) || (event.charCode == 130) || (event.charCode == 233) || (event.charCode == 144) || (event.charCode == 214))" value="<?= $tallerSQL->gettipoEquipo() ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="Observaciones">Problematica del equipo <p style="color: red;display: inline;">*</p></label>
                  <div class="col-md-8">
                    <!--Por alguna razon no agarra la validacion para el minimo de caracteres-->
                    <textarea class="form-control" id="obs" name="observaciones" type="text" rows="4" placeholder="Problema del equipo" maxlength="400" onkeyup="mayus(this); handleSubmit();"><?= $tallerSQL->getObservaciones() ?></textarea>
                    <div class="alert alert-danger" role="alert" id="advertenciaProblematica" hidden>
                      Campo obligatorio, Mínimo de 4 caracteres
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="Accesorios">Accesorios</label>
                  <div class="col-md-8">
                    <textarea class="form-control" name="accesorios" id="accesorios" rows="4" placeholder="Accesorios del equipo" maxlength="400" onkeyup="mayus(this); handleSubmit();"><?= $tallerSQL->getAccesorios() ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="EstadoEquipo">Estado del equipo</label>
                  <div class="col-md-8">
                    <select class="form-control" name="estadoEquipo" id="estadoEquipo" onchange="handleSubmit()" value selected="<?= $tallerSQL->getestadoEquipo() ?>">
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

                    </select>
                    <br>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3">Cobrado</label>
                  <div class="col-md-8">
                    <?php if (($tallerSQL->getCobrado()) == "Si") {
                    ?>
                      <label><input type="radio" id="radioC" name="cobrado" value="Si" checked onchange="handleSubmit()">Si</label>
                      <label><input type="radio" id="radioC" name="cobrado" value="No" onchange="handleSubmit()">No</label>
                    <?php } else { ?>
                      <label><input type="radio" id="radioC" name="cobrado" value="Si" onchange="handleSubmit()">Si</label>
                      <label><input type="radio" id="radioC" name="cobrado" value="No" onchange="handleSubmit()" checked>No</label>
                    <?php } ?>
                  </div>
                </div>
                <br>

                <div class="control-label col-md-3">
                  <h4>Registrar Orden</h4>
                </div>
                <br>
                <br>
                <hr>

                <div class="form-group">
                  <label class="control-label col-md-3" for="TecnicoAsignado">Tecnico Asignado <p style="color: red;display: inline;">*</p></label>
                  <div class="col-md-8">
                    <select class="form-control" id="idtec" name="tecnicoAsignado" type="text" placeholder="Id del Tecnico asignado" value="hatapu" onchange="handleSubmit()">
                      <option value disabled>Seleccione un técnico o administrador</option>
                      <optgroup label="Tecnicos">
                        <?php
                        foreach ($this->modelo->ListarTecnicos() as $tallerSQL) : ?>
                          <option value="<?= $tallerSQL->id ?>" <?php if ($tecnicoasignadoOriginal == $tallerSQL->id) { ?> selected="true" <?php } ?>><?= $tallerSQL->nombre, " ", $tallerSQL->apellido ?></option>
                        <?php endforeach; ?>
                      <optgroup label="Admnistradores">
                        <?php
                        foreach ($this->modelo->ListarAdministradores() as $tallerSQL) : ?>
                          <option value="<?= $tallerSQL->id ?>" <?php if ($tecnicoasignadoOriginal == $tallerSQL->id) { ?> selected="true" <?php } ?>><?= $tallerSQL->nombre, " ", $tallerSQL->apellido ?></option>
                        <?php endforeach; ?>

                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="FechaPrometida">Fecha Prometida <p style="color: red;display: inline;">*</p></label>
                  <div class="col-md-8">
                    <input type="date" max="2030-01-01" class="form-control" id="fecha" name="fechaPrometida" type="text" placeholder="Fecha prometida" value="<?php echo ($fechaprom); ?>" onchange="handleSubmit()">
                  </div>
                </div>

                <input class="form-control" name="fechaEntrada" type="hidden" placeholder="Fecha prometida" value="<?= $fechaentrada ?>">
                <input class="form-control" name="horaEntrada" type="hidden" placeholder="Fecha prometida" value="<?= $horaentrada ?>">

                <div class="control-label">
                  <button class="btn btn-primary" type="button" id="submitButton" onclick="Guardar()" disabled>Enviar</button>
                  <button class="btn btn-default" type="reset" onclick="handleBloquearSubmit()">Limpiar</button>
                  <button class="btn btn-danger" type="button" onclick="handleCancelar()">Cancelar</button>
                </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="vistas/taller/modificar_Taller.js"></script>