<?php
require_once "modelos/database.php";
?>
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
                <div class="table-responsive">
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
                        <!--condicion para ocultar si es tecnico-->
                        <?php if($_SESSION['tipoUsuario']!='Tecnico'){?>
                        <th>Acciones</th>
                        <?php }?>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $registros_por_pagina = 5;
                      $porfavor2 = count($this->modelo->Listar());
                      //echo $porfavor2;
                      $total_registros = $porfavor2;//$this->modelo->Paginar(1);
                      //echo $total_registros;

                      // Obtener el número de página actual
                      if (isset($_GET['pagina'])) {
                          $pagina_actual = $_GET['pagina'];
                          foreach($this->modelo->Paginar(($_GET['pagina']-1)*$registros_por_pagina, $registros_por_pagina) as $clienteSQL):?>
                            <tr>
                                <td><?=$clienteSQL->idClientes?></td>
                                <td><?=$clienteSQL->rfc?></td>
                                <td><?=$clienteSQL->nombreCliente?></td>
                                <td><?=$clienteSQL->apellidoP?></td>
                                <td><?=$clienteSQL->nombreEmpresa?></td>
                                <td><?=$clienteSQL->telefono?></td>
                                <td><?=$clienteSQL->email?></td>
                                <td><?=$clienteSQL->domicilio?></td>
                                <?php $idc = $clienteSQL->idClientes ?>
                        
                              <!--condicion para ocultar si es secretario-->
                              <?php if($_SESSION['tipoUsuario']!='Secretario'){?>
                              <td><a class="btn btn-info btn-flat" href="?c=cliente&a=FormCrear&id=<?=$idc?>"><i class="fa fa-lg fa-refresh"></i></a>
                                  <a class="btn btn-warning btn-flat" onclick = "return confirm('¿Realmente desea eliminar?')" href="?c=cliente&a=Borrar&id=<?=$idc?>"><i class="fa fa-lg fa-trash"></i></a>
                                  
                              <?php } ?>
                                  <a class="btn btn-success btn-flat" href="?c=cliente&a=FormConsultar&id=<?=$idc?>"><i class="fa fa-lg fa-eye"></i></a></td>
                            </tr>
                            <?php endforeach;
                      } else {
                          $pagina_actual = 1;
                          foreach($this->modelo->Paginar(0,$registros_por_pagina) as $clienteSQL):?>
                           <tr>
                              <td><?=$clienteSQL->idClientes?></td>
                              <td><?=$clienteSQL->rfc?></td>
                              <td><?=$clienteSQL->nombreCliente?></td>
                              <td><?=$clienteSQL->apellidoP?></td>
                              <td><?=$clienteSQL->nombreEmpresa?></td>
                              <td><?=$clienteSQL->telefono?></td>
                              <td><?=$clienteSQL->email?></td>
                              <td><?=$clienteSQL->domicilio?></td>
                              <?php $idc = $clienteSQL->idClientes ?>
                        <!--condicion para ocultar si es tecnico-->
                        

                              <!--condicion para ocultar si es secretario-->
                              <?php if($_SESSION['tipoUsuario']!='Secretario'){?>
                              <td><a class="btn btn-info btn-flat" href="?c=cliente&a=FormCrear&id=<?=$idc?>"><i class="fa fa-lg fa-refresh"></i></a>
                                  <a class="btn btn-warning btn-flat" onclick = "return confirm('¿Realmente desea eliminar?')" href="?c=cliente&a=Borrar&id=<?=$idc?>"><i class="fa fa-lg fa-trash"></i></a>
                                  
                              <?php } ?>
                                  <a class="btn btn-success btn-flat" href="?c=cliente&a=FormConsultar&id=<?=$idc?>"><i class="fa fa-lg fa-eye"></i></a></td>
                            </tr>
                            <?php endforeach;
                      }

                      // Calcular el offset
                      $offset = ($pagina_actual - 1) * $registros_por_pagina;
                      ?>


                      
                    </tbody>
                  </table>
                </div>
                <?php
                $num_paginas = ceil($total_registros / $registros_por_pagina);
                //$num_paginas = 3;
                for ($i=1; $i<=$num_paginas; $i++) {
                    //echo "<a href='?pagina=$i'>$i</a> ";
                    echo "<a href='?c=cliente&a=PaginarN&pagina=$i'>$i</a> ";
                }
                ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>