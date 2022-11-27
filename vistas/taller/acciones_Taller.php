<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-edit"></i><?=$titulo?> Orden de Reparacion</h1>
            <p>Modulo para <?=$titulo?> Orden de Reparacion</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li>Orden de Reparacion</li>
              <li><a href="#"><?=$titulo?> Orden de Reparacion</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <form method="POST" action="?c=taller&a=Guardar">
          <div class="col-md-6">
            <div class="card">
              <h3 class="card-title">Datos del Cliente</h3>
              <div class="card-body">
                <form>
                  <div class="form-group">
                    <label class="control-label" for="IdCliente">ID del Cliente</label>
                    <input class="form-control" name="idCliente" type="text" placeholder="Introduce el id del cliente">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Nombre del Cliente</label>
                    <input class="form-control" type="text" placeholder="Nombre del cliente" disabled>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Telefono del Cliente</label>
                    <input class="form-control" type="text" placeholder="Telefono del cliente" disabled>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Correo del Cliente</label>
                    <input class="form-control" type="text" placeholder="Correo del cliente" disabled>
                  </div>
                  
                </form>
              </div>
              <div class="card-footer">
                <button class="btn btn-primary icon-btn" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Buscar Cliente</button>&nbsp;&nbsp;&nbsp;
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <h3 class="card-title">Datos del Equipo</h3>
              <div class="card-body">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label class="control-label col-md-3" for="Ns">Numero de Serie</label>
                    <div class="col-md-8">
                      <input class="form-control" name="ns" type="text" placeholder="Introduce el numero de serie del equipo">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3" for="Marca">Marca</label>
                    <div class="col-md-8">
                      <input class="form-control col-md-8" name="marca" type="email" placeholder="Marca del equipo">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3" for="Modelo">Modelo</label>
                    <div class="col-md-8">
                    <input class="form-control col-md-8" name="modelo" type="email" placeholder="Modelo del equipo">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3" for="TipoEquipo">Tipo de Equipo</label>
                    <div class="col-md-8">
                      <input class="form-control col-md-8" name="tipoEquipo" type="email" placeholder="Tipo de equipo">
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
                  
                </form>
              </div>
              
            </div>
          </div>
          <div class="clearix"></div>
          <div class="col-md-12">
            <div class="card">
              <h3 class="card-title"><?=$titulo?> Orden</h3>
              <div class="card-body3">
                <form class="form-inline">
                  <div class="form-group">
                    <label class="control-label" for="TecnicoAsignado">Tecnico Asignado</label>
                    <input class="form-control" name="tecnicoAsignado" type="text" placeholder="Id del Tecnico asignado">
                  </div>
                  &nbsp;&nbsp;
                  <div class="form-group">
                    <label class="control-label" for="FechaPrometida">Fecha Prometida</label>
                    <input class="form-control" name="fechaPrometida" type="text" placeholder="Fecha prometida">
                  </div>
                  
                </form>
              </div>
            </div>
          </div>
            <div class="form-group">
              &nbsp;&nbsp;&nbsp;
              <button class="btn btn-primary icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Subir</button>
              &nbsp;&nbsp;&nbsp;
              <a class="btn btn-default icon-btn" href="?c=taller"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
            </div>
          </form>
        </div>
      </div>