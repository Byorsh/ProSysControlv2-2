<div class="content-wrapper">
  <div class="page-title">
    <div>
      <h1><i class="fa fa-edit"></i><?=$titulo?> Producto del Catalogo</h1>
      <p>Modulo para <?=$titulo?> productos del catalogo</p>
    </div>
    <div>
    <a class="btn btn-info btn-flat" href="?c=catalogo&a=FormCrear&id=<?=$catalogoSQL->getId()?>"><i class="fa fa-lg fa-refresh"></i></a> 
    <a class="btn btn-warning btn-flat" href="?c=catalogo"><i class="fa fa-lg fa-reply"></i></a>
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

                    <label class="col-md-3" for="Descripcion">Descripcion *</label>
                    <div class="col-lg-10">
                        <input class="form-control" name="descripcion"  type="text" pattern="{0,100}" placeholder="Descripcion" value="<?=$catalogoSQL->getDescripcion()?>" required="" disabled>
                    </div>
                    
                    <label class="col-md-3 " for="Marca">Marca</label>
                    <div class="col-lg-10">
                        <input class="form-control" name="marca"  type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ. ]{3,50}" placeholder="Marca" value="<?=$catalogoSQL->getMarca()?>" disabled>
                    </div>

                    <label class="col-md-3 " for="Modelo">Modelo</label>
                    <div class="col-lg-10">
                    <input class="form-control" name="modelo" type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ. ]{3,50}" placeholder="Modelo" value="<?=$catalogoSQL->getModelo()?>" disabled>
                    </div>

                    <label class="col-md-3 " for="Cantidad">Cantidad *</label>
                    <div class="col-lg-10">
                        <input class="form-control" name="cantidad" type="text" pattern="[0-9]{1,6}" placeholder="Cantidad" value="<?=$catalogoSQL->getCantidad()?>" required="" disabled>
                    </div>

                    <label class="col-md-3 " for="PrecioCompra">Precio de compra *</label>
                    <div class="col-lg-10">
                        <input class="form-control" name="precioCompra" type="text" pattern="[0-9.]{1,12}" placeholder="Precio de compra" value="<?=$catalogoSQL->getPrecioCompra()?>" required="" disabled>
                    </div>

                    <label class="col-md-3" for="PrecioVenta">Precio de venta *</label>
                    <div class="col-lg-10">
                        <input class="form-control" name="precioVenta" type="text" pattern="[0-9.]{1,12}" placeholder="Precio de venta" value="<?=$catalogoSQL->getPrecioVenta()?>" required="" disabled>
                    </div>

                    <label class="col-md-3" for="Iva">IVA</label>
                        <div class="col-lg-10">
                          <select class="form-control" name="iva" required="" value="<?=$catalogoSQL->getIva()?>" disabled>
                            <option value selected disabled>Seleccione una opcion</option>
                            <option value="16">16%</option>
                            <option value="8">8%</option>
                            <option value="0">0%</option>
                            
                          </select><br>
                          
                   
                        </div>

                
                    
                </div>
                  
                  
        </div>
      </div>
    </div>
  </div>