<div class="content-wrapper">
  <div class="page-title">
    <div>
      <h1><i class="fa fa-edit"></i><?= $titulo ?> Articulo</h1>
      <p>Modulo para <?= $titulo ?> articulos</p>
    </div>
    <div>
      <ul class="breadcrumb">
        <li><i class="fa fa-home fa-lg"></i></li>
        <li>Articulo</li>
        <li><a href="#"><?= $titulo ?> Articulo</a></li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="row">

          <div class="well bs-component">
            <form class="form-horizontal" method="POST" onsubmit="handleSubmit()" action="?c=catalogo&a=Guardar">
              <fieldset>
                <legend>Registrar Articulo</legend>

                <div class="form-group">
                  <div class="col-lg-10">
                    <input class="form-control" name="idProducto" type="hidden" value="<?= $catalogoSQL->getId() ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="Descripcion">Descripcion *</label>
                  <div class="col-md-8">
                    <input class="form-control" name="descripcion" id="descripcion" type="text" placeholder="Introduce la descripcion del producto" value="<?= $catalogoSQL->getDescripcion() ?>" 
                      onkeyup="mayus(this)" onchange="handleSubmit()" maxlength="100" min="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 97 && event.charCode <= 122))" />
                    <div class="alert alert-danger" role="alert" id="advertenciaDescripcion" hidden>
                      Campo obligatorio
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="Marca">Marca</label>
                  <div class="col-md-8">
                    <input class="form-control" name="marca" id="marca" type="text" placeholder="Agrega la marca del producto" value="<?= $catalogoSQL->getMarca() ?>" 
                      onkeyup="mayus(this)" onchange="handleSubmit()" maxlength="30" min="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 97 && event.charCode <= 122))"/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="Modelo">Modelo</label>
                  <div class="col-md-8">
                    <input class="form-control" name="modelo" id="modelo" type="text" placeholder="Agrega el modelo del producto" value="<?= $catalogoSQL->getModelo() ?>" 
                      onkeyup="mayus(this)" onchange="handleSubmit()" maxlength="30" min="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 97 && event.charCode <= 122))"/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="Cantidad">Cantidad *</label>
                  <div class="col-md-8">
                    <input class="form-control" name="cantidad" id="cantidad" type="text" placeholder="Agrega la cantidad" value="<?= $catalogoSQL->getCantidad() ?>" 
                      onchange="handleSubmit()" maxlength="6" min="1" onkeypress="return ((event.charCode == 46) || (event.charCode == 44) || (event.charCode >= 48 && event.charCode <= 57))" />
                    <div class="alert alert-danger" role="alert" id="advertenciaCantidad" hidden>
                      Campo obligatorio, unicamente acepta numeros
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="PrecioCompra">Precio de compra *</label>
                  <div class="col-md-8">
                    <input class="form-control" name="precioCompra" id="preciocompratxt" type="text" placeholder="Agrega el precio de compra" value="<?= $catalogoSQL->getPrecioCompra() ?>" 
                      onchange="handleSubmit()" maxlength="12" min="1" onkeypress="return ((event.charCode == 46) || (event.charCode == 44) || (event.charCode >= 48 && event.charCode <= 57))" />
                    <div class="alert alert-danger" role="alert" id="advertenciaPrecioCompra" hidden>
                      Campo obligatorio, unicamente acepta numeros
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="PrecioVenta">Precio de venta *</label>
                  <div class="col-md-8">
                    <input class="form-control" name="precioVenta" id="precioventatxt" type="text" placeholder="Agrega el precio de venta" value="<?= $catalogoSQL->getPrecioVenta() ?>" 
                      onchange="handleSubmit()" maxlength="12" min="1" onkeypress="return ((event.charCode == 46) || (event.charCode == 44) || (event.charCode >= 48 && event.charCode <= 57))" />
                    <div class="alert alert-danger" role="alert" id="advertenciaPrecioVenta" hidden>
                      Campo obligatorio, unicamente acepta numeros
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="Iva">IVA</label>
                  <div class="col-md-8">
                    <select class="form-control" id="impuestolista" name="iva" onchange="handleSubmit()">
                      <option value selected disabled>Seleccione una opcion</option>
                      <option value="16" selected="true">16%</option>
                      <option value="8">8%</option>
                      <option value="0">0%</option>

                    </select><br>
                  </div>
                </div>

                <div class="col-lg-10 col-lg-offset-2">
                  <button class="btn btn-primary" type="submit" id="submitButton" disabled>Enviar</button>
                  <button class="btn btn-default" type="reset" onclick="handleSubmit()">Limpiar</button>
                  <button class="btn btn-danger" type="button" onclick="handleCancelar()">Cancelar</button>
                </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="vistas/catalogo/acciones_Catalogo.js"></script>