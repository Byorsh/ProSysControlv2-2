<?php
session_start();
session_destroy();
header("location: ./index.php");
exit();
/*sin implementar pero deberia usarse en el cerrar sesion */
?>
