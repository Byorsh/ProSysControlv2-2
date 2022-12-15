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

                    <label class="col-md-3" for="Descripcion">Descripcion *</label>
                    <div class="col-lg-10">
                        <input class="form-control" name="descripcion"  type="text" pattern="{0,100}" placeholder="Descripcion" value="<?=$catalogoSQL->getDescripcion()?>" required="">
                    </div>
                    
                    <label class="col-md-3 " for="Marca">Marca</label>
                    <div class="col-lg-10">
                        <input class="form-control" name="marca"  type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ. ]{3,50}" placeholder="Marca" value="<?=$catalogoSQL->getMarca()?>">
                    </div>

                    <label class="col-md-3 " for="Modelo">Modelo</label>
                    <div class="col-lg-10">
                    <input class="form-control" name="modelo" type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ. ]{3,50}" placeholder="Modelo" value="<?=$catalogoSQL->getModelo()?>">
                    </div>

                    <label class="col-md-3 " for="Cantidad">Cantidad *</label>
                    <div class="col-lg-10">
                        <input class="form-control" name="cantidad" type="text" pattern="[0-9]{1,6}" placeholder="Cantidad" value="<?=$catalogoSQL->getCantidad()?>" required="">
                    </div>

                    <label class="col-md-3 " for="PrecioCompra">Precio de compra *</label>
                    <div class="col-lg-10">
                        <input class="form-control" id="preciocompratxt" name="precioCompra" type="text" pattern="[0-9.]{1,12}" placeholder="Precio de compra" 
                        value="<?=$catalogoSQL->getPrecioCompra()?>" required="" onchange="validarPrecioVenta()">
                    </div>

                    <label class="col-md-3" for="PrecioVenta">Precio de venta *</label>
                    <div class="col-lg-10">
                        <input class="form-control" id="precioventatxt" name="precioVenta" type="text" pattern="[0-9.]{1,12}" placeholder="Precio de venta" 
                        value="<?=$catalogoSQL->getPrecioVenta()?>" required=""  onchange="validarPrecioVenta()">
                    </div>
                    <div class="col-lg-10">
                      <label class="col-md-3" for="PrecioVenta" visible="true" id="sugerencia">Precio de venta sugerido </label>
                    </div>
                    <label class="col-md-3" for="Iva">IVA</label>
                        <div class="col-lg-10">
                          <select class="form-control" id="impuestolista" name="iva" required="" onchange="validarPrecioVenta()">
                            <option value selected disabled>Seleccione una opcion</option>
                            <option value="16" selected="true">16%</option>
                            <option value="8">8%</option>
                            <option value="0">0%</option>
                            
                          </select><br>
                          
                   
                        </div>

                    <div>
                    <label class="col-md-3" for=""></label>
                    <label class="col-md-3" for=""></label>
                    <label class="col-md-3" for=""></label>
                    </div>
                    <div class="col-lg-10 col-lg-offset-2">
                        <button class="btn btn-default" type="button" onclick="cancelarCatalogo()">Cancelar</button>
                        <button class="btn btn-default" type="reset">Limpiar</button>
                        <button class="btn btn-primary" type="submit" id="submitButton">Enviar</button>
                    </div>
                </div>
        </div>
      </div>
    </div>
  </div>
  <script>
                            //funcion para regresar en cancelar------------------------------
                            function cancelarCatalogo()         
                            {
                              //aqui la direccion a cambiar----------------------------------
                              var result = confirm("¿Deseas regresar a la lista y deshacer el registro?");
                              if (result == true) {
                                window.location.href ='?c=catalogo';
                              } else {
                                  
                              }
                            }
                            function validarPrecioVenta(){
                              var preciodCompra = document.getElementById('preciocompratxt').value;
                              var preciodVenta = document.getElementById('precioventatxt').value;
                              var impuesto = document.getElementById('impuestolista').value;
                              var costoventa = 1.3*(preciodCompra*(1+((impuesto)/100)));
                              document.getElementById('sugerencia').textContent = "Precio de venta sugerido "+costoventa;
                              if(preciodVenta>(costoventa)){
                                console.log("precio de venta correcto");
                                document.getElementById('sugerencia').className = "visible";
                                document.getElementById('submitButton').disabled = false;
                              }
                              else{
                                document.getElementById('submitButton').disabled = true;
                              }
                              console.log(preciodCompra);
                              console.log(preciodVenta);
                              console.log(costoventa);
                              //Precio de venta sugerido 

                            }
                            
                        </script> 