<?php
    $nombre = $_POST['nombre'];
    $clave = $_POST['clave'];
    $codigoPersonal = $_POST['codigoPersonal'];
    $vigencia = $_POST['vigencia'];

    include "conexion.php";
    try {
        $sql = $conexion->prepare("INSERT INTO usuario(nombre,clave,codigoPersonal,vigencia) VALUES('$nombre','$clave','$codigoPersonal',$vigencia)");
        $sql->execute();
    } catch (PDOException $e) {
        return $e->messge();
    }
?>