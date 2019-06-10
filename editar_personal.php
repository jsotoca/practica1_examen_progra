<?php
        $codigo = $_POST['codigo'];
        $nombres = $_POST['nombres'];
        $ap_paterno = $_POST['ap_paterno'];
        $ap_materno = $_POST['ap_materno'];
        $dni = $_POST['dni'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $vigencia = $_POST['vigencia'];
    
        include "conexion.php";
        try {
            $sql = $conexion->prepare("UPDATE PERSONAL SET nombres='$nombres',ap_paterno='$ap_paterno',ap_materno='$ap_materno',dni='$dni',telefono='$telefono',correo='$correo',vigencia=$vigencia WHERE codigo=$codigo");
            $sql->execute();
        } catch (PDOException $e) {
            return $e->messge();
        }
?>