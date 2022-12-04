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
            <a class="btn btn-primary btn-flat" href="?c=catalogo&a=FormCrear"><i class="fa fa-lg fa-plus"></i></a>

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
                      <th>Descripcion</th>
                      <th>Marca</th>
                      <th>Modelo</th>
                      <th>Cantidad</th>
                      <th>Precio de Compra</th>
                      <th>Precio de Venta</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($this->modelo->Listar() as $catalogoSQL):?>
                    <tr>
                      <td><?=$catalogoSQL->idProducto?></td>
                      <td><?=$catalogoSQL->descripcion?></td>
                      <td><?=$catalogoSQL->marca?></td>
                      <td><?=$catalogoSQL->modelo?></td>
                      <td><?=$catalogoSQL->cantidad?></td>
                      <td><?=$catalogoSQL->precioCompra?></td>
                      <td><?=$catalogoSQL->precioVenta?></td>
                      
                      <td><a class="btn btn-info btn-flat" href="?c=catalogo&a=FormCrear&id=<?=$catalogoSQL->idProducto?>"><i class="fa fa-lg fa-refresh"></i></a> 
                          <a class="btn btn-warning btn-flat" onclick = "return confirm('¿Realmente desea eliminar?')" href="?c=catalogo&a=Borrar&id=<?=$catalogoSQL->idProducto?>"><i class="fa fa-lg fa-trash"></i></a></td>
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