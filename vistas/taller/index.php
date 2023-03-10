<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1>Lista de Equipos en Taller</h1>
            <!--<ul class="breadcrumb side">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li>Tables</li>
              <li class="active"><a href="#">Data Table</a></li>
            </ul>-->
          </div>
          <div><a class="btn btn-primary btn-flat" href="?c=taller&a=FormCrear"><i class="fa fa-lg fa-plus"></i></a></div>
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
                    <?php
                    $registros_por_pagina = 10;
                    $porfavor2 = count($this->modelo->Listar());
                    //echo $porfavor2;
                    $total_registros = $porfavor2;//$this->modelo->Paginar(1);
                    //echo $total_registros;

                    // Obtener el número de página actual
                    if (isset($_GET['pagina'])) {
                        $pagina_actual = $_GET['pagina'];
                        foreach($this->modelo->Paginar(($_GET['pagina']-1)*10) as $tallerSQL):?>
                          <tr>
                            <td><?=$tallerSQL->id?></td>
                            <td><?=$tallerSQL->idCliente?></td>
                            <td><?=$tallerSQL->ns?></td>
                            <td><?=$tallerSQL->marca?></td>
                            <td><?=$tallerSQL->modelo?></td>
                            <td><?=$tallerSQL->observaciones?></td>
                            <td><?=$tallerSQL->accesorios?></td>
                            <td><?=$tallerSQL->estadoEquipo?></td>
                            <td><?=$tallerSQL->fechaEntrada?></td>
                            <td><?=$tallerSQL->fechaPrometida?></td>
                            <!--condicion para ocultar si es secretario-->
                            <?php if($_SESSION['tipoUsuario']!='Secretario'){?>
                            <td><a class="btn btn-info btn-flat" href="?c=taller&a=FormModificar&id=<?=$tallerSQL->id?>"><i class="fa fa-lg fa-refresh"></i></a>
                                <a class="btn btn-warning btn-flat" onclick = "return confirm('¿Realmente desea eliminar?')" href="?c=taller&a=Borrar&id=<?=$tallerSQL->id?>"><i class="fa fa-lg fa-trash"></i></a>
                                
                            <?php } ?>
                                <a class="btn btn-success btn-flat" href="?c=taller&a=FormConsultar&id=<?=$tallerSQL->id?>"><i class="fa fa-lg fa-eye"></i></a></td>
                          </tr>
                          <?php endforeach;
                    } else {
                        $pagina_actual = 1;
                        foreach($this->modelo->Paginar(0) as $tallerSQL):?>
                          <tr>
                            <td><?=$tallerSQL->id?></td>
                            <td><?=$tallerSQL->idCliente?></td>
                            <td><?=$tallerSQL->ns?></td>
                            <td><?=$tallerSQL->marca?></td>
                            <td><?=$tallerSQL->modelo?></td>
                            <td><?=$tallerSQL->observaciones?></td>
                            <td><?=$tallerSQL->accesorios?></td>
                            <td><?=$tallerSQL->estadoEquipo?></td>
                            <td><?=$tallerSQL->fechaEntrada?></td>
                            <td><?=$tallerSQL->fechaPrometida?></td>
                            <!--condicion para ocultar si es secretario-->
                            <?php if($_SESSION['tipoUsuario']!='Secretario'){?>
                            <td><a class="btn btn-info btn-flat" href="?c=taller&a=FormModificar&id=<?=$tallerSQL->id?>"><i class="fa fa-lg fa-refresh"></i></a>
                                <a class="btn btn-warning btn-flat" onclick = "return confirm('¿Realmente desea eliminar?')" href="?c=taller&a=Borrar&id=<?=$tallerSQL->id?>"><i class="fa fa-lg fa-trash"></i></a>
                                
                            <?php } ?>
                                <a class="btn btn-success btn-flat" href="?c=taller&a=FormConsultar&id=<?=$tallerSQL->id?>"><i class="fa fa-lg fa-eye"></i></a></td>
                          </tr>
                          <?php endforeach;
                    }

                    // Calcular el offset
                    $offset = ($pagina_actual - 1) * $registros_por_pagina;
                    ?>


                    
                  </tbody>
                </table>
                <?php
                $num_paginas = ceil($total_registros / $registros_por_pagina);
                //$num_paginas = 3;
                for ($i=1; $i<=$num_paginas; $i++) {
                    //echo "<a href='?pagina=$i'>$i</a> ";
                    echo "<a href='?c=taller&a=PaginarN&pagina=$i'>$i</a> ";
                }
                ?>

              </div>
            </div>
          </div>
        </div>
      </div>