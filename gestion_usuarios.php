<?php include "cabecera.php"; ?>
<section class="container bg-white">
    <div class="row p-3">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">REGISTRAR USUARIO</h4>
                    <form id="usuario_nuevo">
                            <div class="form-group">
                            <input type="text" placeholder="Ingresar Usuario" id="usuario" name="usuario" class="form-control" required="true">
                            </div>
                            <div class="form-group">
                            <input type="password" placeholder="Ingresar Contraseña" id="clave" name="clave" class="form-control"  required="true">
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="personal">
                                    <?php
                                        include "conexion.php";
                                        try {
                                            $sql = $conexion->prepare("SELECT * FROM personal");
                                            $sql->execute();
                                            while($dato = $sql->fetch()){
                                                ?>
                                                    <option value="<?php echo $dato['codigo'] ?>"><?php echo $dato['nombres'].' '.$dato['ap_paterno'].' '.$dato['ap_materno']?></option>
                                                <?php
                                            }
                                        } catch (PDOException $e) {
                                            echo $e->message();
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-check mt-2 mb-2">
                                <input type="checkbox" name="Uvigencia" id="Uvigencia" class="form-check-input">
                                <label for="Uvigencia" class="form-check-label">Vigencia</label>
                            </div>
                                <button type="submit" class="btn btn-success">REGISTRAR</button>
                                <button type="reset" class="btn btn-info">LIMPIAR</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="table-responsive">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <td>N°</td>
                            <td>Personal</td>
                            <td>Usuario</td>
                            <td>Opciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include "conexion.php";
                            try {
                                $sql = $conexion->prepare("SELECT U.codigo, P.ap_paterno, P.ap_materno, P.nombres, U.nombre FROM personal P JOIN usuario U ON P.codigo = U.codigoPersonal");
                                $sql->execute();
                                $contador = 1;
                                while($dato = $sql->fetch()){
                                    ?>
                                        <tr class="align-items-center">
                                            <td><?php echo $contador ?></td>
                                            <td><?php echo $dato['nombres'] ." ".$dato['ap_paterno'] ." ".$dato['ap_materno'] ?> </td>
                                            <td><?php echo $dato['nombre'] ?></td>
                                            <td>
                                                <button class="btn btn-info btn-sm" onclick="modalUsuario(<?php echo $dato['codigo']?>)">Editar</button>
                                                <button class="btn btn-warning btn-sm" onclick="eliminarUsuario(<?php echo $dato['codigo']?>)">Eliminar</button>
                                            </td>
                                            
                                        </tr>
                                    <?php
                                    $contador++;
                                }
                            } catch (PDOException $e) {
                                echo $e->message();
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="editar_usuario" tabindex="-1" role="dialog" aria-labelledby="editar_usuario">
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">EDITAR USUARIO</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="editarContenidoUsuario" class="modal-body mx-3">
        <!-- inicio formulario ediccion -->
        
      </div>
      <div class="modal-footer d-flex justify-content-center">
        
      </div>
    </div>
  </div>
</div>
<?php include "pie.php" ?>