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
        <form class="login-form" action="validar.php" method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Inicio de sesion</h3>
          <p>Usuario: <input type="text" placeholder="Ingrese el usuario" name="usuario" > * </p>
          <p>Contraseña: <input type="password" placeholder="Ingrese su contraseña" name="contraseña" > * </p>
          <input type="submit" value="Ingresar">
        </form>
        
      </div>
    </section>
