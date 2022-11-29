<?php
class Regex{
    public function limpiarCampo($campo){
        $campo=trim($campo);
        $campo=stripslashes($campo);
        $campo=str_ireplace("<script>", "" ,$campo);
        $campo=str_ireplace("</script>", "" ,$campo);
        $campo=str_ireplace("<script src", "" ,$campo);
        $campo=str_ireplace("<script type=", "" ,$campo);
        $campo=str_ireplace("SELECT", "" ,$campo);
        $campo=str_ireplace("SELECT * FROM", "" ,$campo);
        $campo=str_ireplace("DELETE FROM", "" ,$campo);
        $campo=str_ireplace("INSERT INTO", "" ,$campo);
        $campo=str_ireplace("DROP TABLE", "" ,$campo);
        $campo=str_ireplace("DROP DATABASE", "" ,$campo);
        $campo=str_ireplace("TRUNCATE TABLE", "" ,$campo);
        $campo=str_ireplace("SHOW TABLES", "" ,$campo);
        $campo=str_ireplace("SHOW DATABASES", "" ,$campo);
        $campo=str_ireplace("<php?", "" ,$campo);
        $campo=str_ireplace("?>", "" ,$campo);
        $campo=str_ireplace("--", "" ,$campo);
        $campo=str_ireplace("<", "" ,$campo);
        $campo=str_ireplace(">", "" ,$campo);
        $campo=str_ireplace("[", "" ,$campo);
        $campo=str_ireplace("]", "" ,$campo);
        $campo=str_ireplace("==", "" ,$campo);
        $campo=str_ireplace(";", "" ,$campo);
        $campo=str_ireplace("::", "" ,$campo);
        $campo=stripslashes($campo);
        $campo=trim($campo);
        return $campo;

    }
    public function validarLetras($campo){
        limpiarCampo($campo);
        if(ctype_digit($campo)){

        }else{
            
        }
    }
    public function sweet_alerts($datos){
        echo($datos);
        $var = json_encode($datos);
        ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="vistas/alertas/alertas.js"></script>
        <script>
            var x='<?php echo json_encode($datos); ?>';
            console.log('<?php echo($datos); ?>'+'a');
            console.log(x);
            alertaLogin('<?php echo($datos); ?>');
        </script>
        <?php
    }

}