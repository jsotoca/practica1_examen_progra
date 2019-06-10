<?php
    $codigo = $_GET['codigo'];
    include "conexion.php";

    try {
        $sql = $conexion->prepare("SELECT * FROM usuario WHERE codigo= $codigo");
        $sql->execute();
        if($datos = $sql->fetch()){
            ?>
                <form id="usuario_editar">
                <input type="text" id="Ucodigo" value="<?php echo $datos['codigo'] ?>" hidden>
                            <div class="form-group">
                            <input type="text" value="<?php echo $datos['nombre'] ?>" id="Zusuario" name="Zusuario" class="form-control" required="true">
                            </div>
                            <div class="form-group">
                            <input type="password" value="<?php echo $datos['clave'] ?>" id="Uclave" name="Uclave" class="form-control"  required="true">
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="Upersonal">
                                    <?php
                                        include "conexion.php";
                                        try {
                                            $sql2 = $conexion->prepare("SELECT * FROM personal");
                                            $sql2->execute();
                                            while($dato = $sql2->fetch()){
                                                ?>
                                                   <option <?php echo ($datos['codigoPersonal']==$dato['codigo'])? 'selected' : '' ?> value="<?php echo $dato['codigo'] ?>"><?php echo $dato['nombres'].' '.$dato['ap_paterno'].' '.$dato['ap_materno']?></option> 
                                                <?php
                                            }
                                        } catch (PDOException $e) {
                                            echo $e->message();
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-check mt-2 mb-2">
                                <input type="checkbox" <?php echo ($datos['vigencia']==1)? 'checked' : '' ?> name="UUvigencia" id="UUvigencia" class="form-check-input">                                
                                <label for="UUvigencia" class="form-check-label">Vigencia</label>
                            </div>
                            <button type="button" class="btn btn-success btn-block" onclick="editarUsuario()">REGISTRAR</button>
                    </form>
            <?php
        }
    } catch (PDOException $e) {
        return $e->message();
    }
?>