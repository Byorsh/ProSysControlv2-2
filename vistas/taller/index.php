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
                    

    
    <!--aaaaaaaaa -->
    
    <form class="form-horizontal" method="POST"
    <?php
    $url_busqueda="";
    $url_paginacion="";
    $url_filtro="";
    if(isset($_GET['q'])){$url_busqueda="&q=".$_GET['q'];}
    if(isset($_GET['filtro'])){if($_GET['filtro']=="yaentregados"){
      $url_filtro="&filtro=yaentregados";
    }}
                      if(isset($_GET['pagina'])){
                        echo "action='?c=taller&a=Buscar$url_filtro'";
                        $url_paginacion ="&a=BuscaryPaginar&pagina=".$_GET['pagina'];
                      }
                      else{
                        
                        echo "action='?c=taller&a=Buscar$url_filtro'";
                      }
                      
                      ?>

    
    >
    
    <div class="form-group">

                    
                    <div class="col-md-8">
                    <?php if(isset($_GET['q'])){
                         ?><input class="form-control" name="campo" id="campo" type="text" required value="<?=$_GET['q']?>">
                         <button class="btn btn-primary" type="submit" id="submitButton">Buscar</button>
                         <a class="btn btn-warning btn-flat" href="?c=taller<?= $url_paginacion ?>"  id="borrarBusButton">Borrar busqueda</a>
                         <a class="btn btn-danger btn-flat" href="?c=taller&a=MostrarYaEntregados"  id="borrarBusButton">Mostrar ya entregados</a>
                         <?php //echo $url_busqueda;
                      }
                      else{
                        ?>
                        <input class="form-control" name="campo" id="campo" type="text" required>
                        <button class="btn btn-primary" type="submit" id="submitButton">Buscar</button>
                        <a class="btn btn-warning btn-flat" href="?c=taller"  id="borrarBusButton">Borrar busqueda</a>
                        <a class="btn btn-danger btn-flat" href="?c=taller&a=MostrarYaEntregados"  id="borrarBusButton">Mostrar ya entregados</a>
                        <?php
                      }
                      ?>
                      
                      
                    </div>
                  </div>
                  

    <div>
</form>

    
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" role="grid" id="sampleTable">
              <thead>

                <tr>
                  <th>ID </th>
                  <th>Id del Cliente</th>
                  <th>Numero de serie</th>
                  <th>Marca</th>
                  <th>Modelo</th>
                  <th>Observaciones</th>
                  <th>Accesorios</th>
                  <th>Estado</th>
                  <th>Fecha de Entrada </th>
                  <th>Fecha Prometida </th>
                  <th>Tecnico Asignado</th>
                  <?php if ($_SESSION['tipoUsuario'] != 'Secretario') { ?> <th>Acciones</th> <?php } ?>
                </tr>
              </thead>
              <tbody>
                <?php
                $registros_por_pagina = 10;
                $total_registros = count($this->modelo->Listar());
                
                // PRIMERO PREGUNTA SI HAY ALGUNA BUSQUEDA
                
                
                  if (isset($_GET['pagina'])) {
                    $pagina_actual = $_GET['pagina'];
                    if(isset($_GET['filtro'])){if($_GET['filtro']=="yaentregados"){$total_registros = count($this->modelo->ListarYaEntregados());}}
                    foreach ($this->modelo->Paginar(($_GET['pagina'] - 1) * $registros_por_pagina, $registros_por_pagina,"nada") as $tallerSQL) : ?>
                      <tr>
                        <td><?= $tallerSQL->id ?></td>
                        <td><?= $tallerSQL->idCliente ?></td>
                        <td><?= $tallerSQL->ns ?></td>
                        <td><?= $tallerSQL->marca ?></td>
                        <td><?= $tallerSQL->modelo ?></td>
                        <td><?= $tallerSQL->observaciones ?></td>
                        <td><?= $tallerSQL->accesorios ?></td>
                        <td ><?php
                        switch($tallerSQL->estadoEquipo){
                          case "1":
                            echo "Recien entrante";
                            break;
                          case "2":
                            echo "En diagnostico";
                            break;
                          case "3":
                            echo "Diagnosticado";
                            break;
                          case "4":
                            echo "Presupuestado";
                            break;
                          case "5":
                            echo "Presupuesto aceptado";
                            break;
                          case "6":
                            echo "En reparacion";
                            break;
                          case "7":
                            echo "Reparado";
                            break;
                          case "8":
                            echo "No reparado";
                            break;
                          case "9":
                            echo "En espera para entrega";
                            break;
                          case "10":
                            echo "Entregado";
                            break;
                          default:
                            echo "Error";
                            break;

                        }
                          
                         ?></td>
                        <td><?= $tallerSQL->fechaEntrada ?></td>
                        <td><?= $tallerSQL->fechaPrometida ?></td>
                        <?php $idreparacion = $tallerSQL->id;
                        foreach ($this->modelo->buscarTecnicoAsignado($tallerSQL->tecnicoAsignado) as $tallerSQL) :  ?>
                          <td><?= $tallerSQL->nombre, " ", $tallerSQL->apellido ?></td>
                        <?php endforeach; ?>
                        <!--condicion para ocultar si es secretario-->
                        <?php if ($_SESSION['tipoUsuario'] != 'Secretario') { ?>
                          <td><a class="btn btn-info btn-flat" href="?c=taller&a=FormModificar&id=<?= $idreparacion ?>"><i class="fa fa-lg fa-refresh"></i></a>
                            <a class="btn btn-warning btn-flat" onclick="return confirm('¿Realmente desea eliminar?')" href="?c=taller&a=Borrar&id=<?= $idreparacion ?>"><i class="fa fa-lg fa-trash"></i></a>
  
                          <?php } ?>
                          <a class="btn btn-success btn-flat" href="?c=taller&a=FormConsultar&id=<?= $idreparacion ?>"><i class="fa fa-lg fa-eye"></i></a>
                          </td>
                      </tr>
                    <?php endforeach;
                  } /*CASO CUANDO ESTA POR DEFECTO*/else {
                    $pagina_actual = 1;
                    //CONDICION POR SI EL FILTRO DE YA ENTREGADOS ESTA ACTIVO
                    if(isset($_GET['filtro'])){if($_GET['filtro']=="yaentregados"){$total_registros = count($this->modelo->ListarYaEntregados());}}
                    foreach ($this->modelo->Paginar(0, $registros_por_pagina,"nada") as $tallerSQL) : ?>
                      <tr>
                        <td><?= $tallerSQL->id ?></td>
                        <td><?= $tallerSQL->idCliente ?></td>
                        <td><?= $tallerSQL->ns ?></td>
                        <td><?= $tallerSQL->marca ?></td>
                        <td><?= $tallerSQL->modelo ?></td>
                        <td><?= $tallerSQL->observaciones ?></td>
                        <td><?= $tallerSQL->accesorios ?></td>
                        <td ><?php
                        switch($tallerSQL->estadoEquipo){
                          case "1":
                            echo "Recien entrante";
                            break;
                          case "2":
                            echo "En diagnostico";
                            break;
                          case "3":
                            echo "Diagnosticado";
                            break;
                          case "4":
                            echo "Presupuestado";
                            break;
                          case "5":
                            echo "Presupuesto aceptado";
                            break;
                          case "6":
                            echo "En reparacion";
                            break;
                          case "7":
                            echo "Reparado";
                            break;
                          case "8":
                            echo "No reparado";
                            break;
                          case "9":
                            echo "En espera para entrega";
                            break;
                          case "10":
                            echo "Entregado";
                            break;
                          default:
                            echo "error";
                            break;

                        }
                          
                         ?></td>
                        <td><?= $tallerSQL->fechaEntrada ?></td>
                        <td><?= $tallerSQL->fechaPrometida ?></td>
                        <?php $idreparacion = $tallerSQL->id;
                        foreach ($this->modelo->buscarTecnicoAsignado($tallerSQL->tecnicoAsignado) as $tallerSQL) :  ?>
                          <td><?= $tallerSQL->nombre, " ", $tallerSQL->apellido ?></td>
                        <?php endforeach; ?>
                        <!--condicion para ocultar si es secretario-->
                        <?php if ($_SESSION['tipoUsuario'] != 'Secretario') { ?>
                          <td><a class="btn btn-info btn-flat" href="?c=taller&a=FormModificar&id=<?= $idreparacion ?>"><i class="fa fa-lg fa-refresh"></i></a>
                            <a class="btn btn-warning btn-flat" onclick="return confirm('¿Realmente desea eliminar?')" href="?c=taller&a=Borrar&id=<?= $idreparacion ?>"><i class="fa fa-lg fa-trash"></i></a>
  
                          <?php } ?>
                          <a class="btn btn-success btn-flat" href="?c=taller&a=FormConsultar&id=<?= $idreparacion ?>"><i class="fa fa-lg fa-eye"></i></a>
                          </td>
                      </tr>
                  <?php 
                  
                  /*$arreglo[$posicionX][$posicionY]=$posicionX+$posicionY;
                  $posicionX++; $posicionY++;*/
                  endforeach;
                  /* CODIGO QUE PODRIA OPTIMIZAR TODO
		              $posicionX=0; $posicionY=0;
                  foreach ($arreglo as $algo) :
                    
                    echo $arreglo[$posicionX][$posicionX];
                    $posicionX++;
                  endforeach;*/
                  }
                
                

                // Calcular el offset
                ?>



              </tbody>
            </table>
          </div>
          <?php
          //CONDICION POR hay busqueda
          if(isset($_GET['q'])){$total_registros = count($this->modelo->BuscarEnTabla($_GET['q']));}
          $num_paginas = ceil($total_registros / $registros_por_pagina);
          //$num_paginas = 3;
          echo "<a class='btn-btn-secondary' type='button'>Paginas  </a> ";
          for ($i = 1; $i <= $num_paginas; $i++) {
            //echo "<a href='?pagina=$i'>$i</a> ";
            //CONDICION POR SI EL FILTRO DE YA ENTREGADOS ESTA ACTIVO
            if(isset($_GET['filtro'])){if($_GET['filtro']=="yaentregados"){
                echo "<a class='btn-btn-secondary' type='button' href='?c=taller&a=PaginarNyaentregados&filtro=yaentregados&pagina=$i'>$i</a> ";
              }
              else{
                echo "<a class='btn-btn-secondary' type='button' href='?c=taller&a=PaginarN&pagina=$i'>$i </a> ";
              }
            }
            else{echo "<a class='btn-btn-secondary' type='button' href='?c=taller&a=PaginarN&pagina=$i$url_busqueda'>$i</a> ";}
          }
          //if(isset($_GET['filtro'])){if($_GET['filtro']=="yaentregados"){echo "c mamut";}else if($_GET['filtro']==""){echo "no vale";}}else{echo "no";}
          ?>

        </div>
      </div>
    </div>
  </div>
</div>