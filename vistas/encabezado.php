<!DOCTYPE html>
<!-- Parte de las barras laterales-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
    require_once "modelos/database.php";
    $usuario = $_SESSION['usuario'];


    ?>
    <title>ProSysControl</title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
    
    
  </head>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      <!-- Navbar-->
      <header class="main-header hidden-print"><a class="logo" href="home.php">ProSysControl </a>
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button--><a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
          <!-- Navbar Right Menu-->
          <div class="navbar-custom-menu">
            <ul class="top-nav">
              <!--Notification Menu-->
              <li class="dropdown notification-menu"><a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell-o fa-lg"></i></a>
                <ul class="dropdown-menu">
                  <li class="not-head">You have 4 new notifications.</li>
                  <li><a class="media" href="javascript:;"><span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                      <div class="media-body"><span class="block">Lisa sent you a mail</span><span class="text-muted block">2min ago</span></div></a></li>
                  <li><a class="media" href="javascript:;"><span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                      <div class="media-body"><span class="block">Server Not Working</span><span class="text-muted block">2min ago</span></div></a></li>
                  <li><a class="media" href="javascript:;"><span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                      <div class="media-body"><span class="block">Transaction xyz complete</span><span class="text-muted block">2min ago</span></div></a></li>
                  <li class="not-footer"><a href="#">See all notifications.</a></li>
                </ul>
              </li>
              <!-- User Menu-->
              <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu">
                  <li><a href="#"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
                  <li><a href="#"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                  <li><a href="?c=inicio&a=Salir"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Side-Nav-->
      <!-- Donde se muestra la sesion del usuario-->
      <aside class="main-sidebar hidden-print">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image"><img class="img-circle" src="assets/css/usuario.png" alt="User Image"></div>
            <div class="pull-left info">
              <p><?php echo($usuario)?></p>
              <p class="designation"><?php echo($_SESSION['tipoUsuario'])?></p>
            </div>
          </div>
          <!-- Sidebar Menu-->
          <ul class="sidebar-menu">
            <li class="active"><a href="home.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>

            <li class="treeview"><a href="#"><i class="fa fa-user"></i><span>Cliente</span><i class="fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              
                <li><a href="?c=cliente&a=FormCrear"><i class="fa fa-plus-square"></i> Agregar Cliente</a></li>

                <li><a href="?c=cliente"><i class="fa fa-list"></i> Lista de Clientes</a></li>
              </ul>
            </li>

            <li class="treeview"><a href="#"><i class="fa fa-briefcase"></i><span>Taller</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="?c=taller&a=FormCrear"><i class="fa fa-plus-square"></i> Agregar equipo al taller</a></li>
                
                <li><a href="?c=domicilio&a=FormCrear"><i class="fa fa-plus-square"></i> Agregar servicio a domicilio</a></li>
                <li><a href="?c=taller"><i class="fa fa-list"></i> Lista de equipos</a></li>
                <li><a href="?c=domicilio"><i class="fa fa-list"></i> Lista de servicios</a></li>
              </ul>
            </li>
            <!--condicion para ocultar si es tecnico-->
            <?php if($_SESSION['tipoUsuario']!='Tecnico'){?>
            <li><a href="#"><i class="fa fa-shopping-cart"></i><span>Punto de venta</span></a></li>
            
            <li class="treeview"><a href="#"><i class="fa fa-th-list"></i><span>Catalogo</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="?c=catalogo&a=FormCrear"><i class="fa fa-plus-square"></i> Agregar Articulos</a></li>
                <li><a href="?c=catalogo"><i class="fa fa-list"></i> Lista de Articulos</a></li>
              </ul>
            </li>
            <?php }?>
            <!--condicion para ocultar si es tecnico-->
            <?php if($_SESSION['tipoUsuario']!='Tecnico'){?>
            <li class="treeview"><a href="#"><i class="fa fa-user-secret"></i><span>Usuario</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <!--condicion para ocultar si es secretario-->
                <?php if($_SESSION['tipoUsuario']!='Secretario'){?>
                <li><a href="?c=usuario&a=FormCrear"><i class="fa fa-plus-square"></i> Agregar Usuario</a></li>
                <?php }?>
                <li><a href="?c=usuario"><i class="fa fa-list"></i> Lista de Usuarios</a></li>
              </ul>
            </li>
            <li><a href="?c=correo"><i class="fa fa-shopping-cart"></i><span>Correos</span></a></li>
            <?php }?>
            <!--<li class="treeview"><a href="#"><i class="fa fa-share"></i><span>Multilevel Menu</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="blank-page.html"><i class="fa fa-circle-o"></i> Level One</a></li>
                <li class="treeview"><a href="#"><i class="fa fa-circle-o"></i><span> Level One</span><i class="fa fa-angle-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="blank-page.html"><i class="fa fa-circle-o"></i> Level Two</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i><span> Level Two</span></a></li>
                  </ul>
                </li>
              </ul>
            </li>-->
          </ul>
        </section>
      </aside>