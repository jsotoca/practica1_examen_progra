$("#personal_nuevo").submit(function(e){
    e.preventDefault();
    const datos = {
        nombres: $("#nombres").val(),
        ap_paterno: $("#ap_paterno").val(),
        ap_materno: $("#ap_materno").val(),
        dni: $("#dni").val(),
        telefono: $("#telefono").val(),
        correo: $("#correo").val(),
        vigencia: ($("#vigencia").prop('checked'))? 1 : 0
    };
    $.post(
        'nuevo_personal.php',
        datos,
        function(){
            location.reload();
        }
    );
});

function eliminarPersonal(index){
    const datos = {codigo: index}
    $.post(
        'eliminar_personal.php',
        datos,
        function(){
            location.reload();
        }
    );
}

function modalPersonal(index){
    const datos = {codigo: index}
    $.get(
        'modal_personal.php',
        datos,
        function(respuesta){
            $("#editarContenido").html(respuesta);
        }
    );
    $("#editar_personal").modal('show');
}

function editarPersonal(){
    const datos = {
        codigo: $("#Ecodigo").val(),
        nombres: $("#Enombres").val(),
        ap_paterno: $("#Eap_paterno").val(),
        ap_materno: $("#Eap_materno").val(),
        dni: $("#Edni").val(),
        telefono: $("#Etelefono").val(),
        correo: $("#Ecorreo").val(),
        vigencia: ($("#Evigencia").prop('checked'))? 1 : 0
    };
    $.post(
        'editar_personal.php',
        datos,
        function($respuesta){
            $("#editar_personal").modal('hide');
            location.reload();
        }
    );
}

// FUNCIONES PARA USUARIOS

$("#usuario_nuevo").submit(function(e){
    e.preventDefault();
    const datos = {
        nombre: $("#usuario").val(),
        clave: $("#clave").val(),
        codigoPersonal: $("#personal").val(),
        vigencia: ($("#Uvigencia").prop('checked'))? 1 : 0
    };
    $.post(
        'nuevo_usuario.php',
        datos,
        function(){
            location.reload();
        }
    );
});

function modalUsuario(index){
    const datos = {codigo: index}
    $.get(
        'modal_usuario.php',
        datos,
        function(respuesta){
            $("#editarContenidoUsuario").html(respuesta);
        }
    );
    $("#editar_usuario").modal('show');
}


function editarUsuario(){
    const datos = {
        codigo: $("#Ucodigo").val(),
        nombre: $("#Zusuario").val(),
        clave: $("#Uclave").val(),
        personal: $("#Upersonal").val(),
        vigencia: ($("#UUvigencia").prop('checked'))? 1 : 0
    };
    $.post(
        'editar_usuario.php',
        datos,
        function($respuesta){
            $("#editar_usuario").modal('hide');
            location.reload();
        }
    );
}

function eliminarUsuario(index){
    const datos = {codigo: index}
    $.post(
        'eliminar_usuario.php',
        datos,
        function(){
            location.reload();
        }
    );
}