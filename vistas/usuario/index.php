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
            <?php if($_SESSION['tipoUsuario']!='Secretario'){?>
            <a class="btn btn-primary btn-flat" href="?c=usuario&a=FormCrear"><i class="fa fa-lg fa-plus"></i></a>
            <?php }?>
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
                      <th>Apellido</th>
                      <th>Telefono</th>
                      <!--<th>Email</th>-->
                      <th>Usuario</th>
                      <!--<th>Contraseña</th>-->
                      <th>Privilegio</th>
                      <!--condicion para ocultar si es secretario-->
                      <?php if($_SESSION['tipoUsuario']!='Secretario'){?>
                      <th>Acciones</th>
                      <?php }?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($this->modeloUsuario->Listar() as $u):?>
                    <tr>
                      <td><?=$u->id?></td>
                      <td><?=$u->rfc?></td>
                      <td><?=$u->nombre?></td>
                      <td><?=$u->apellido?></td>
                      <td><?=$u->telefono?></td>
                      <!--<td><?=$u->email?></td>-->
                      <td><?=$u->user?></td>
                      <!--<td><?=$u->contrasenia?></td>-->
                      <td><?=$u->privilegio?></td>
                      <!--condicion para ocultar si es secretario-->
                      <?php if($_SESSION['tipoUsuario']!='Secretario'){?>
                      <td><a class="btn btn-info btn-flat" href="?c=usuario&a=FormCrear&id=<?=$u->id?>"><i class="fa fa-lg fa-refresh"></i></a> 
                          <a class="btn btn-warning btn-flat"   onclick = "return confirm('¿Realmente desea eliminar?')" href="?c=usuario&a=Borrar&id=<?=$u->id?>" ><i class="fa fa-lg fa-trash"></i></a>
                          
                      <?php }?>
                          <a class="btn btn-success btn-flat" href="?c=usuario&a=FormConsultar&id=<?=$u->id?>"><i class="fa fa-lg fa-eye"></i></a></td>
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
    <script>
                            function toggleButtonagregarTaller()
                            {
                                
                            }
                        </script> 