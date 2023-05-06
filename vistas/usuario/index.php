<div class="content-wrapper">
  <div class="page-title">
    <div>
      <h1>Lista de Usuarios</h1>
      <!--<ul class="breadcrumb side">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li>Tables</li>
              <li class="active"><a href="#">Data Table</a></li>
            </ul>-->
    </div>
    <div>
      <?php
      require_once 'modelos/regex.php';
      $regex = new Regex;
      ?>
      <!--condicion para ocultar si es secretario-->
      <?php if ($_SESSION['tipoUsuario'] != 'Secretario') { ?>
        <a class="btn btn-primary btn-flat" href="?c=usuario&a=FormCrear"><i class="fa fa-lg fa-plus"></i></a>

      <?php } ?>
    </div>
  </div>

  <form class="form-horizontal" method="POST" <?php
                                              $url_busqueda = "";
                                              $url_paginacion = "";
                                              if (isset($_GET['q'])) {
                                                $url_busqueda = "&q=" . $_GET['q'];
                                              }
                                              if (isset($_GET['pagina'])) {
                                                echo "action='?c=usuario&a=Buscar'";
                                                $url_paginacion = "&a=BuscaryPaginar&pagina=" . $_GET['pagina'];
                                              } else {

                                                echo "action='?c=usuario&a=Buscar'";
                                              }

                                              ?>>

    <div class="form-group">


      <div class="col-md-8">
        <?php if (isset($_GET['q'])) {
        ?><input class="form-control" name="campo" id="campo" type="text" required value="<?= $_GET['q'] ?>">
          <button class="btn btn-primary" type="submit" id="submitButton">Buscar</button>
          <a class="btn btn-warning btn-flat" href="?c=usuario<?= $url_paginacion ?>" id="borrarBusButton">Borrar busqueda</a>
        <?php //echo $url_busqueda;
        } else {
        ?>
          <input class="form-control" name="campo" id="campo" type="text" required>
          <button class="btn btn-primary" type="submit" id="submitButton">Buscar</button>
          <a class="btn btn-warning btn-flat" href="?c=usuario" id="borrarBusButton">Borrar busqueda</a>
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
                  <th>RFC</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Telefono</th>
                  <!--<th>Email</th>-->
                  <th>Usuario</th>
                  <!--<th>Contraseña</th>-->
                  <th>Privilegio</th>
                  <!--condicion para ocultar si es secretario-->
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $registros_por_pagina = 10;
                $total_registros = count($this->modelo->Listar());

                if (isset($_GET['pagina'])) {
                  $pagina_actual = $_GET['pagina'];
                  foreach ($this->modelo->Paginar(($_GET['pagina'] - 1) * $registros_por_pagina, $registros_por_pagina) as $usuarioSQL) : ?>
                    <tr>
                    <td><?= $usuarioSQL->id ?></td>
                      <td><?= $usuarioSQL->rfc ?></td>
                      <td><?= $usuarioSQL->nombre ?></td>
                      <td><?= $usuarioSQL->apellido ?></td>
                      <td><?= $usuarioSQL->telefono ?></td>
                      <!--<td><?= $usuarioSQL->email ?></td>-->
                      <td><?= $usuarioSQL->user ?></td>
                      <!--<td><?= $usuarioSQL->contrasenia ?></td>-->
                      <td><?= $usuarioSQL->privilegio ?></td>
                      <td><?php if ($_SESSION['tipoUsuario'] != 'Secretario') { ?>
                          <a class="btn btn-info btn-flat" href="?c=usuario&a=FormCrear&id=<?= $usuarioSQL->id ?>"><i class="fa fa-lg fa-refresh"></i></a>
                          <a class="btn btn-warning btn-flat" onclick="return confirm('¿Realmente desea eliminar?')" href="?c=usuario&a=Borrar&id=<?= $usuarioSQL->id ?>"><i class="fa fa-lg fa-trash"></i></a>

                        <?php } ?>
                        <a class="btn btn-success btn-flat" href="?c=usuario&a=FormConsultar&id=<?= $usuarioSQL->id ?>"><i class="fa fa-lg fa-eye"></i></a>
                      </td>
                    </tr>
                  <?php endforeach;
                } else {
                  $pagina_actual = 1;
                  foreach ($this->modelo->Paginar(0, $registros_por_pagina) as $usuarioSQL) : ?>
                    <tr>
                      <td><?= $usuarioSQL->id ?></td>
                      <td><?= $usuarioSQL->rfc ?></td>
                      <td><?= $usuarioSQL->nombre ?></td>
                      <td><?= $usuarioSQL->apellido ?></td>
                      <td><?= $usuarioSQL->telefono ?></td>
                      <!--<td><?= $usuarioSQL->email ?></td>-->
                      <td><?= $usuarioSQL->user ?></td>
                      <!--<td><?= $usuarioSQL->contrasenia ?></td>-->
                      <td><?= $usuarioSQL->privilegio ?></td>
                      <td><?php if ($_SESSION['tipoUsuario'] != 'Secretario') { ?>
                          <a class="btn btn-info btn-flat" href="?c=usuario&a=FormCrear&id=<?= $usuarioSQL->id ?>"><i class="fa fa-lg fa-refresh"></i></a>
                          <a class="btn btn-warning btn-flat" onclick="return confirm('¿Realmente desea eliminar?')" href="?c=usuario&a=Borrar&id=<?= $usuarioSQL->id ?>"><i class="fa fa-lg fa-trash"></i></a>

                        <?php } ?>
                        <a class="btn btn-success btn-flat" href="?c=usuario&a=FormConsultar&id=<?= $usuarioSQL->id ?>"><i class="fa fa-lg fa-eye"></i></a>
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
              echo "<a class='page-link' href='?c=usuario&a=PaginarN&pagina=$i$url_busqueda'>$i</a> ";
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
<?php
if(isset($_GET['guardado'])){if($_GET['guardado']=='v'){
  $regex = new Regex();
  $regex->sweet_alerts("Registro");
}}
?>