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
                  <label class="control-label col-md-3" for="id_Cliente">Nombre del Cliente *</label>
                  <div class="col-md-8">
                    <select class="form-control" id="idc" name="id_Cliente" method="post" type="text" placeholder="Selecciona el nombre del cliente" required="" onchange=";toggleListadeclientes()">
                      <option value disabled>Seleccione un cliente</option>
                      <?php foreach ($this->modelo->ListarClientes() as $tallerSQL) : ?>
                        <option id="<?= $tallerSQL->idClientes ?>" value="<?= $tallerSQL->idClientes ?>"><?= $tallerSQL->nombreCliente, " ", $tallerSQL->apellidoP . " ", $tallerSQL->apellidoM ?></option>
                      <?php endforeach; ?>
                    </select><br>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3">Telefono del Cliente</label>
                  <div class="col-md-8">
                    <select class="form-control" id="listaTc" name="relefonoCliente" method="post" type="text" disabled>
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


                <div class="form-group">
                  <label class="control-label col-md-3">Direccion del Cliente</label>
                  <div class="col-md-8">
                    <select class="form-control" id="listaDc" name="direccionCliente" method="post" type="text" disabled>
                      <option value disabled>Seleccione un cliente</option>
                      <?php foreach ($this->modelo->ListarDomicilios() as $tallerSQL) : ?>
                        <option id="<?= $tallerSQL->idClientes ?>" value="<?= $tallerSQL->idClientes ?>"><?= $tallerSQL->domicilio ?></option>
                      <?php endforeach; ?>
                    </select><br>
                  </div>
                </div>


                <div class="col-lg-10">
                  <h4>Informacion del servicio</h4>
                </div>

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
                $fecha_actual = date("Y-m-d");
                $hora_actual = date("H:i:S");
                ?>
                <div class="form-group">
                  <div class="col-lg-10">
                    <input class="form-control" name="horaInicio" type="hidden" placeholder="Hora" value="<?= $hora_actual ?>">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-lg-10">
                    <input class="form-control" name="horaFinal" type="hidden">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-lg-10">
                    <input class="form-control" name="horasRealizadas" type="hidden" placeholder="horas realizadas" pattern="[0-9.]{1,12}">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="FechaProgramada">Fecha solicitud de servicio</label>
                  <div class="col-md-8">
                    <input class="form-control" name="fechaProgramada" type="date" min="<?= $fechadiadeHOY ?>" max="2030-01-01" placeholder="Fecha de solicitud de servicio" pattern="(19|20)(((([02468][048])|([13579][26]))-02-29)|(\d{2})-((02-((0[1-9])|1\d|2[0-8]))|((((0[13456789])|1[012]))-((0[1-9])|((1|2)\d)|30))|(((0[13578])|(1[02]))-31)))" value="" required="">
                  </div>
                </div>
                <div class="col-md-8">
                  <input class="form-control" name="fechaEntrada" type="hidden" placeholder="Fecha Programada" value="<?= $fecha_actual ?>">
                </div>

                <div class="form-group">

                  <div class="col-md-8">
                    <input class="form-control" name="horaEntrada" type="hidden" placeholder="Fecha Programada" value="<?= $hora_actual ?>">
                  </div>
                </div>
                <!--<label class="col-md-3" for="Contrasenia2">Confirma tu Contraseña</label>
                        <div class="col-lg-10">
                            <input class="form-control" name="contrasenia2" type="password" placeholder="Contraseña">
                        </div>-->
                <label class="col-md-3" id="advertencia">Faltan campos por llenar</label>

                <div class="form-group">

                  <div class="col-md-8">
                    <input class="form-control" name="estadoEquipo" type="hidden" value="1">
                  </div>
                </div>

                <div class="col-lg-10 col-lg-offset-2">
                  <button class="btn btn-default" type="button" onclick="cancelarDomicilio()">Cancelar</button>
                  <button class="btn btn-default" type="reset">Limpiar</button>
                  <button class="btn btn-primary" type="submit">Enviar</button>

                </div>

          </div>
        </div>
      </div>
    </div>
    <script>
      //este creo q no se usa
      function toggleButtonagregarDomicilio() {
        var idc = document.getElementById('idc').value;
        var obs = document.getElementById('obs').value;
        var fecha = document.getElementById('fecha').value;

        if (obs && fecha && idc) {
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
    <script>
      //Funcion para poner en automatico los datos del cliente seleccionandolo de la lista
      function toggleListadeclientes() {
        document.getElementById('listaTc').value = document.getElementById('idc').value;
        document.getElementById('listaCc').value = document.getElementById('idc').value;
        document.getElementById('listaDc').value = document.getElementById('idc').value;
        console.log("telefonmo" + document.getElementById('idc').value);
      }

      function cancelarDomicilio() {
        var result = confirm("¿Deseas regresar a la lista y deshacer el registro?");
        if (result == true) {
          window.location.href = '?c=domicilio';
        } else {

        }
      }
    </script>