<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1>Lista de Clientes</h1>
            <!--<ul class="breadcrumb side">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li>Tables</li>
              <li class="active"><a href="#">Data Table</a></li>
            </ul>-->
          </div>
          <div>
            <a class="btn btn-primary btn-flat" href="?c=cliente&a=FormCrear"><i class="fa fa-lg fa-plus"></i></a>

            </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>RFC</th>
                      <th>Nombre</th>
                      <th>Apellido Paterno</th>
                      <th>Nombre de la Empresa</th>
                      <th>Telefono</th>
                      <th>Email</th>
                      <th>Domicilio</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($this->modelo->Listar() as $u):?>
                    <tr>
                      <td><?=$u->idClientes?></td>
                      <td><?=$u->rfc?></td>
                      <td><?=$u->nombreCliente?></td>
                      <td><?=$u->apellidoP?></td>
                      <td><?=$u->nombreEmpresa?></td>
                      <td><?=$u->telefono?></td>
                      <td><?=$u->email?></td>
                      <td><?=$u->domicilio?></td>
                      
                      <td><a class="btn btn-info btn-flat" href="?c=cliente&a=FormCrear&id=<?=$u->id?>"><i class="fa fa-lg fa-refresh"></i></a> <a class="btn btn-warning btn-flat" href="?c=cliente&a=Borrar&id=<?=$u->id?>"><i class="fa fa-lg fa-trash"></i></a></td>
                    </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>