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




        <form class="form-horizontal" method="POST"
    <?php
    date_default_timezone_set('America/Mazatlan');
    $banderayaterminados = true;
    $fecha_actual = date("Y-m-d");
    $fecha1 = new DateTime($fecha_actual);
    $url_busqueda="";
    $url_paginacion="";
    $url_filtro="";
    if(isset($_GET['q'])){$url_busqueda="&q=".$_GET['q'];}
    if(isset($_GET['filtro'])){if($_GET['filtro']=="yaentregados"){
      $url_filtro="&filtro=yaentregados";
    }}
                      if(isset($_GET['pagina'])){
                        echo "action='?c=domicilio&a=Buscar$url_filtro'";
                        $url_paginacion ="&a=BuscaryPaginar&pagina=".$_GET['pagina'];
                      }
                      else{
                        
                        echo "action='?c=domicilio&a=Buscar$url_filtro'";
                      }
                      
                      ?>

    
    >
    
    <div class="form-group">

                    
                    <div class="col-md-8">
                    <?php if(isset($_GET['q'])){
                         ?><input class="form-control" name="campo" id="campo" type="text" required value="<?=$_GET['q']?>">
                         <button class="btn btn-primary" type="submit" id="submitButton">Buscar</button>
                         <a class="btn btn-warning btn-flat" href="?c=domicilio<?= $url_paginacion ?>"  id="borrarBusButton">Borrar busqueda</a>
                         <a class="btn btn-danger btn-flat" href="?c=domicilio&a=MostrarYaEntregados"  id="borrarBusButton">Mostrar ya entregados</a>
                         <?php //echo $url_busqueda;
                      }
                      else{
                        ?>
                        <input class="form-control" name="campo" id="campo" type="text" required>
                        <button class="btn btn-primary" type="submit" id="submitButton">Buscar</button>
                        <a class="btn btn-warning btn-flat" href="?c=domicilio"  id="borrarBusButton">Borrar busqueda</a>
                        <a class="btn btn-danger btn-flat" href="?c=domicilio&a=MostrarYaEntregados"  id="borrarBusButton">Mostrar ya entregados</a>
                        <?php
                      }
                      ?>
                      
                      
                    </div>
                  </div>
                  
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
                        <th>Id del Cliente</th>
                        <th>Problematica</th>
                        <th>Estado</th>
                        <th>Cobrado</th>
                        <th>Fecha Programada</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                       $registros_por_pagina = 10;
                       $total_registros = count($this->modelo->Listar());

                       if (isset($_GET['pagina'])) {
                        $pagina_actual = $_GET['pagina'];
                        if(isset($_GET['filtro'])){if($_GET['filtro']=="yaentregados"){$total_registros = count($this->modelo->ListarYaEntregados());$banderayaterminados = false;}}
                        foreach ($this->modelo->Paginar(($_GET['pagina'] - 1) * $registros_por_pagina, $registros_por_pagina,"nada") as $domicilioSQL) : ?>
                          <tr>
                            <td><?=$domicilioSQL->id?></td>
                            <td><?=$domicilioSQL->id_Cliente?></td>
                            <td><?= limitar_cadena($domicilioSQL->problematica, 30, "...") ?></td>
                            <td><?=$domicilioSQL->estado?></td>
                            <td><?=$domicilioSQL->cobrado?></td>
                            <td <?php
                                  $fecha2 = new DateTime($domicilioSQL->fechaProgramada);
                                  $dias = ($fecha1->diff($fecha2))->days;
                                  if(($dias == 0 || $fecha1 > $fecha2) && $banderayaterminados){
                                    ?> style="background-color: rgb(255, 109, 96);" <?php 
                                  }else if(($dias <= 5) && $banderayaterminados){
                                    ?> style="background-color: rgb(243, 233, 159);" <?php
                                  }
                              ?>><?=$domicilioSQL->fechaProgramada?></td>
                            <!--condicion para ocultar si es secretario-->
                            <td><?php if($_SESSION['tipoUsuario']!='Secretario'){?>
                            <a class="btn btn-info btn-flat" href="?c=domicilio&a=FormModificar&id=<?=$domicilioSQL->id?>"><i class="fa fa-lg fa-refresh"></i></a>
                                <a class="btn btn-warning btn-flat" onclick = "Eliminar('?c=domicilio&a=Borrar&id=<?=$domicilioSQL->id?>')"><i class="fa fa-lg fa-trash"></i></a>
                                
                            <?php }?>
                                <a class="btn btn-success btn-flat" href="?c=domicilio&a=FormConsultar&id=<?=$domicilioSQL->id?>"><i class="fa fa-lg fa-eye"></i></a></td>
                          </tr>
                          <?php endforeach;
                       } else{
                        $pagina_actual = 1;
                        if(isset($_GET['filtro'])){if($_GET['filtro']=="yaentregados"){$total_registros = count($this->modelo->ListarYaEntregados());$banderayaterminados = false;}}
                        foreach ($this->modelo->Paginar(0, $registros_por_pagina,"nada") as $domicilioSQL) : ?>
                          <tr>
                            <td><?=$domicilioSQL->id?></td>
                              <td><?=$domicilioSQL->id_Cliente?></td>
                              <td><?= limitar_cadena($domicilioSQL->problematica, 30, "...") ?></td>
                              <td><?=$domicilioSQL->estado?></td>
                              <td><?=$domicilioSQL->cobrado?></td>
                              <td <?php
                                  $fecha2 = new DateTime($domicilioSQL->fechaProgramada);
                                  $dias = ($fecha1->diff($fecha2))->days;
                                  if(($dias == 0 || $fecha1 > $fecha2) && $banderayaterminados){
                                    ?> style="background-color: rgb(255, 109, 96);" <?php 
                                  }else if(($dias <= 5) && $banderayaterminados){
                                    ?> style="background-color: rgb(243, 233, 159);" <?php
                                  }
                              ?>><?=$domicilioSQL->fechaProgramada?></td>
                              <!--condicion para ocultar si es secretario-->
                              <td><?php if($_SESSION['tipoUsuario']!='Secretario'){?>
                              <a class="btn btn-info btn-flat" href="?c=domicilio&a=FormModificar&id=<?=$domicilioSQL->id?>"><i class="fa fa-lg fa-refresh"></i></a>
                                  <a class="btn btn-warning btn-flat" onclick = "Eliminar('?c=domicilio&a=Borrar&id=<?=$domicilioSQL->id?>')"><i class="fa fa-lg fa-trash"></i></a>
                                  
                              <?php }?>
                                  <a class="btn btn-success btn-flat" href="?c=domicilio&a=FormConsultar&id=<?=$domicilioSQL->id?>"><i class="fa fa-lg fa-eye"></i></a></td>
                          </tr>
                          <?php endforeach; } ?>
                       
                    </tbody>
                  </table>
                </div>
                <?php
                //CONDICION POR hay busqueda
                if(isset($_GET['q'])){$total_registros = count($this->modelo->BuscarEnTabla($_GET['q']));}
                $num_paginas = ceil($total_registros / $registros_por_pagina);
                if($num_paginas == 0){
                  $regex = new Regex;
                  $regex->sweet_alerts("No se encontro ningun resultado");
                }
                //$num_paginas = 3;
                echo "<a class='btn-btn-secondary' type='button'>Paginas  </a> ";
                for ($i = 1; $i <= $num_paginas; $i++) {
                  //echo "<a href='?pagina=$i'>$i</a> ";
                  //CONDICION POR SI EL FILTRO DE YA ENTREGADOS ESTA ACTIVO
                  if(isset($_GET['filtro'])){if($_GET['filtro']=="yaentregados"){
                      echo "<a class='btn-btn-secondary' type='button' href='?c=domicilio&a=PaginarNyaentregados&filtro=yaentregados&pagina=$i'>$i</a> ";
                    }
                    else{
                      echo "<a class='btn-btn-secondary' type='button' href='?c=domicilio&a=PaginarN&pagina=$i'>$i </a> ";
                    }
                  }
                  else{echo "<a class='btn-btn-secondary' type='button' href='?c=domicilio&a=PaginarN&pagina=$i$url_busqueda'>$i</a> ";}
                }
                //if(isset($_GET['filtro'])){if($_GET['filtro']=="yaentregados"){echo "filtroactivo";}else if($_GET['filtro']==""){echo "definido pero no puesto";}}else{echo "no";}
                ?>
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
<?php
                function limitar_cadena($cadena, $limite, $sufijo)
                {
                  // Si la longitud es mayor que el límite...
                  if (strlen($cadena) > $limite) {
                    // Entonces corta la cadena y ponle el sufijo
                    return substr($cadena, 0, $limite) . $sufijo;
                  }

                  // Si no, entonces devuelve la cadena normal
                  return $cadena;
                }
                ?>
