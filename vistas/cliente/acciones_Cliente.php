<div class="content-wrapper">
  <div class="page-title">
    <div>
      <h1><i class="fa fa-edit"></i><?= $titulo ?> Cliente</h1>
      <p>Modulo para <?= $titulo ?> clientes</p>
    </div>
    <div>
      <ul class="breadcrumb">
        <li><i class="fa fa-home fa-lg"></i></li>
        <li>Clientes</li>
        <li><a href="#"><?= $titulo ?> Cliente</a></li>
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
                <legend>Registro del Cliente</legend>

                <div class="form-group">
                  <div class="col-lg-10">
                    <input class="form-control" name="idClientes" type="hidden" value="<?= $clienteSQL->getId() ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="Rfc">RFC </label>
                  <div class="col-md-8">
                    <input class="form-control" name="rfc" id="rfc" type="text" placeholder="Introduce el rfc del cliente" value="<?= $clienteSQL->getRfc() ?>">
                  </div>
                </div>


                <div class="form-group">
                  <label class="control-label col-md-3" for="NombreCliente">Nombre *</label>
                  <div class="col-md-8">
                    <input class="form-control" name="nombreCliente" id="nombre" type="text" placeholder="Nombre" value="<?= $clienteSQL->getNombre() ?>" onkeyup="toggleButton()">
                    <div class="alert alert-danger" role="alert" id="advertencia-cliente" hidden>
                      El nombre solo debe contener letras y espacio
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="ApellidoP">Apellido Paterno *</label>
                  <div class="col-md-8">
                    <input class="form-control" name="apellidoP" id="apellidoPaterno" type="text" placeholder="Apellido Paterno" value="<?= $clienteSQL->getApellidoP() ?>" onkeyup="toggleButton()">
                    <div class="alert alert-danger" role="alert" id="advertencia-apellidoPaterno" hidden>
                      El usuario unicamente puede contener letras y espacios
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="ApellidoM">Apellido Materno *</label>
                  <div class="col-md-8">
                    <input class="form-control" name="apellidoM" id="apellidoMaterno" type="text" placeholder="Apellido Materno" value="<?= $clienteSQL->getApellidoM() ?>" onkeyup="toggleButton()">
                    <div class="alert alert-danger" role="alert" id="advertencia-apellidoMaterno" hidden>
                      El usuario unicamente puede contener letras y espacios
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="NombreEmpresa">Nombre de la empresa</label>
                  <div class="col-md-8">
                    <input class="form-control" name="nombreEmpresa" id="nombreEmpresa" type="text" placeholder="Nombre de la Empresa" value="<?= $clienteSQL->getNombreEmpresa() ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="Telefono">Telefono *</label>
                  <div class="col-md-8">
                    <input class="form-control" name="telefono" id="telefono" type="text" placeholder="Telefono" value="<?= $clienteSQL->getTelefono() ?>" onkeyup="toggleButton()">
                    <div class="alert alert-danger" role="alert" id="advertencia-telefono" hidden>
                      Numero de telefono invalido
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="NombreEmpresa">Email *</label>
                  <div class="col-md-8">
                    <input class="form-control" name="email" id="email" type="text" placeholder="Correo Electronico" value="<?= $clienteSQL->getEmail() ?>" onkeyup="toggleButton()">
                    <div class="alert alert-danger" role="alert" id="advertencia-email" hidden>
                      Formato de correo electronico no valido <strong>ejemplo@ejemplo.com</strong>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="NombreEmpresa">Domicilio</label>
                  <div class="col-md-8">
                    <input class="form-control" name="domicilio" id="domicilio" type="text" placeholder="Domicilio" value="<?= $clienteSQL->getDomicilio() ?>">
                  </div>
                </div>

                <div>
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

    <script>
      let patrones = {
        nombre: /[a-zA-ZáéíóúÁÉÍÓÚñÑ. ]{4,20}/,
        apellidoPaterno: /[a-zA-ZáéíóúÁÉÍÓÚñÑ. ]{4,20}/,
        apellidoMaterno: /[a-zA-ZáéíóúÁÉÍÓÚñÑ. ]{4,20}/,
        telefono: /\+?\(?\d{2,4}\)?[\d\s-]{8,14}/,
        correo: /^[a-zA-Z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/,
      }

      function toggleButton() {
        let nombre = patrones.nombre.test(document.getElementById('nombre').value);
        let apellidoPaterno = patrones.apellidoPaterno.test(document.getElementById('apellidoPaterno').value);
        let apellidoMaterno = patrones.apellidoMaterno.test(document.getElementById('apellidoMaterno').value);
        let telefono = patrones.telefono.test(document.getElementById('telefono').value);
        let correo = patrones.correo.test(document.getElementById('email').value);

        if (document.getElementById('nombre').value != "") {
          nombre ?
            document.getElementById('advertencia-cliente').hidden = true :
            document.getElementById('advertencia-cliente').hidden = false;
        }

        if (document.getElementById('apellidoPaterno').value != "") {
          apellidoPaterno ?
            document.getElementById('advertencia-apellidoPaterno').hidden = true :
            document.getElementById('advertencia-apellidoPaterno').hidden = false;
        }

        if (document.getElementById('apellidoMaterno').value != "") {
          apellidoMaterno ?
            document.getElementById('advertencia-apellidoMaterno').hidden = true :
            document.getElementById('advertencia-apellidoMaterno').hidden = false;
        }

        if (document.getElementById('telefono').value != "") {
          telefono ?
            document.getElementById('advertencia-telefono').hidden = true :
            document.getElementById('advertencia-telefono').hidden = false;
        }

        if (document.getElementById('email').value != "") {
          correo ?
            document.getElementById('advertencia-email').hidden = true :
            document.getElementById('advertencia-email').hidden = false;
        }

        (nombre && apellidoMaterno && apellidoPaterno && telefono && telefono && correo) ? 
          document.getElementById('submitButton').disabled = false : 
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
            window.location.href = '?c=cliente';
          }
        })
      }
    </script>