<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1>Lista de Servicios a Domicilio</h1>
            <!--<ul class="breadcrumb side">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li>Tables</li>
              <li class="active"><a href="#">Data Table</a></li>
            </ul>-->
          </div>
          <div><a class="btn btn-primary btn-flat" href="?c=domicilio&a=FormCrear"><i class="fa fa-lg fa-plus"></i></a></div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Id del Cliente</th>
                      <th>Numero de serie</th>
                      <th>Marca</th>
                      <th>Modelo</th>
                      <th>Observaciones</th>
                      <th>Accesorios</th>
                      <th>Estado</th>
                      <th>Fecha de Entrada</th>
                      
                      <th>Fecha Prometida</th>
                      <?php if($_SESSION['tipoUsuario']!='Secretario'){?> <th>Acciones</th> <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($this->modelo->Listar() as $domicilioSQL):?>
                      <tr>
                        <td><?=$domicilioSQL->id?></td>
                        <td><?=$domicilioSQL->idCliente?></td>
                        <td><?=$domicilioSQL->ns?></td>
                        <td><?=$domicilioSQL->marca?></td>
                        <td><?=$domicilioSQL->modelo?></td>
                        <td><?=$domicilioSQL->observaciones?></td>
                        <td><?=$domicilioSQL->accesorios?></td>
                        <td><?=$domicilioSQL->estadoEquipo?></td>
                        <td><?=$domicilioSQL->fechaEntrada?></td>
                        <td><?=$domicilioSQL->fechaPrometida?></td>
                        <!--condicion para ocultar si es secretario-->
                        <?php if($_SESSION['tipoUsuario']!='Secretario'){?>
                        <td><a class="btn btn-info btn-flat" href="?c=taller&a=FormModificar&id=<?=$domicilioSQL->id?>"><i class="fa fa-lg fa-refresh"></i></a>
                            <a class="btn btn-warning btn-flat" onclick = "return confirm('¿Realmente desea eliminar?')" href="?c=taller&a=Borrar&id=<?=$domicilioSQL->id?>"><i class="fa fa-lg fa-trash"></i></a></td>
                        <?php }?>
                      </tr>
                      <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>