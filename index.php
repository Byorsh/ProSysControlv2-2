<!DOCTYPE html>
<!-- LOGIN-->
<html>

<head>
  <link rel="stylesheet" type="text/css" href="css/site.css" />
  <script type="text/javascript" src="js/cssrefresh.js"></script>
</head>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSS-->
  <link rel="stylesheet" type="text/css" href="assets/css/login.css">
  <title>Login</title>

  <script src="vistas/alertas/alertas.js"></script>
  <script src="index.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
  <div class="login-card">
    <h1>ProSysControl</h1>
    <h2>Iniciar sesion</h2>

    <form class="login-form" action="validar.php" method="post">
      <input type="text" placeholder="Usuario" name="usuario" id="usuario" onkeyup="handleSubmit()" maxlength="40" min="1" 
      onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode == 32) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 160 && event.charCode <= 165) || (event.charCode == 224) || (event.charCode == 181) || (event.charCode == 130) || (event.charCode == 233) || (event.charCode == 144) || (event.charCode == 214))"/>
      <p class="alert-danger" id="advertenciaUsuario" style="float: left;" hidden>
          Min. de 3 caracteres, solo letras y espacios
      </p>
      <input type="password" placeholder="Contraseña" id="password" onkeyup="handleSubmit()" maxlength="70" min="1" name="contraseña" 
      onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57))"/>
      <button type="submit" value="Ingresar" id="submitButton">Ingresar</button>
    </form>
  </div>
  <script>
    document.addEventListener("DOMContentLoaded", function(){
      var loginButton = document.getElementById("submitButton");
      var user = document.getElementById("usuario");
      var passwood = document.getElementById("password");

      password.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
          event.preventDefault();
          loginButton.click();
        }
      });
    });
  </script>
