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
            <form class="form-horizontal" method="POST" action="?c=catalogo&a=Guardar">
            <fieldset>
                <legend><?=$titulo?> Articulo</legend>
                <div class="form-group">
                    <div class="col-lg-10">
                    <input class="form-control" name="idProducto" type="hidden" value="<?=$catalogoSQL->getId()?>">
                    </div>

                    <label class="col-md-3" for="Descripcion">Descripcion</label>
                    <div class="col-lg-10">
                        <input class="form-control" name="descripcion" type="text" placeholder="Descripcion" value="<?=$catalogoSQL->getDescripcion()?>">
                    </div>
                    
                    <label class="col-md-3 " for="Marca">Marca</label>
                    <div class="col-lg-10">
                        <input class="form-control" name="marca" type="text" placeholder="Marca" value="<?=$catalogoSQL->getMarca()?>">
                    </div>

                    <label class="col-md-3 " for="Modelo">Modelo</label>
                    <div class="col-lg-10">
                    <input class="form-control" name="modelo" type="text" placeholder="Modelo" value="<?=$catalogoSQL->getModelo()?>">
                    </div>

                    <label class="col-md-3 " for="Cantidad">Cantidad</label>
                    <div class="col-lg-10">
                        <input class="form-control" name="cantidad" type="text" placeholder="Cantidad" value="<?=$catalogoSQL->getCantidad()?>">
                    </div>

                    <label class="col-md-3 " for="PrecioCompra">Precio de compra</label>
                    <div class="col-lg-10">
                        <input class="form-control" name="precioCompra" type="text" placeholder="Precio de compra" value="<?=$catalogoSQL->getPrecioCompra()?>">
                    </div>

                    <label class="col-md-3" for="PrecioVenta">Precio de venta</label>
                    <div class="col-lg-10">
                        <input class="form-control" name="precioVenta" type="text" placeholder="Precio de venta" value="<?=$catalogoSQL->getPrecioVenta()?>">
                    </div>

                    <label class="col-md-3" for="Iva">Iva</label>
                    <div class="col-lg-10">
                        <input class="form-control" name="iva" type="text" placeholder="Iva" value="<?=$catalogoSQL->getIva()?>">
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