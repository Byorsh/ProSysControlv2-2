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
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
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
          <p>Usuario <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ. ]{3,20}" placeholder="Ingrese el usuario" name="usuario" > * </p>
          <p>Contraseña <input type="password" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{7,20}" placeholder="Ingrese su contraseña" name="contraseña" > * </p>
          <input type="submit" value="Ingresar">
          <!--
          <br><br><br>
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" type="text" placeholder="Email" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" placeholder="Password">
          </div>
          
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block">SIGN IN<i class="fa fa-sign-in fa-lg"></i></button>
          </div>
          -->
        </form>
        
      </div>
    </section>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
