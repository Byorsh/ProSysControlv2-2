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
  <link rel="stylesheet" type="text/css" href="assets/css/main.css">
  <title>Login</title>

  <script src="vistas/alertas/alertas.js"></script>
  <script src="index.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
  <section class="material-half-bg">
    <div class="cover"></div>
  </section>
  <section class="login-content">
    <div class="logo">
      <h1>ProSysControl</h1>
    </div>
    <div class="login-box">
      <!-- Redirecciona a la validacion del login validar.php -->
      <br><br>
      <form class="login-form" action="validar.php" method="post">
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i> <label>Inicio de sesion</label></h3><br><br>
        <div class="login-group"> <label>Usuario: </label> <input type="text" placeholder="Ingrese el usuario" name="usuario" id="usuario" onkeyup="handleSubmit()" maxlength="40" min="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode == 32) || (event.charCode >= 97 && event.charCode <= 122))"></div>
        <p class="alert-danger" id="advertenciaUsuario" style="float: left;" hidden>
          Min. de 3 caracteres, solo letras y espacios
        </p>
        <div class="login-group"><label>Contraseña:</label> <input type="password" placeholder="Ingrese su contraseña" id="password" onkeyup="handleSubmit()" maxlength="70" min="1" name="contraseña" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57))"> </div>
        <p class="login-group"><button type="submit" value="Ingresar" id="submitButton" disabled>Ingresar</button></p>
      </form>

    </div>
  </section>