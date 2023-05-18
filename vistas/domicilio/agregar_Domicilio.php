<div class="content-wrapper">
  <div class="page-title">
    <div>
      <h1><i class="fa fa-edit"></i><?= $titulo ?> Servicio a domicilio</h1>
      <p>Modulo para <?= $titulo ?> Servicio a domicilio</p>
    </div>
    <div>
      <ul class="breadcrumb">
        <li><i class="fa fa-home fa-lg"></i></li>
        <li>Domicilio</li>
        <li><a href="#"><?= $titulo ?> Servicio a domicilio</a></li>
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

            ?>
            <form class="form-horizontal" method="POST" action="?c=domicilio&a=Guardar">
              <fieldset>
                <legend class="control-label">Servicio a domicilio</legend>
                <div class="col-lg-10">
                  <h4>Datos del Cliente</h4>
                </div>
                <div class="form-group">
                  <div class="col-lg-10">
                    <input class="form-control" name="id" type="hidden">
                    <input class="form-control" name="estado" type="hidden" value="Sin editar">
                    <input class="form-control" name="cobrado" type="hidden" value="No">
                    <input class="form-control" name="observaciones" type="hidden">
                    <input class="form-control" name="presupuesto" type="hidden">
                    <input class="form-control" name="costoTotal" type="hidden">
                    <input class="form-control" name="observaciones" type="hidden">
                    <input class="form-control" name="horaInicio" type="hidden" placeholder="Hora" value="00:00:00">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3" for="Id_Cliente">Busqueda del Cliente <p style="color: red;display: inline;">*</p></label>
                  <div class="col-md-8">
                    <input class="form-control" id="idc" name="id_Cliente" method="post" type="text" value="" placeholder="Selecciona el nombre del cliente" onchange="handleSubmit(); toggleListadeclientes()" list="listaclientes">
                  </div>
                </div>
                <datalist id="listaclientes">
                  <?php foreach ($this->modelo->ListarClientes() as $tallerSQL) : ?>
                    <option id="<?= $tallerSQL->idClientes ?>" value="<?= $tallerSQL->idClientes ?>"><?= $tallerSQL->nombreCliente, " ", $tallerSQL->apellidosC ?></option>
                  <?php endforeach; ?>
                </datalist>

                <br />

                <div class="form-group">
                  <label class="control-label col-md-3">Nombre del Cliente <p style="color: red;display: inline;">*</p></label>
                  <div class="col-md-8">
                    <select class="form-control" id="listaTc" type="text" disabled>
                      <option value disabled>Seleccione un cliente</option>
                      <?php foreach ($this->modelo->ListarClientes() as $tallerSQL) : ?>
                        <option id="<?= $tallerSQL->idClientes ?>" value="<?= $tallerSQL->idClientes ?>"><?= $tallerSQL->nombreCliente, " ", $tallerSQL->apellidosC ?></option>
                      <?php endforeach; ?>
                    </select>
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
                    </select>
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
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Direccion del Cliente</label>
                  <div class="col-md-8">
                    <select class="form-control" id="listaDc" name="direccionCliente" method="post" type="text" disabled>
                      <option value disabled>Seleccione un cliente</option>
                      <?php foreach ($this->modelo->ListarDomicilios() as $tallerSQL) : ?>
                        <option id="<?= $tallerSQL->idClientes ?>" value="<?= $tallerSQL->idClientes ?>"><?= $tallerSQL->domicilio ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <br>
                <div class="col-lg-10">
                  <h4>Informacion del servicio</h4>
                </div>
                <hr />

                <div class="form-group">
                  <label class="control-label col-md-3" for="Problematica">Problematica para el servicio <p style="color: red;display: inline;">*</p></label>
                  <div class="col-md-8">
                    <textarea class="form-control" id="obs" name="problematica" rows="4" placeholder="Problematica para el servicio" maxlength="199" onkeyup="mayus(this); handleSubmit();"></textarea>
                    <div class="alert alert-danger" role="alert" id="advertenciaProblematica" hidden>
                      Campo obligatorio, Mínimo de 5 caracteres
                    </div>
                  </div>
                </div>
                <?php
                date_default_timezone_set('America/Mazatlan');
                $fecha_actual = date("Y-m-d");
                $hora_actual = date("H:i:S");
                ?>


                <input class="form-control" name="horaFinal" type="hidden">
                <input class="form-control" name="horasRealizadas" type="hidden" placeholder="horas realizadas">

                <div class="form-group">
                  <label class="control-label col-md-3" for="FechaProgramada">Fecha solicitud de servicio</label>
                  <div class="col-md-8">
                    <input class="form-control" id="fecha" name="fechaProgramada" type="date" min="<?= $fechadiadeHOY ?>" max="2030-01-01" placeholder="Fecha de solicitud de servicio" value="" onchange="handleSubmit()">
                  </div>
                </div>

                <input class="form-control" name="fechaEntrada" type="hidden" placeholder="Fecha Programada" value="<?= $fecha_actual ?>">
                <input class="form-control" name="horaEntrada" type="hidden" placeholder="Fecha Programada" value="<?= $hora_actual ?>">


                <div class="control-label">
                  <button class="btn btn-primary" type="submit" id="submitButton" disabled>Enviar</button>
                  <button class="btn btn-default" type="reset" onclick="handleBloquearSubmit()">Limpiar</button>
                  <button class="btn btn-danger" type="button" onclick="handleCancelar()">Cancelar</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="vistas/domicilio/agregar_Domicilio.js"></script>