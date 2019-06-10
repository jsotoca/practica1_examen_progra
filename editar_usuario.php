<?php
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $clave = $_POST['clave'];
        $personal = $_POST['personal'];
        $vigencia = $_POST['vigencia'];
    
        include "conexion.php";
        try {
            $sql = $conexion->prepare("UPDATE usuario SET nombre='$nombre',clave='$clave',codigoPersonal='$personal',vigencia=$vigencia WHERE codigo=$codigo");
            $sql->execute();
        } catch (PDOException $e) {
            return $e->messge();
        }
?>