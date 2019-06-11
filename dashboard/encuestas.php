<?php

    include 'developer/security.php';
?>
<div class="row" >
    <div class="col-md-12">
        <h1 class="page-header">
            Gestión de encuestas <small></small>
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

        .width-90{
            width: 90px !important;
        }
    </style>

    <!-- comienza contenido -->
    <div class="col-md-12">

        <form role="form" id="frmBusqueda">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Búsqueda
                </div>
                <div class="panel-body">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Usuario: </label>
                            <select id="busuario" name="busuario" class="form-control">
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>E-mail: </label>
                            <input class="form-control" id="bEmail" name="bEmail" />
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label style="width:100%">Acciones</label>
                            <div class="btn-group" role="group" >
                                <button type="button" class="btn btn-default azul " onclick="buscar();"><i class="fa fa-search"></i> Buscar</button>
                                <button type="button" class="btn btn-default rojo tooltips" data-rel="tooltip" data-placement="bottom" title="Limpiar búsqueda" onclick="$('#tbl_encuestas').DataTable().ajax.url('developer/Lopersa/loadEncuestas?estado=').load(); $('#bEmail').val(''); "><i class="fa fa-trash-o"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="panel panel-default">
            <div class="panel-heading">
                Listado de Encuestas
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <div style="float:right;margin-left: 10px;">
                        <label style="float: left;margin-right: 10px;margin-top: 4px;"> Estado </label>
                        <select id="estado" class="form-control input-sm" style="float: left;width:150px;">
                            <option value="" selected="true">Todas</option>
                            <option value="0">Espera</option>
                            <option value="1">Realizada</option>
                            <option value="2">No Realizada</option>
                        </select>
                    </div>
                    <a style="float:right;" class="btn btn-success" data-toggle="modal" data-target="#mNuevo"><i class="fa fa-plus-square-o"></i> Nueva Encuesta</a>
                    <table class="table table-bordered table-hover" id="tbl_encuestas">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nombre Usuario</th>
                                <th>E-mail Persona</th>
                                <th>Nombre Persona</th>
                                <th>Celular</th>
                                <th>Fecha</th>
                                <th>Calificación</th>
                                <th>Estado</th>
                                <th >Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
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
                                    <input type="text" name="ntxtNombrePer" id="ntxtNombrePer" class="form-control"   required="true" />
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
        
        fLoadEncuestas();

        $.ajax({
            url : "developer/Lopersa/loadUsuariosS",
            type : "POST",
            data : {},
            dataType : "JSON",
            success : function (json){
                if(json.success == true){
                    html = '<option value="" disabled selected>Seleccione</option>';//
                    $.each(json.usuarios, function (key, data) {
                        html += '<option value="'+data.codigo_usu+'">'+data.nombre_usu+'</td>';
                    });
                    $("#usuarios").html(html);
                    $("#eUsuarios").html(html);
                    $("#busuario").html(html);
                    
                }
            }, complete: function(){
            }
        });

        $('#estado').change(function() {
            var est = $('#estado').val();
            var url = "developer/Lopersa/loadEncuestas?estado="+est;
            var cb = function (){ $('.tooltips').tooltip() };
            $('#tbl_encuestas').DataTable().ajax.url( url ).load( cb );
        });

    });


    function fLoadEncuestas(){
        
        $('#tbl_encuestas').dataTable({
            ajax : "developer/Lopersa/loadEncuestas?estado=",
            "aoColumnDefs" : [{
                "aTargets" : [0]
            }],
            "oLanguage" : {
                "sLengthMenu" : "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "No hay Datos registrados en el sistema",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _END_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sLoadingRecords": "Cargando Datos...",
                "sSearch" : "",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
            },
            "searching": false,
            "aaSorting" : [[0, 'desc']],
            "aLengthMenu" : [
                [10, 15, 20, -1], 
                [10, 15, 20, "Todos"] // change per page values here
            ],
            "columns": [ //agregar configuraciones a cada una de las columnas de las tablas
                { "class": "center" },//column 1
                { "class": "center", "orderable": false },//column 2
                { "orderable": false },//column 3
                { "class": "center", "orderable": false },//column 4
                { "class": "center", "orderable": false },//column 5
                { "class": "center", "orderable": false },//column 6
                { "class": "center", "orderable": false },//column 7
                { "class": "center", "orderable": false },//column 8
                { "class": "center width-90", "orderable": false }//column 9
            ],
            initComplete: function(oSettings, json) {
                $('[data-rel="tooltip"]').tooltip(); 
            },
            "iDisplayLength" : 10
        });

    }
    

    function fmodalEditar(cod, nombreper, email, celular){
        $("#eCodEncuesta").val(cod);
        $("#etxtNombrePer").val(nombreper);
        $("#etxtEmailPer").val(email);
        $("#etxtCelular").val(celular);
        $("#mEditar").modal('show');
    }

    function fmodalNuevo(){
        $("#mNuevo").modal('show');
    }

    function fNuevoItem(){

        var emailRegex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

        var usuarios = $("#usuarios").val();
        var ntxtNombrePer = $("#ntxtNombrePer").val();
        var ntxtEmailPer = $("#ntxtEmailPer").val();
        var ntxtCelular = $("#ntxtCelular").val();
        

        if($.trim(usuarios) == ''){
            toastr.error('Por favor, Seleccione usuario.');
            $("#usuarios").focus();

        }else if($.trim(ntxtNombrePer) == ''){
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
                    'usuario' : usuarios, 
                    'nombre_persona' : $.trim(ntxtNombrePer),
                    'email_persona' : $.trim(ntxtEmailPer),
                    'celular_persona' : $.trim(ntxtCelular)
                },
                dataType : "JSON",
                success : function (json){
                    if(json.success == true){
                        toastr.success("Encuesta enviada exitosamente");
                        $("#frmNuevo")[0].reset();
                        
                        $("#mNuevo").modal('hide');
                        
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

    function buscar(){
        var email_persona = $("#bEmail").val();
        var usuario = $("#busuario").val();
        $('#tbl_encuestas tbody').html('<tr class="odd"><td colspan="9" class="dataTables_empty" valign="top">Cargando datos...</td></tr>');
        var url = "developer/Lopersa/loadEncuestas?estado=&email_persona="+email_persona+"&usuario="+usuario;
        $('#tbl_encuestas').DataTable().ajax.url( url ).load();
    }

    function feditEstado(cod,est){
        var palabreo;
        if(est == 3){
            palabreo = "¿Está seguro de Eliminar esta Encuesta?";
        }else{
            palabreo = "¿Está seguro de Habilitar esta Encuesta?";   
        }
        bootbox.confirm(palabreo, function(result) {
            if (result) {
                $('.desactivarC').fadeIn(500);
                $.ajax({
                    url: "developer/Lopersa/editEstadoEncuesta",
                    type: "POST",
                    data: {codencuesta : cod, estado : est}
                })
                .done(function(data) {
                    if(data.success == true){
                        var cb = function (){ $('.tooltips').tooltip() };
                        $('#tbl_encuestas').DataTable().ajax.reload(cb);
                        $('.desactivarC').fadeOut(500);
                        toastr.success("Acción realizada exitosamente", "Maestro de Encuesta");
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

    $("#frmBusqueda").submit(function(event){
        event.preventDefault();
        buscar();
    });



    function reenviarCorreo(codencuesta, nombre_persona, email_persona, token){
        $('.desactivarC').fadeIn(500);
        $.ajax({
            url : "developer/Lopersa/reenviarCorreo",
            type : "POST",
            data : {
                'codencuesta':codencuesta,
                'nombre_persona': nombre_persona,
                'email_persona' : email_persona,
                'token': token
            },
            dataType : "JSON",
            success : function (json){
                if(json.success == true){
                    toastr.success("E-Mail Reenviado exitosamente.");
                    
                }else{
                    toastr.error(json.mensaje);
                }
            }, complete: function(){
                $('.desactivarC').fadeOut(500);
            }
        });
    }



</script>

