<?php
    $codigo = $_GET['codigo'];
    include "conexion.php";

    try {
        $sql = $conexion->prepare("SELECT * FROM personal WHERE codigo= $codigo");
        $sql->execute();
        if($datos = $sql->fetch()){
            ?>
                <form id="personal_editar">
                    <input type="text" id="Ecodigo" value="<?php echo $datos['codigo'] ?>" hidden>
                    <div class="form-group">
                        <label>Ingrese su nombre:</label>
                        <input type="text" value="<?php echo $datos['nombres'] ?>" id="Enombres" name="Enombres" class="form-control" required="true">
                    </div>
                    <div class="form-group">
                        <label>Ingrese su Apellido Paterno:</label>
                        <input type="text" value="<?php echo $datos['ap_paterno'] ?>" id="Eap_paterno" name="Eap_paterno" class="form-control"  required="true">
                    </div>
                    <div class="form-group">
                        <label>Ingrese su Apellido Materno:</label>
                        <input type="text" value="<?php echo $datos['ap_materno'] ?>" id="Eap_materno" name="Eap_materno" class="form-control"  required="true">                            
                    </div>
                    <div class="form-group">
                        <label>Ingrese su DNI:</label>
                        <input type="text" value="<?php echo $datos['dni'] ?>" name="Edni" id="Edni" class="form-control"  required="true">
                    </div>
                    <div class="form-group">
                        <label>Ingrese su telefono:</label>
                        <input type="text" value="<?php echo $datos['telefono'] ?>" name="Etelefono" id="Etelefono" class="form-control"  required="true">
                    </div>
                    <div class="form-group">
                        <label>Ingrese su correo:</label>
                        <input type="email" value="<?php echo $datos['correo'] ?>" name="Ecorreo" id="Ecorreo" class="form-control"  required="true">
                    </div>
                    <div class="form-check mt-2 mb-2">
                        <input type="checkbox" <?php echo ($datos['vigencia']==1)? 'checked' : '' ?> name="Evigencia" id="Evigencia" class="form-check-input">
                        <label for="Evigencia" class="form-check-label">Vigencia</label>
                    </div>
                    <button type="button" class="btn btn-success btn-block" onclick="editarPersonal()">REGISTRAR</button>
                </form>
            <?php
        }
    } catch (PDOException $e) {
        return $e->message();
    }
?>