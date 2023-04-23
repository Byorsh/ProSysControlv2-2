<div class="content-wrapper">
  <div class="page-title">
    <div>
      <h1><i class="fa fa-edit"></i><?= $titulo ?> Equipo al Taller</h1>
      <p>Modulo para <?= $titulo ?> Equipo al Taller</p>
    </div>
    <div>
      <ul class="breadcrumb">
        <li><i class="fa fa-home fa-lg"></i></li>
        <li>Taller</li>
        <li><a href="#"><?= $titulo ?> Equipo al Tallera</a></li>
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
            ?>
            <form class="form-horizontal" method="POST" action="?c=taller&a=Guardar">
              <fieldset>
                <legend>Registro del Equipo en Taller</legend>
                <div class="col-lg-10">
                  <h4>Datos del Cliente</h4>
                </div>
                <div class="form-group">
                  <div class="col-lg-10">
                    <input class="form-control" name="id" type="hidden">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3" for="IdCliente">Nombre del Cliente *</label>
                  <div class="col-md-8">
                    <select class="form-control" id="idc" name="idCliente" method="post" type="text" placeholder="Selecciona el nombre del cliente" onmouseup="handleSubmit(); toggleListadeclientes()">
                      <option value disabled>Seleccione un cliente</option>
                      <?php foreach ($this->modelo->ListarClientes() as $tallerSQL) : ?>
                        <option id="<?= $tallerSQL->idClientes ?>" value="<?= $tallerSQL->idClientes ?>"><?= $tallerSQL->nombreCliente, " ", $tallerSQL->apellidosC ?></option>
                      <?php endforeach; ?>
                    </select><br>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3">Telefono del Cliente</label>
                  <div class="col-md-8">
                    <select class="form-control" id="listaTc" name="telefonoCliente" method="post" type="text" disabled>
                      <option value disabled>Seleccione un cliente</option>
                      <?php foreach ($this->modelo->ListarTelefonoYCorreo() as $tallerSQL) : ?>
                        <option id="<?= $tallerSQL->idClientes ?>" value="<?= $tallerSQL->idClientes ?>"><?= $tallerSQL->telefono ?></option>
                      <?php endforeach; ?>
                    </select><br>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Correo del Cliente</label>
                  <div class="col-md-8">
                    <select class="form-control" id="listaCc" name="correoCliente" method="post" type="text" disabled>
                      <option value disabled>Seleccione un cliente</option>
                      <?php foreach ($this->modelo->ListarTelefonoYCorreo() as $tallerSQL) : ?>
                        <option id="<?= $tallerSQL->idClientes ?>" value="<?= $tallerSQL->idClientes ?>"><?= $tallerSQL->email ?></option>
                      <?php endforeach; ?>
                    </select><br>
                  </div>
                </div>

                <!-- Seccion de datos del equipo -->
                <div class="col-lg-10">
                  <h4>Datos del Equipo</h4>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="Ns">Numero de Serie *</label>
                  <div class="col-md-8">
                    <input class="form-control" name="ns" id="ns" type="text" placeholder="Introduce el numero de serie del equipo" onkeyup="mayus(this)" onchange="handleSubmit()" maxlength="30" min="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 97 && event.charCode <= 122))" />
                    <div class="alert alert-danger" role="alert" id="advertenciaSerie" hidden>
                      No se aceptan caracteres especiales
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3" for="Marca">Marca *</label>
                  <div class="col-md-8">
                    <input class="form-control col-md-8" id="marca" name="marca" type="text" placeholder="Marca del equipo" onkeyup="mayus(this)" onchange="handleSubmit()" maxlength="50" min="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 97 && event.charCode <= 122))" />
                    <div class="alert alert-danger" role="alert" id="advertenciaMarca" hidden>
                      No se aceptan caracteres especiales
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3" for="Modelo">Modelo *</label>
                  <div class="col-md-8">
                    <input class="form-control col-md-8" id="modelo" name="modelo" type="text" placeholder="Modelo del equipo" onkeyup="mayus(this)" onchange="handleSubmit()" maxlength="50" min="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 45) || (event.charCode == 47))" />
                    <div class="alert alert-danger" role="alert" id="advertenciaModelo" hidden>
                      No se aceptan caracteres especiales
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3" for="TipoEquipo">Tipo de Equipo</label>
                  <div class="col-md-8">
                    <input class="form-control col-md-8" id="tipoEquipo" name="tipoEquipo" type="text" placeholder="Tipo de equipo" onkeyup="mayus(this)" onchange="handleSubmit()" maxlength="30" min="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 45) || (event.charCode == 47))" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3" for="Observaciones">Problematica del equipo *</label>
                  <div class="col-md-8">
                    <!--Por alguna razon no agarra la validacion para el minimo de caracteres-->
                    <textarea class="form-control" id="obs" name="observaciones" type="text" rows="4" placeholder="Problema del equipo" onkeyup="mayus(this)" onchange="handleSubmit()"></textarea>
                    <div class="alert alert-danger" role="alert" id="advertenciaObservaciones" hidden>
                      Campo obligatorio
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3" for="Accesorios">Accesorios</label>
                  <div class="col-md-8">
                    <textarea class="form-control" name="accesorios" rows="4" placeholder="Accesorios del equipo" onkeyup="mayus(this)" onchange="handleSubmit()"></textarea>
                  </div>
                </div>

                <div class="col-lg-10">
                  <h4>Registrar Orden</h4>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="TecnicoAsignado">Tecnico Asignado *</label>
                  <div class="col-md-8">
                    <select class="form-control" id="idtec" name="tecnicoAsignado" type="text" placeholder="Id del Tecnico asignado" onchange="handleSubmit()">
                      <option value disabled>Seleccione un técnico o administrador</option>
                      <optgroup label="Tecnicos">
                        <?php
                        foreach ($this->modelo->ListarTecnicos() as $tallerSQL) : ?>
                          <option value="<?= $tallerSQL->id ?>"><?= $tallerSQL->nombre, " ", $tallerSQL->apellido ?></option>
                        <?php endforeach; ?>
                      <optgroup label="Admnistradores">
                        <?php
                        foreach ($this->modelo->ListarAdministradores() as $tallerSQL) : ?>
                          <option value="<?= $tallerSQL->id ?>"><?= $tallerSQL->nombre, " ", $tallerSQL->apellido ?></option>
                        <?php endforeach; ?>

                    </select><br>
                  </div>
                </div>


                <div class="form-group">
                  <label class="control-label col-md-3" for="FechaPrometida">Fecha Prometida *</label>
                  <div class="col-md-8">
                    <input class="form-control" type="date" min="<?= $fechadiadeHOY ?>" max="2030-01-01" id="fecha" name="fechaPrometida" placeholder="Fecha prometida" onchange="handleSubmit()">
                  </div>

                </div>
                <div class="form-group">

                </div>

                <div class="form-group">
                  <!--AQUI ES DONDE SE ASIGNAN LOS VALORES DE LA FECHA Y HORA ACTUALES -->
                  <?php
                  date_default_timezone_set('America/Mazatlan');
                  $fecha_actual = date("Y-m-d");
                  $hora_actual = date("H:i:S");
                  ?>
                  <div class="col-md-8">
                    <input class="form-control" name="fechaEntrada" type="hidden" placeholder="Fecha prometida" value="<?= $fecha_actual ?>">
                  </div>
                </div>
                <div class="form-group">

                  <div class="col-md-8">
                    <input class="form-control" name="horaEntrada" type="hidden" placeholder="Fecha prometida" value="<?= $hora_actual ?>">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-8">
                    <input class="form-control" name="estadoEquipo" type="hidden" value="1">
                  </div>
                </div>

                <div class="col-lg-10 col-lg-offset-2">
                  <button class="btn btn-primary" type="submit" id="submitButton" disabled>Enviar</button>
                  <button class="btn btn-default" type="reset" onclick="handleBloquearSubmit()">Limpiar</button>
                  <button class="btn btn-danger" type="button" onclick="handleCancelar()">Cancelar</button>
                </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="vistas/taller/agregar_Taller.js"></script>