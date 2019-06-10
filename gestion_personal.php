<?php include "cabecera.php"; ?>
<section class="container bg-white">
    <div class="row p-3">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">REGISTRAR PERSONAL</h4>
                    <form id="personal_nuevo">
                            <div class="form-group">
                            <input type="text" placeholder="Ingresar Nombres" id="nombres" name="nombres" class="form-control" required="true">
                            </div>
                            <div class="form-group">
                            <input type="text" placeholder="Ingresar Apellido Paterno " id="ap_paterno" name="ap_paterno" class="form-control"  required="true">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Ingresar Apellido Materno " id="ap_materno" name="ap_materno" class="form-control"  required="true">                            
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Ingresar DNI " name="dni" id="dni" class="form-control"  required="true">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Ingresar Teléfono " name="telefono" id="telefono" class="form-control"  required="true">
                            </div>
                            <div class="form-group">
                                <input type="email" placeholder="Ingresar correo" name="correo" id="correo" class="form-control"  required="true">
                            </div>
                            <div class="form-check mt-2 mb-2">
                                <input type="checkbox" name="vigencia" id="vigencia" id="vigencia" class="form-check-input">
                                <label for="vigencia" class="form-check-label">Vigencia</label>
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
                            <td>Nombre Completo</td>
                            <td>DNI</td>
                            <td>Teléfono</td>
                            <td>Vigencia</td>
                            <td>Opciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include "conexion.php";
                            try {
                                $sql = $conexion->prepare("SELECT * FROM personal");
                                $sql->execute();
                                $contador = 1;
                                while($dato = $sql->fetch()){
                                    ?>
                                        <tr class="align-items-center">
                                            <td><?php echo $contador ?></td>
                                            <td><?php echo $dato['nombres'] ." ".$dato['ap_paterno'] ." ".$dato['ap_materno'] ?> </td>
                                            <td><?php echo $dato['dni'] ?></td>
                                            <td><?php echo $dato['telefono'] ?></td>
                                            <td><?php echo ($dato['vigencia']==1)? 'activo' : 'inactivo' ?></td>
                                            <td>
                                                <!-- <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#editar_personal">Editar</button> -->
                                                <button class="btn btn-info btn-sm mb-1" onclick="modalPersonal(<?php echo $dato['codigo']?>)">Editar</button>
                                                <button class="btn btn-danger btn-sm mb-1" onclick="eliminarPersonal(<?php echo $dato['codigo']?>)">Eliminar</button>
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
<div class="modal fade" id="editar_personal" tabindex="-1" role="dialog" aria-labelledby="editar_personal">
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">EDITAR PERSONAL</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="editarContenido" class="modal-body mx-3">
        <!-- inicio formulario ediccion -->
        
      </div>
      <div class="modal-footer d-flex justify-content-center">
        
      </div>
    </div>
  </div>
</div>
<?php include "pie.php" ?>