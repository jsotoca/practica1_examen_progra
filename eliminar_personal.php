<?php
    $codigo = $_POST['codigo'];
    include "conexion.php";

    try {
        $sql = $conexion->prepare("DELETE FROM personal WHERE codigo= $codigo");
        $sql->execute();
    } catch (PDOException $e) {
        return $e->message();
    }
?>