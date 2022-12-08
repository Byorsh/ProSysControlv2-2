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
                      <!--condicion para ocultar si es tecnico-->
                      <td>
                      <?php if($_SESSION['tipoUsuario']!='Tecnico'){?>
                      <a class="btn btn-info btn-flat" href="?c=cliente&a=FormCrear&id=<?=$clienteSQL->idClientes?>"><i class="fa fa-lg fa-refresh"></i></a> 
                      <a class="btn btn-warning btn-flat" onclick = "return confirm('¿Realmente desea eliminar?')" href="?c=cliente&a=Borrar&id=<?=$clienteSQL->idClientes?>"><i class="fa fa-lg fa-trash" ></i></a>
                      <?php }?>
                      <a class="btn btn-success btn-flat" href="?c=cliente&a=FormConsultar&id=<?=$clienteSQL->idClientes?>"><i class="fa fa-lg fa-eye"></i></a></td>
                      
                      
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