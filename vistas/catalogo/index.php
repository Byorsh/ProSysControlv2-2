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


  <form class="form-horizontal" method="POST" <?php
                                              $url_busqueda = "";
                                              $url_paginacion = "";
                                              if (isset($_GET['q'])) {
                                                $url_busqueda = "&q=" . $_GET['q'];
                                              }
                                              if (isset($_GET['pagina'])) {
                                                echo "action='?c=catalogo&a=Buscar'";
                                                $url_paginacion = "&a=BuscaryPaginar&pagina=" . $_GET['pagina'];
                                              } else {

                                                echo "action='?c=catalogo&a=Buscar'";
                                              }

                                              ?>>

    <div class="form-group">


      <div class="col-md-8">
        <?php if (isset($_GET['q'])) {
        ?><input class="form-control" name="campo" id="campo" type="text" required value="<?= $_GET['q'] ?>">
          <button class="btn btn-primary" type="submit" id="submitButton">Buscar</button>
          <a class="btn btn-warning btn-flat" href="?c=catalogo<?= $url_paginacion ?>" id="borrarBusButton">Borrar busqueda</a>
        <?php //echo $url_busqueda;
        } else {
        ?>
          <input class="form-control" name="campo" id="campo" type="text" required>
          <button class="btn btn-primary" type="submit" id="submitButton">Buscar</button>
          <a class="btn btn-warning btn-flat" href="?c=catalogo" id="borrarBusButton">Borrar busqueda</a>
        <?php
        }
        ?>


      </div>
    </div>


    <div>
  </form>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" role="grid" id="sampleTable">
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
                <?php
                $registros_por_pagina = 10;
                $total_registros = count($this->modelo->Listar());

                if (isset($_GET['pagina'])) {
                  $pagina_actual = $_GET['pagina'];

                  foreach ($this->modelo->Paginar(($_GET['pagina'] - 1) * $registros_por_pagina, $registros_por_pagina) as $catalogoSQL) : ?>
                    <tr>
                      <td><?= $catalogoSQL->idProducto ?></td>
                      <td><?= $catalogoSQL->descripcion ?></td>
                      <td><?= $catalogoSQL->marca ?></td>
                      <td><?= $catalogoSQL->modelo ?></td>
                      <td><?= $catalogoSQL->cantidad ?></td>
                      <td><?= $catalogoSQL->precioCompra ?></td>
                      <td><?= $catalogoSQL->precioVenta ?></td>

                      <td><?php if ($_SESSION['tipoUsuario'] != 'Secretario') { $idp = $catalogoSQL->idProducto?>
                      <td><a class="btn btn-info btn-flat" href="?c=catalogo&a=FormCrear&id=<?= $idp ?>"><i class="fa fa-lg fa-refresh"></i></a>
                        <a class="btn btn-warning btn-flat" onclick="Eliminar('?c=catalogo&a=Borrar&id=<?= $idp ?>')"><i class="fa fa-lg fa-trash"></i></a>
                      <?php } ?>
                      <a class="btn btn-success btn-flat" href="?c=catalogo&a=FormConsultar&id=<?= $idp ?>"><i class="fa fa-lg fa-eye"></i></a>
                      </td>
                    </tr>
                    </tr>
                  <?php endforeach;
                } else {
                  $pagina_actual = 1;
                  foreach ($this->modelo->Paginar(0, $registros_por_pagina) as $catalogoSQL) : ?>
                    <tr>
                      <td><?= $catalogoSQL->idProducto ?></td>
                      <td><?= $catalogoSQL->descripcion ?></td>
                      <td><?= $catalogoSQL->marca ?></td>
                      <td><?= $catalogoSQL->modelo ?></td>
                      <td><?= $catalogoSQL->cantidad ?></td>
                      <td><?= $catalogoSQL->precioCompra ?></td>
                      <td><?= $catalogoSQL->precioVenta ?></td>

                      <td><?php if ($_SESSION['tipoUsuario'] != 'Secretario') {  $idp = $catalogoSQL->idProducto ?>
                          <a class="btn btn-info btn-flat" href="?c=catalogo&a=FormCrear&id=<?= $idp ?>"><i class="fa fa-lg fa-refresh"></i></a>
                          <a class="btn btn-warning btn-flat" onclick="Eliminar('?c=catalogo&a=Borrar&id=<?= $idp ?>')"><i class="fa fa-lg fa-trash"></i></a>

                        <?php } ?>
                        <a class="btn btn-success btn-flat" href="?c=catalogo&a=FormConsultar&id=<?= $idp ?>"><i class="fa fa-lg fa-eye"></i></a>
                      </td>
                    </tr>
                <?php endforeach;
                }
                ?>
              </tbody>
            </table>
          </div>
          <div class="dataTables_paginate paging_simple_numbers">
            <?php
            if (isset($_GET['q'])) {
              $total_registros = count($this->modelo->BuscarEnTabla($_GET['q']));
            }
            $num_paginas = ceil($total_registros / $registros_por_pagina);
            if ($num_paginas == 0) {
              $regex = new Regex;
              $regex->sweet_alerts("No se encontro ningun resultado");
            }
            echo "<a class='btn-btn-secondary' type='button'>Paginas  </a> ";
            for ($i = 1; $i <= $num_paginas; $i++) {
              echo "<a class='page-link' href='?c=catalogo&a=PaginarN&pagina=$i$url_busqueda'>$i</a> ";
            }
            ?>
          </div>
          </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<script>
      function Eliminar(url) {
            Swal.fire({
                title: '¿Deseas ELIMINAR el registro?',
                showDenyButton: true,
                confirmButtonText: 'Confirmar',
                denyButtonText: `Cancelar`,
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            })
        }

</script>