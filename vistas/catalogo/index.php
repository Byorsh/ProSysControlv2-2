<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1>Catalogo de articulos</h1>
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
                    <?php foreach($this->modelo->Listar() as $clienteSQL):?>
                    <tr>
                      <td><?=$clienteSQL->idClientes?></td>
                      <td><?=$clienteSQL->rfc?></td>
                      <td><?=$clienteSQL->nombreCliente?></td>
                      <td><?=$clienteSQL->apellidoP?></td>
                      <td><?=$clienteSQL->nombreEmpresa?></td>
                      <td><?=$clienteSQL->telefono?></td>
                      <td><?=$clienteSQL->email?></td>
                      <td><?=$clienteSQL->domicilio?></td>
                      
                      <td><a class="btn btn-info btn-flat" href="?c=cliente&a=FormCrear&id=<?=$clienteSQL->idClientes?>"><i class="fa fa-lg fa-refresh"></i></a> <a class="btn btn-warning btn-flat" href="?c=cliente&a=Borrar&id=<?=$clienteSQL->idClientes?>"><i class="fa fa-lg fa-trash"></i></a></td>
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