<?php
    $nombres = $_POST['nombres'];
    $ap_paterno = $_POST['ap_paterno'];
    $ap_materno = $_POST['ap_materno'];
    $dni = $_POST['dni'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $vigencia = $_POST['vigencia'];

    include "conexion.php";
    try {
        $sql = $conexion->prepare("INSERT INTO PERSONAL(nombres,ap_paterno,ap_materno,dni,telefono,correo,vigencia) VALUES('$nombres','$ap_paterno','$ap_materno','$dni','$telefono','$correo',$vigencia)");
        $sql->execute();
    } catch (PDOException $e) {
        return $e->messge();
    }
?>