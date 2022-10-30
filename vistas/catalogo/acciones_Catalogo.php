<div class="content-wrapper">
  <div class="page-title">
    <div>
      <h1><i class="fa fa-edit"></i><?=$titulo?> Articulo</h1>
      <p>Modulo para <?=$titulo?> articulos</p>
    </div>
    <div>
      <ul class="breadcrumb">
        <li><i class="fa fa-home fa-lg"></i></li>
        <li>Articulo</li>
        <li><a href="#"><?=$titulo?> Articulo</a></li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="row">
          
        <div class="well bs-component">
            <form class="form-horizontal" method="POST" action="?c=cliente&a=Guardar">
            <fieldset>
                <legend><?=$titulo?> Cliente</legend>
                <div class="form-group">
                    <div class="col-lg-10">
                    <input class="form-control" name="idClientes" type="hidden" value="<?=$clienteSQL->getId()?>">
                    </div>

                    <label class="col-md-3" for="Rfc">RFC</label>
                    <div class="col-lg-10">
                        <input class="form-control" name="rfc" type="text" placeholder="RFC" value="<?=$clienteSQL->getRfc()?>">
                    </div>
                    
                    <label class="col-md-3 " for="NombreCliente">Nombre</label>
                    <div class="col-lg-10">
                        <input class="form-control" name="nombreCliente" type="text" placeholder="Nombre" value="<?=$clienteSQL->getNombre()?>">
                    </div>

                    <label class="col-md-3 " for="ApellidoP">Apellido Paterno</label>
                    <div class="col-lg-10">
                    <input class="form-control" name="apellidoP" type="text" placeholder="Apellido" value="<?=$clienteSQL->getApellidoP()?>">
                    </div>

                    <label class="col-md-3 " for="ApellidoM">Apellido Materno</label>
                    <div class="col-lg-10">
                        <input class="form-control" name="apellidoM" type="text" placeholder="Apellido" value="<?=$clienteSQL->getApellidoM()?>">
                    </div>

                    <label class="col-md-3 " for="NombreEmpresa">Nombre de la empresa</label>
                    <div class="col-lg-10">
                        <input class="form-control" name="nombreEmpresa" type="text" placeholder="Telefono" value="<?=$clienteSQL->getNombreEmpresa()?>">
                    </div>

                    <label class="col-md-3" for="Telefono">Telefono</label>
                    <div class="col-lg-10">
                        <input class="form-control" name="telefono" type="text" placeholder="email" value="<?=$clienteSQL->getTelefono()?>">
                    </div>

                    <label class="col-md-3" for="Email">Email</label>
                    <div class="col-lg-10">
                        <input class="form-control" name="email" type="text" placeholder="Usuario" value="<?=$clienteSQL->getEmail()?>">
                    </div>

                    <label class="col-md-3" for="Domicilio">Domicilio</label>
                    <div class="col-lg-10">
                    <input class="form-control" name="domicilio" type="text" placeholder="Usuario" value="<?=$clienteSQL->getDomicilio()?>">
                    </div>

                    <div>
                    <label class="col-md-3" for=""></label>
                    <label class="col-md-3" for=""></label>
                    <label class="col-md-3" for=""></label>
                    </div>
                    <div class="col-lg-10 col-lg-offset-2">
                        <button class="btn btn-default" type="reset">Limpiar</button>
                        <button class="btn btn-primary" type="submit">Enviar</button>
                    </div>
                </div>
        </div>
      </div>
    </div>
  </div>