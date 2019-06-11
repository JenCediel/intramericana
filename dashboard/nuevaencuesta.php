<?php

    include 'developer/security.php';
?>
<div class="row" >
    <div class="col-md-12">
        <h1 class="page-header">
            Nueva encuesta <small></small>
        </h1>
    </div>

    <style>
        .azul, .azul:hover{
            background: #225081;
            border: medium none;
            color: #fff;
        }

        .rojo, .rojo:hover{
            background: rgb(217, 83, 79);
            border: medium none;
            color: #fff;
        }
        .dataTables_empty{
            text-align: center !important;
        }
    </style>

    <!-- comienza contenido -->
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                Datos de Encuestas


                <!-- <p>Ingresa los datos de la persona que realizará la encuesta</p> -->
            </div>
            <div class="panel-body">
                <form id="frmNuevo" method="POST" class="form-horizontal">
                    <div class="form-body row">

                        <div class="form-group">
                            <label class="control-label col-md-4">Nombre
                                <span class="required">
                                     *
                                </span>
                            </label>
                            <div class="col-md-6">
                                <input type="text" name="ntxtNombrePer" id="ntxtNombrePer" class="form-control" required="true" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">E-Mail
                                <span class="required">
                                     *
                                </span>
                            </label>
                            <div class="col-md-6">
                                <input type="text" name="ntxtEmailPer" id="ntxtEmailPer" class="form-control"  required="true" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Celular (opcional)
                            </label>
                            <div class="col-md-6">
                                <input type="text" name="ntxtCelular" id="ntxtCelular" class="form-control"  required="true" />
                            </div>
                        </div>

                        <div class="form-group" style="text-align:right">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-success" onclick="fNuevoItem();">Guardar item</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>

    </div>

    <!-- MODAL -->

    <div class="modal fade" id="mEditar" tabindex="-1" role="dialog" aria-labelledby="mEditar" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><strong>Editar Datos</strong></h4>
                </div>
                <div class="modal-body">
                    <!-- BEGIN FORM-->
                    <form id="frmEditar" method="POST" class="form-horizontal">
                        <div class="form-body row">
                            <div class="form-group">
                                <label class="control-label col-md-4">Usuario a Valorar
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="hidden" name="eCodEncuesta" id="eCodEncuesta" class="form-control" required="true" />
                                    <select id="eUsuarios" name="eUsuarios" class="form-control" disabled>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-4">Nombre
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="etxtNombrePer" id="etxtNombrePer" class="form-control" required="true" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">E-Mail
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="etxtEmailPer" id="etxtEmailPer" class="form-control" required="true" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Celular (opcional)
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="etxtCelular" id="etxtCelular" class="form-control"  required="true" />
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="fEditarItem();">Guardar cambios</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="mNuevo" tabindex="-1" role="dialog" aria-labelledby="mNuevo" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><strong>Nueva Encuesta</strong></h4>
                    <p>Ingresa los datos de la persona que realizará la encuesta</p>
                </div>
                <div class="modal-body">
                    <!-- BEGIN FORM-->
                    <form id="frmNuevo" method="POST" class="form-horizontal">
                        <div class="form-body row">
                            <div class="form-group">
                                <label class="control-label col-md-4">Usuario a Valorar
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <select id="usuarios" name="usuarios" class="form-control">
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-4">Nombre
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="ntxtNombrePer" id="ntxtNombrePer" class="form-control"  value="Manuel Lopez" required="true" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">E-Mail
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="ntxtEmailPer" id="ntxtEmailPer" class="form-control" value="wparedes@coruniamericana.edu.co" required="true" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Celular (opcional)
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="ntxtCelular" id="ntxtCelular" class="form-control"  required="true" />
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="fNuevoItem();">Guardar item</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- FIN MODALS -->
</div>



<script>
    $(document).ready(function () {
        

    });


    function fmodalEditar(cod, nombreper, email, celular){
        $("#eCodEncuesta").val(cod);
        $("#etxtNombrePer").val(nombreper);
        $("#etxtEmailPer").val(email);
        $("#etxtCelular").val(celular);
        $("#mEditar").modal('show');
    }


    function fNuevoItem(){

        var emailRegex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

        var ntxtNombrePer = $("#ntxtNombrePer").val();
        var ntxtEmailPer = $("#ntxtEmailPer").val();
        var ntxtCelular = $("#ntxtCelular").val();
        

        if($.trim(ntxtNombrePer) == ''){
            toastr.error('Por favor, ingrese Nombre.');
            $("#ntxtNombrePer").focus();

        }else if($.trim(ntxtEmailPer) == ''){
            toastr.error('Por favor, ingrese E-Mail.');
            $("#ntxtEmailPer").focus();

        }else if(!emailRegex.test($.trim(ntxtEmailPer) )){
            toastr.error('E-mail invalido.');
            $("#ntxtEmailPer").focus();
        }else{
            $('.desactivarC').fadeIn(500);
            $.ajax({
                url : "developer/Lopersa/insertEncuesta",
                type : "POST",
                data : {
                    'nombre_persona' : $.trim(ntxtNombrePer),
                    'email_persona' : $.trim(ntxtEmailPer),
                    'celular_persona' : $.trim(ntxtCelular)
                },
                dataType : "JSON",
                success : function (json){
                    if(json.success == true){
                        toastr.success("Encuesta enviada exitosamente");
                        $("#frmNuevo")[0].reset();
                        

                    }else{
                        toastr.error(json.mensaje);
                    }
                }, complete: function(){
                    $('.desactivarC').fadeOut(500);
                }
            });
        }

    }

    function fEditarItem(){

        var emailRegex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;



        var eCodEncuesta = $("#eCodEncuesta").val();
        var etxtNombrePer = $("#etxtNombrePer").val();
        var etxtEmailPer = $("#etxtEmailPer").val();
        var etxtCelular = $("#etxtCelular").val();

        if($.trim(etxtNombrePer) == ''){
            toastr.error('Por favor, ingrese Nombre.');
            $("#etxtNombrePer").focus();

        }else if($.trim(etxtEmailPer) == ''){
            toastr.error('Por favor, ingrese E-mail.');
            $("#etxtEmailPer").focus();

        }else if(!emailRegex.test($.trim(etxtEmailPer) )){
            toastr.error('E-mail invalido.');
            $("#etxtEmailPer").focus();
        }else{
             $('.desactivarC').fadeIn(500);
            $.ajax({
                url : "developer/Lopersa/editItemEncuesta",
                type : "POST",
                data : {
                    'codencuesta':eCodEncuesta,
                    'nombre_persona': etxtNombrePer,
                    'email_persona' : etxtEmailPer,
                    'celular_persona' :  etxtCelular
                },
                dataType : "JSON",
                success : function (json){
                    if(json.success == true){
                        toastr.success("Item Actualizado exitosamente");
                        $("#frmEditar")[0].reset();
                        
                        // $("#dPadre").hide();
                        $("#mEditar").modal('hide');
                        $('#tbl_encuestas').DataTable().ajax.reload();

                    }else{
                        toastr.error(json.mensaje);
                    }
                }, complete: function(){
                    $('.desactivarC').fadeOut(500);
                }
            });
        }

    }



    function feditEstado(cod,est){
        var palabreo;
        if(est == 'off'){
            palabreo = "¿Está seguro de Inhabilitar esta Sede?";
        }else{
            palabreo = "¿Está seguro de Habilitar esta Sede?";   
        }
        bootbox.confirm(palabreo, function(result) {
            if (result) {
                $('.desactivarC').fadeIn(500);
                $.ajax({
                    url: "developer/Lopersa/editEstadoSede",
                    type: "POST",
                    data: {codigo_sede : cod, estado : est}
                })
                .done(function(data) {
                    if(data.success == true){
                        var cb = function (){ $('.tooltips').tooltip() };
                        $('#tbl_encuestas').DataTable().ajax.reload(cb);
                        $('.desactivarC').fadeOut(500);
                        toastr.success("Acción realizada exitosamente", "Maestro de Sedes");
                    }else{
                       toastr.error( "Request failed: " + data.mensaje); 
                    }
                })
                .fail(function( jqXHR, textStatus ) {
                    $('.desactivarC').fadeOut(500);
                    toastr.error( "Request failed: " + jqXHR.responseText);
                });
            }
        });
    }


</script>

