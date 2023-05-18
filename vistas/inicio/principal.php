<div class="content-wrapper">
            <?php
            require_once "modelos/usuario.php";
            //private $modeloUsuario;

            $nombreUsuario = $_SESSION['usuario'];
            $urlRevisarEquiposAsignados = "?c=taller&a=PaginarN&pagina=1&q=idt".$_SESSION['idusuario'];
            ?>
        <div class="page-title">
          <div>
            <p><h1><i class="fa fa-home"></i> Inicio  </h1>
            <h1>Bienvenido <?php echo($nombreUsuario); ?> </h1></p>
          </div>
          <div>
            
            
          </div>
        </div>
        <!-- En esta parte irian los reportes-->
        
        <div class="row">
        <?php if ($_SESSION['tipoUsuario'] == 'Admin') { ?>
          <div class="col-md-3 col-lg-3" id="reporte" >
            <div class="widget-small info" onclick="clickReporteDireccionHref('?c=usuario')"><i class="icon fa fa-users fa-3x"></i>
              <div class="info">
                <h4>Usuarios</h4>
                <p><b><?php $usuario=$this->modeloUsuario->Cantidad()?>
                <?=$usuario->CantidadUsuario?></b></p>
              </div>
            </div>
          </div>
        <?php } ?>

          <!--condicion para ocultar si es secretario-->
          <?php if ($_SESSION['tipoUsuario'] != 'Secretario') { ?>
          <div class="col-md-3" >
            <div class="widget-small primary" onclick="clickReporteDireccionHref('<?php echo($urlRevisarEquiposAsignados); ?>')"><i class="icon fa fa-gears fa-3x"></i>
              <div class="info">
              <h4>Mis Equipos Asignados</h4>
                <p><b><?php $usuario=$this->modeloUsuario->CantidadDeEquiposAsignados($_SESSION['idusuario'])?>
                <?=$usuario->CantidadEquipos?></b></p>
              </div>
            </div>
          </div>
            <?php } ?>

          <div class="col-md-3" >
            <div class="widget-small danger" onclick="clickReporteDireccionHref('?c=domicilio')" ><i class="icon fa fa-truck fa-3x"></i>
              <div class="info">
                <h4>Servicios Pendientes</h4>
                <p><b><?php $usuario=$this->modeloUsuario->CantidadServicios()?>
                <?=$usuario->CantidadServicios?></b></p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="widget-small warning" onclick="clickReporteDireccionHref('?c=taller')"><i class="icon fa fa-clock-o fa-3x"></i>
              <div class="info">
                <h4>Equipos en espera</h4>
                <p><b><?php $usuario=$this->modeloUsuario->CantidadEquiposEnEspera()?>
                <?=$usuario->CantidadEquiposEnEspera?></b></p>
              </div>
            </div>
          </div>
          <div class="col-md-3" >
            <div class="widget-small warning" onclick="clickReporteDireccionHref('?c=usuario&a=FormCambiarcontraseña')"><i class="icon fa fa-lock fa-3x"></i>
              <div class="info">
                <h4>Cambiar mi contraseña</h4>
                <p><b></b></p>
              </div>
            </div>
          </div>

          
          <!--<div class="col-md-6">
            <div class="card">
              <h3 class="card-title">Getting Started</h3>
              <p>Vali is a free and responsive dashboard theme built with Bootstrap, Pug.js (templating) and SASS. It's fully customizable and modular. You don't need to add the code, you will not use.</p>
              <p>The issue with the most admin themes out there is that if you will see their source code there are a hell lot of external CSS and javascript files in there. And if you try to remove a CSS or Javascript file some things stops working.</p>
              <p>That's why I made Vali. Which is a light weight yet expendable and good looking theme. The theme has all the features required in a dashboard theme but this features are built like plug and play module. Take a look at the <a href="http://pratikborsadiya.in/blog/vali-admin" target="_blank">documentation</a> about customizing the theme.</p>
              <p class="mt-40 mb-20"><a class="btn btn-primary icon-btn mr-10" href="http://pratikborsadiya.in/blog/vali-admin" target="_blank"><i class="fa fa-file"></i>Docs</a><a class="btn btn-info icon-btn mr-10" href="https://github.com/pratikborsadiya/vali-admin" target="_blank"><i class="fa fa-github"></i>GitHub</a><a class="btn btn-success icon-btn" href="https://github.com/pratikborsadiya/vali-admin/archive/master.zip" target="_blank"><i class="fa fa-download"></i>Download</a></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <h3 class="card-title">Compatibility with frameworks</h3>
              <p>This theme is not built for a specific framework or technology like Angular or React etc. But due to it's modular nature it's very easy to incorporate it into any front-end or back-end framework like Angular, React or Laravel.</p>
              <p>Go to <a href="http://pratikborsadiya.in/blog/vali-admin" target="_blank">documentation</a> for more details about integrating this theme with various frameworks.</p>
              <p>The source code is available on GitHub. If anything is missing or weird please report it as an issue on <a href="https://github.com/pratikborsadiya/vali-admin" target="_blank">GitHub</a>. If you want to contribute to this theme pull requests are always welcome.</p>
            </div>
          </div>-->
        </div>
      </div>
    </div>
    <script>
      function clickReporteDireccionHref(url){
        location.href = url;
      }
    </script>
    <script src="vistas/alertas/alertas.js"></script>
    <?php /*
$regex = new Regex;
$regex->sweet_alerts("Base respaldada");
*/ ?>
