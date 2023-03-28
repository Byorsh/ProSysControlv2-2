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
            <form class="form-horizontal" method="POST" onsubmit="toggleButton()" action="?c=catalogo&a=Guardar">
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
                    <input class="form-control" name="descripcion" id="descripcion" type="text" placeholder="Introduce la descripcion del producto" value="<?= $catalogoSQL->getDescripcion() ?>" onkeyup="toggleButton()">
                    <div class="alert alert-danger" role="alert" id="advertencia-descripcion" hidden>
                      Campo obligatorio
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="Marca">Marca</label>
                  <div class="col-md-8">
                    <input class="form-control" name="marca" id="marca" type="text" placeholder="Agrega la marca del producto" value="<?= $catalogoSQL->getMarca() ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="Modelo">Modelo</label>
                  <div class="col-md-8">
                    <input class="form-control" name="modelo" id="modelo" type="text" placeholder="Agrega el modelo del producto" value="<?= $catalogoSQL->getModelo() ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="Cantidad">Cantidad *</label>
                  <div class="col-md-8">
                    <input class="form-control" name="cantidad" id="cantidad" type="text" placeholder="Agrega la cantidad" value="<?= $catalogoSQL->getCantidad() ?>" onkeyup="toggleButton()">
                    <div class="alert alert-danger" role="alert" id="advertencia-cantidad" hidden>
                      Campo obligatorio, unicamente acepta numeros
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="PrecioCompra">Precio de compra *</label>
                  <div class="col-md-8">
                    <input class="form-control" name="precioCompra" id="preciocompratxt" type="text" placeholder="Agrega el precio de compra" value="<?= $catalogoSQL->getPrecioCompra() ?>" onkeyup="toggleButton()">
                    <div class="alert alert-danger" role="alert" id="advertencia-precioDeCompa" hidden>
                      Campo obligatorio, unicamente acepta numeros
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="PrecioVenta">Precio de venta *</label>
                  <div class="col-md-8">
                    <input class="form-control" name="precioCompra" id="precioventatxt" type="text" placeholder="Agrega el precio de venta" value="<?= $catalogoSQL->getPrecioVenta() ?>" onkeyup="toggleButton()">
                    <div class="alert alert-danger" role="alert" id="advertencia-precioDeVenta" hidden>
                      Campo obligatorio, unicamente acepta numeros
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="Iva">IVA</label>
                  <div class="col-md-8">
                    <select class="form-control" id="impuestolista" name="iva" onchange="validarPrecioVenta()">
                      <option value selected disabled>Seleccione una opcion</option>
                      <option value="16" selected="true">16%</option>
                      <option value="8">8%</option>
                      <option value="0">0%</option>

                    </select><br>
                  </div>
                </div>

                <div class="col-lg-10 col-lg-offset-2">
                  <button class="btn btn-primary" type="submit" id="submitButton" disabled>Enviar</button>
                  <button class="btn btn-default" type="reset" onclick="bloquearBotonEnviar()">Limpiar</button>
                  <button class="btn btn-default" type="button" onclick="cancelarRegistro()">Cancelar</button>
                </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <form class="form-horizontal" method="POST" action="?c=taller&a=Guardar">
    <fieldset>

      <fieldset>
  </form>

  <script>
    let patrones = {
      cantidad: /[0-9]{1,6}/,
      precioDeCompra: /[0-9.]{1,12}/,
      precioDeVenta: /[0-9.]{1,12}/
    }

    function toggleButton() {
      //validar datos ingresados
      let descripcion = document.getElementById('descripcion').value;
      let cantidad = patrones.cantidad.test(document.getElementById('cantidad').value);
      let precioDeCompra = patrones.precioDeCompra.test(document.getElementById('preciocompratxt').value);
      let precioDeVenta = patrones.precioDeVenta.test(document.getElementById('precioventatxt').value);

      //Se valida que los campos no esten vacios y con su correspondiente formato
      //RFC no acepta ninguna entrada
      descripcion != "" ?
        document.getElementById('advertencia-descripcion').hidden = true :
        document.getElementById('advertencia-descripcion').hidden = false;

      if (document.getElementById('advertencia-cantidad').value != "") {
        cantidad ?
          document.getElementById('advertencia-cantidad').hidden = true :
          document.getElementById('advertencia-cantidad').hidden = false;
      }

      if (document.getElementById('preciocompratxt').value != "") {
        precioDeCompra ?
          document.getElementById('advertencia-precioDeCompa').hidden = true :
          document.getElementById('advertencia-precioDeCompa').hidden = false;
      }

      if (document.getElementById('precioventatxt').value != "") {
        precioDeVenta ?
          document.getElementById('advertencia-precioDeVenta').hidden = true :
          document.getElementById('advertencia-precioDeVenta').hidden = false;
      }

      //Si el formulario fue llenado correctamente se activa el boton enviar
      (descripcion && cantidad && precioDeCompra && precioDeVenta) ?
      document.getElementById('submitButton').disabled = false:
        bloquearBotonEnviar();
    }

    function bloquearBotonEnviar() {
      document.getElementById('submitButton').disabled = true;
    }

    function cancelarRegistro() {
      Swal.fire({
        title: '¿Deseas regresar a la lista y deshacer el registro?',
        showCancelButton: true,
        confirmButtonText: 'Confirmar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = '?c=usuario';
        }
      })
    }
  </script>