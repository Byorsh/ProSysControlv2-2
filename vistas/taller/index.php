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
    $url_paginacion="";
                      if(isset($_GET['pagina'])){
                        echo "action='?c=taller&a=BuscaryPaginar&pagina=",$_GET['pagina'],"'";
                        $url_paginacion ="&a=BuscaryPaginar&pagina=".$_GET['pagina'];
                      }
                      else{
                        
                        echo "action='?c=taller&a=Buscar'";
                      }
                      ?>

    
    >
    
    <div class="form-group">

                    
                    <div class="col-md-8">
                    <?php if(isset($_GET['q'])){
                         ?><input class="form-control" name="campo" id="campo" type="text" required value="<?=$_GET['q']?>">
                         <button class="btn btn-primary" type="submit" id="submitButton">Buscar</button>
                         <a class="btn btn-warning btn-flat" href="?c=taller<?= $url_paginacion ?>"  id="borrarBusButton">Borrar busqueda</a>
                         <a class="btn btn-warning btn-flat" href="?c=taller&a=MostrarYaEntregados"  id="borrarBusButton">Mostrar ya entregados</a>
                         <?php
                      }
                      else{
                        ?>
                        <input class="form-control" name="campo" id="campo" type="text" required>
                        <button class="btn btn-primary" type="submit" id="submitButton">Buscar</button>
                        <a class="btn btn-warning btn-flat" href="?c=taller"  id="borrarBusButton">Borrar busqueda</a>
                        <a class="btn btn-warning btn-flat" href="?c=taller&a=MostrarYaEntregados"  id="borrarBusButton">Mostrar ya entregados</a>
                        <?php
                      }
                      if(isset($_GET["filtro"])){$valorf=$_GET["filtro"];echo $valorf;}
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
                  <th>Fecha de Entrada <button onclick="ordenarporEntrada()">^</button> </th>
                  <th>Fecha Prometida <button>^</button> </th>
                  <th>Tecnico Asignado</th>
                  <?php if ($_SESSION['tipoUsuario'] != 'Secretario') { ?> <th>Acciones</th> <?php } ?>
                </tr>
              </thead>
              <tbody>
                <?php
                $registros_por_pagina = 10;
                $total_registros = count($this->modelo->Listar());
                
                // Obtener el número de página actual
                if (isset($_GET['q'])) {
                  
                  foreach ($this->modelo->BuscarEnTabla(($_GET['q'])) as $tallerSQL) : ?>
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
                            echo "ayuda mami";
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
                      <?php
                      if ($_SESSION['tipoUsuario'] != 'Secretario') { ?>
                        <td><a class="btn btn-info btn-flat" href="?c=taller&a=FormModificar&id=<?= $idreparacion ?>"><i class="fa fa-lg fa-refresh"></i></a>
                          <a class="btn btn-warning btn-flat" onclick="return confirm('¿Realmente desea eliminar?')" href="?c=taller&a=Borrar&id=<?= $idreparacion ?>"><i class="fa fa-lg fa-trash"></i></a>

                        <?php } ?>
                        <a class="btn btn-success btn-flat" href="?c=taller&a=FormConsultar&id=<?= $idreparacion ?>"><i class="fa fa-lg fa-eye"></i></a>
                        </td>
                    </tr>
                  <?php endforeach;
                }
                else{
                  if (isset($_GET['pagina'])) {
                    $pagina_actual = $_GET['pagina'];
                    foreach ($this->modelo->Paginar(($_GET['pagina'] - 1) * $registros_por_pagina, $registros_por_pagina) as $tallerSQL) : ?>
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
                            echo "ayuda mami";
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
                  } else {
                    $pagina_actual = 1;
                    //CONDICION POR SI EL FILTRO DE YA ENTREGADOS ESTA ACTIVO
                    if(isset($_GET['q'])){if($_GET['q']=="yaentregados"){$total_registros = count($this->modelo->ListarYaEntregados());}}
                    foreach ($this->modelo->Paginar(0, $registros_por_pagina) as $tallerSQL) : ?>
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
                  <?php endforeach;
                  }
                }
                

                // Calcular el offset
                ?>



              </tbody>
            </table>
          </div>
          <?php
          $num_paginas = ceil($total_registros / $registros_por_pagina);
          //$num_paginas = 3;
          for ($i = 1; $i <= $num_paginas; $i++) {
            //echo "<a href='?pagina=$i'>$i</a> ";
            echo "<a class='btn-btn-secondary' type='button' href='?c=taller&a=PaginarN&pagina=$i'>$i</a> ";
          }
          ?>

        </div>
      </div>
    </div>
  </div>
</div>
<script>
/* function ordenarporEntrada(){
  const miTabla = document.querySelector("#sampleTable");
// Obtenemos los datos de la tabla
const datos = [];
for (let i = 1; i < miTabla.rows.length; i++) {
  const fila = miTabla.rows[i];
  datos.push({
    id:  parseInt(fila.cells[0].textContent),
    idcliente:  parseInt(fila.cells[1].textContent),
    numeroserie: fila.cells[2].textContent,
    marca: fila.cells[3].textContent,
    modelo: fila.cells[4].textContent,
    observaciones: fila.cells[5].textContent,
    accesorios: fila.cells[6].textContent,
    estado:  parseInt(fila.cells[7].textContent),
    fechaEn: new Date(fila.cells[8].textContent),
    fechaProm: (fila.cells[9].textContent),
    tecnico: fila.cells[10].textContent,

  });
}

// Ordenamos los datos por nombre
datos.sort((a, b) => a.fechaEn - b.fechaEn); 
  /* if (a.nombre > b.nombre) {
    return 1;
  } else if (a.nombre < b.nombre) {
    return -1;
  } else {
    return 0;
  }
});*/
/*
  const opcionesFecha = {
    year: 'numeric',
    month: '2-digit',
    day: '2-digit'
  };

  // Reemplazamos los datos en la tabla ordenada
  for (let i = 1; i < miTabla.rows.length; i++) {
    const fila = miTabla.rows[i];
    fila.cells[0].textContent = datos[i - 1].id;
    fila.cells[1].textContent = datos[i - 1].idcliente;
    fila.cells[2].textContent = datos[i - 1].numeroserie;
    fila.cells[3].textContent = datos[i - 1].marca;
    fila.cells[4].textContent = datos[i - 1].modelo;
    fila.cells[5].textContent = datos[i - 1].observaciones;
    fila.cells[6].textContent = datos[i - 1].accesorios;
    fila.cells[7].textContent = datos[i - 1].estado;
    fila.cells[8].textContent = datos[i - 1].fechaEn.toLocaleDateString('es-ES', opcionesFecha);
    fila.cells[9].textContent = datos[i - 1].fechaProm;
    fila.cells[10].textContent = datos[i - 1].tecnico;
  }
  */
</script>