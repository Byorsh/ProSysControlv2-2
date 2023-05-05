<?php

require_once "modelos/usuario.php";

class InicioControlador{
    private $modeloUsuario;

    public function __CONSTRUCT(){
        $this->modeloUsuario = new Usuario();
    }

    public function Inicio(){
        require_once "vistas/encabezado.php";
        //$_POST['equiposAsignados']=$this->modeloUsuario->CantidadDeEquiposAsignados($_SESSION['id']);
        require_once "vistas/inicio/principal.php";
        require_once "vistas/pie.php";
    }

    public function Res(){
        //CODIGO ABOBINABLE
        if(true){
            require_once 'vistas/login/Connet.php';
            $day=date("d");
            $mont=date("m");
            $year=date("Y");
            $hora=date("H-i-s");
            $fecha=$day.'_'.$mont.'_'.$year;
            $DataBASE='prosyscontrol_'.$fecha."_(".$hora."_hrs).sql";
            $tables=array();
            $result=SGBD::sql('SHOW TABLES');
            if($result){
                while($row=mysqli_fetch_row($result)){
                $tables[] = $row[0];
                }
                $sql='SET FOREIGN_KEY_CHECKS=0;'."\n\n";
                $sql.='CREATE DATABASE IF NOT EXISTS '.BD.";\n\n";
                $sql.='USE '.BD.";\n\n";;
                foreach($tables as $table){
                    $result=SGBD::sql('SELECT * FROM '.$table);
                    if($result){
                        $numFields=mysqli_num_fields($result);
                        $sql.='DROP TABLE IF EXISTS '.$table.';';
                        $row2=mysqli_fetch_row(SGBD::sql('SHOW CREATE TABLE '.$table));
                        $sql.="\n\n".$row2[1].";\n\n";
                        for ($i=0; $i < $numFields; $i++){
                            while($row=mysqli_fetch_row($result)){
                                $sql.='INSERT INTO '.$table.' VALUES(';
                                for($j=0; $j<$numFields; $j++){
                                    $row[$j]=addslashes($row[$j]);
                                    $row[$j]=str_replace("\n","\\n",$row[$j]);
                                    if (isset($row[$j])){
                                        $sql .= '"'.$row[$j].'"' ;
                                    }
                                    else{
                                        $sql.= '""';
                                    }
                                    if ($j < ($numFields-1)){
                                        $sql .= ',';
                                    }
                                }
                                $sql.= ");\n";
                            }
                        }
                        $sql.="\n\n\n";
                    }else{
                        $error=1;
                    }
                }
                if($error==1){
                    echo 'Ocurrio un error inesperado al crear la copia de seguridad';
                }else{
                    chmod(BACKUP_PATH, 0777);
                    $sql.='SET FOREIGN_KEY_CHECKS=1;';
                    $archivo=fopen(BACKUP_PATH.$DataBASE,'w+');
                    
                    if(fwrite($archivo, $sql)){
                        @readfile($DataBASE,BACKUP_PATH.$DataBASE);
                        fclose($archivo);

                        if (file_exists(BACKUP_PATH.$DataBASE)) {
                            header('Content-Description: File Transfer');
                            header('Content-Type: application/octet-stream');
                            header('Content-Disposition: attachment; filename="'.basename(BACKUP_PATH.$DataBASE).'"');
                            header('Expires: 0');
                            header('Cache-Control: must-revalidate');
                            header('Pragma: public');
                            header('Content-Length: ' . filesize(BACKUP_PATH.$DataBASE));
                            readfile(BACKUP_PATH.$DataBASE);
                            exit;
                        }
                        echo 'Copia de seguridad realizada con éxito';
                        $bandera_respaldo=true;
                    }else{
                        echo 'Ocurrio un error inesperado al crear la copia de seguridad';
                    }
                }
            }else{
                echo 'Ocurrio un error inesperado';
            }
            mysqli_free_result($result);
        }
        if($bandera_respaldo){
            require_once "vistas/encabezado.php";
            require_once "vistas/inicio/principal.php";
            require_once "vistas/pie.php";
        }



        
    }

    public function Salir(){
        require_once "vistas/login/salir.php";
        
    }
}