<div class="content-wrapper">
  <div class="page-title">
    <div>
    <h1><i class="fa fa-edit"></i>Mailbox</h1>
      <p>Modulo para correos</p>
    </div>
    
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="row">
          
            <div class="well bs-component">
                <form class="form-horizontal" method="POST" action="?c=correo&a=Guardar">
                <fieldset>
                <legend>Tu email</legend>

                    <div class="form-group">
                    <label class="control-label col-md-3" for="Customer_email" >Correo destino </label>
                    <div class="col-md-8">
                      <input class="form-control" name="customer_email" id="customer_email" type="text" placeholder="Introduce el correo del destinatario" required="">
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="control-label col-md-3" for="Customer_name" >Nombre del destinatario </label>
                    <div class="col-md-8">
                      <input class="form-control" name="customer_name" id="customer_name" type="text" placeholder="Introduce el nombre del destinatario" required="">
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="control-label col-md-3" for="Subject" >Asunto </label>
                    <div class="col-md-8">
                      <input class="form-control" name="subject" id="subject" type="text" placeholder="Introduce el asunto" required="">
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="control-label col-md-3" for="Message" >Mensaje</label>
                    <div class="col-md-8">
                      <!--Por alguna razon no agarra la validacion para el minimo de caracteres-->
                      <textarea class="form-control" id="message" name="message" type="text" rows="4" placeholder="Escribe aqui el mensaje"  required=""></textarea>
                    </div>
                  </div>
                    
                    <div>
                        <label class="col-md-3" for=""></label>
                        <label class="col-md-3" for=""></label>
                        <label class="col-md-3" for=""></label>
                      </div>
                        <div class="col-lg-10 col-lg-offset-2">
                          <button class="btn btn-default" type="button" onclick="cancelarCliente()">Cancelar</button>
                          <button class="btn btn-default" type="reset">Limpiar</button>
                          <button class="btn btn-primary" type="submit">Enviar</button>
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
    //funcion para regresar en cancelar------------------------------
    function cancelarCliente()         
    {
        window.location.href ='home.php';
    }
  </script>  