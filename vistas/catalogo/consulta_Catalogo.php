<div class="content-wrapper">
  <div class="page-title">
    <div>
      <h1><i class="fa fa-edit"></i><?= $titulo ?> Producto del Catalogo</h1>
      <p>Modulo para <?= $titulo ?> productos del catalogo</p>
    </div>
    <div>
      <a class="btn btn-info btn-flat" href="?c=catalogo&a=FormCrear&id=<?= $catalogoSQL->getId() ?>">Actualizar <i class="fa fa-lg fa-refresh"></i></a>
      <a class="btn btn-warning btn-flat" href="?c=catalogo">Retroceder <i class="fa fa-lg fa-reply"></i></a>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="row">

          <div class="well bs-component">
            <form class="form-horizontal" method="POST" action="?c=catalogo&a=Guardar">
              <fieldset>
                <legend class="control-label">Registrar Articulo</legend>

                <div class="form-group">
                  <div class="col-lg-10">
                    <input class="form-control" name="idProducto" type="hidden" value="<?= $catalogoSQL->getId() ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="Descripcion">Descripcion *</label>
                  <div class="col-md-8">
                    <input class="form-control" name="descripcion" id="descripcion" type="text" placeholder="Introduce la descripcion del producto" value="<?= $catalogoSQL->getDescripcion() ?>" onkeyup="mayus(this); handleSubmit();" maxlength="100" min="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))" disabled />
                    <div class="alert alert-danger" role="alert" id="advertenciaDescripcion" hidden>
                      Campo obligatorio
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="Marca">Marca</label>
                  <div class="col-md-8">
                    <input class="form-control" disabled name="marca" id="marca" type="text" placeholder="Agrega la marca del producto" value="<?= $catalogoSQL->getMarca() ?>" onkeyup="mayus(this); handleSubmit();" maxlength="30" min="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))"  />
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="Modelo">Modelo</label>
                  <div class="col-md-8">
                    <input class="form-control" disabled name="modelo" id="modelo" type="text" placeholder="Agrega el modelo del producto" value="<?= $catalogoSQL->getModelo() ?>" onkeyup="mayus(this); handleSubmit();" maxlength="30" min="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32)  )" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="Cantidad">Cantidad *</label>
                  <div class="col-md-8">
                    <input class="form-control" disabled name="cantidad" id="cantidad" type="text" placeholder="Agrega la cantidad" value="<?= $catalogoSQL->getCantidad() ?>" onchange="handleSubmit()" maxlength="6" min="1" onkeypress="return ((event.charCode == 46) || (event.charCode == 44) || (event.charCode >= 48 && event.charCode <= 57))" />
                    <div class="alert alert-danger" role="alert" id="advertenciaCantidad" hidden>
                      Campo obligatorio, unicamente acepta numeros
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="PrecioCompra">Precio de compra *</label>
                  <div class="col-md-8">
                    <input class="form-control" disabled name="precioCompra" id="preciocompratxt" type="text" placeholder="Agrega el precio de compra" value="<?= $catalogoSQL->getPrecioCompra() ?>" onchange="handleSubmit()" maxlength="12" min="1" onkeypress="return ((event.charCode == 46) || (event.charCode == 44) || (event.charCode >= 48 && event.charCode <= 57))" />
                    <div class="alert alert-danger" role="alert" id="advertenciaPrecioCompra" hidden>
                      Campo obligatorio, unicamente acepta numeros
                    </div>
                  </div>
                </div>

                <!--<div class="form-group">
                  <label class="control-label col-md-3">Porcentaje de ganancia *</label>
                  <div class="col-md-8">
                    <input class="form-control" disabled id="porcentajeGanancia" type="text" placeholder="Porcentaje de ganancia" onchange="handleSubmit()" maxlength="12" min="1" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" />
                    <div class="alert alert-danger" role="alert" id="advertenciaPorcentajeGanancia" hidden>
                    </div>
                  </div>
                </div>-->

                <div class="form-group">
                  <label class="control-label col-md-3" for="PrecioVenta">Precio de venta *</label>
                  <div class="col-md-8">
                    <input class="form-control" disabled name="precioVenta" id="precioventatxt" type="text" placeholder="Agrega el precio de venta" value="<?= $catalogoSQL->getPrecioVenta() ?>" maxlength="12" min="1" onchange="handleSubmit()" onkeypress="return ((event.charCode == 46) || (event.charCode == 44) || (event.charCode >= 48 && event.charCode <= 57))" />
                    <div class="alert alert-danger" role="alert" id="advertenciaPrecioVenta" hidden>
                    </div>
                    <div class="alert alert-success" role="alert" id="precioSugerido" hidden>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="Iva">IVA</label>
                  <div class="col-md-8">
                    <select class="form-control" disabled id="impuestolista" name="iva" onchange="handleSubmit()">
                      <option value selected disabled>Seleccione una opcion</option>
                      <option value="16" selected="true">16%</option>
                      <option value="8">8%</option>
                      <option value="0">0%</option>

                    </select><br>
                  </div>
                </div>
          </div>
        </div>
      </div>
    </div>