<div class="content-wrapper">
  <div class="page-title">
    <div>
      <h1><i class="fa fa-edit"></i><?=$titulo?> Equipo al Taller</h1>
      <p>Modulo para <?=$titulo?> Equipo al Taller</p>
    </div>
    <div>
      <ul class="breadcrumb">
        <li><i class="fa fa-home fa-lg"></i></li>
        <li>Taller</li>
        <li><a href="#"><?=$titulo?> Equipo al Taller</a></li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="row">
          
            <div class="well bs-component">
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
                        <label class="control-label col-md-3" for="IdCliente">ID del Cliente</label>
                        <div class="col-md-8">
                            <input class="form-control" name="idCliente" type="text" placeholder="Introduce el id del cliente">
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
                    <div class="col-lg-10">
                        <h4>Datos del Equipo</h4>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-md-3" for="Ns">Numero de Serie</label>
                    <div class="col-md-8">
                      <input class="form-control" name="ns" type="text" placeholder="Introduce el numero de serie del equipo">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3" for="Marca">Marca</label>
                    <div class="col-md-8">
                      <input class="form-control col-md-8" name="marca" type="text" placeholder="Marca del equipo">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3" for="Modelo">Modelo</label>
                    <div class="col-md-8">
                    <input class="form-control col-md-8" name="modelo" type="text" placeholder="Modelo del equipo">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3" for="TipoEquipo">Tipo de Equipo</label>
                    <div class="col-md-8">
                      <input class="form-control col-md-8" name="tipoEquipo" type="text" placeholder="Tipo de equipo">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3" for="Observaciones">Problematica del equipo</label>
                    <div class="col-md-8">
                      <textarea class="form-control" name="observaciones" rows="4" placeholder="Problema del equipo"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3" for="Accesorios">Accesorios</label>
                    <div class="col-md-8">
                      <textarea class="form-control" name="accesorios" rows="4" placeholder="Accesorios del equipo"></textarea>
                    </div>
                  </div>

                    <div class="col-lg-10">
                        <h4>Registrar Orden</h4>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3" for="TecnicoAsignado">Tecnico Asignado</label>
                        <div class="col-md-8">
                            <input class="form-control" name="tecnicoAsignado" type="text" placeholder="Id del Tecnico asignado">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3" for="FechaPrometida">Fecha Prometida</label>
                        <div class="col-md-8">
                            <input class="form-control" name="fechaPrometida" type="text" placeholder="Fecha prometida">
                        </div>
                    </div>

                    <div class="form-group">
                        
                        <div class="col-md-8">
                            <input class="form-control" name="fechaEntrada" type="hidden" placeholder="Fecha prometida">
                        </div>
                    </div>
                    <div class="form-group">
                        
                        <div class="col-md-8">
                            <input class="form-control" name="horaEntrada" type="hidden" placeholder="Fecha prometida">
                        </div>
                    </div>

                    <div class="form-group">
                        
                        <div class="col-md-8">
                            <input class="form-control" name="estadoEquipo" type="hidden" value="1">
                        </div>
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
        </div>
      </div>
    </div>
  </div>