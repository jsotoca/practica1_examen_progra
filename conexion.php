<?php 
    try {
        $conexion = new PDO('mysql:local=localhost;dbname=programacion',"root","");
    } catch (PDOExpception $e) {
        echo $e->message();
    }

?>