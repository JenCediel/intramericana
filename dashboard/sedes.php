<?php

    include 'developer/security.php';
?>
<div class="row" >
    <div class="col-md-12">
        <h1 class="page-header">
            Gestionar Sedes <small></small>
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

        <form role="form" id="frmBusqueda">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Busqueda
                </div>
                <div class="panel-body">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Nombre Sede: </label>
                            <input class="form-control" id="bNombreSede" name="bNombreSede" />
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label style="width:100%">Acciones</label>
                            <div class="btn-group" role="group" >
                                <button type="button" class="btn btn-default azul " onclick="buscar();"><i class="fa fa-search"></i> Buscar</button>
                                <button type="button" class="btn btn-default rojo tooltips" data-rel="tooltip" data-placement="bottom" title="Limpiar búsqueda" onclick="$('#tbl_sedes').DataTable().ajax.url('developer/Lopersa/loadSedes?estado=').load(); $('#bNombreSede').val(''); "><i class="fa fa-trash-o"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="panel panel-default">
            <div class="panel-heading">
                Listado de Sedes
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <div style="float:right;margin-left: 10px;">
                        <label style="float: left;margin-right: 10px;margin-top: 4px;"> Estado </label>
                        <select id="estado" class="form-control input-sm" style="float: left;width:150px;">
                            <option value="" selected="true">Todas</option>
                            <option value="on">Habilitado</option>
                            <option value="off">Inhabilitado</option>
                        </select>
                    </div>
                    <a style="float:right;" class="btn btn-success" data-toggle="modal" data-target="#mNuevo"><i class="fa fa-plus-square-o"></i> Nueva Sede</a>
                    <table class="table table-bordered table-hover" id="tbl_sedes">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nombre Sede</th>
                                <th>Estado</th>
                                <th>Acciones</th>
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
                    <h4 class="modal-title"><strong>Editar Sede</strong></h4>
                </div>
                <div class="modal-body">
                    <!-- BEGIN FORM-->
                    <form id="frmEditar" method="POST" class="form-horizontal">
                        <div class="form-body row">
                            <div class="form-group">
                                <label class="control-label col-md-4">Nombre Sede
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="txtNombreMenu" id="txtNombreMenu" class="form-control"  required="true" />
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
                    <h4 class="modal-title"><strong>Nueva Sede</strong></h4>
                </div>
                <div class="modal-body">
                    <!-- BEGIN FORM-->
                    <form id="frmNuevo" method="POST" class="form-horizontal">
                        <div class="form-body row">
                            <div class="form-group">
                                <label class="control-label col-md-4">Nombre Sede
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="ntxtNombreSede" id="ntxtNombreSede" class="form-control"  required="true" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Estado
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <select id="nestado" name="nestado" class="form-control">
                                        <option value="" disabled selected>Seleccione</option>
                                        <option value="on">Habilitada</option>
                                        <option value="off">Inhabilitada</option>
                                    </select>
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
        
        floadMenu();

        $('#estado').change(function() {
            var est = $('#estado').val();
            var url = "developer/Lopersa/loadSedes?estado="+est;
            var cb = function (){ $('.tooltips').tooltip() };
            $('#tbl_sedes').DataTable().ajax.url( url ).load( cb );
        });

    });


    function floadMenu(){
        
        $('#tbl_sedes').dataTable({
            ajax : "developer/Lopersa/loadSedes?estado=",
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
                {},//column 1
                { "class": "center", "orderable": false },//column 2
                { "orderable": false },//column 3
                { "class": "center", "orderable": false }//column 4
            ],
            initComplete: function(oSettings, json) {
                $('[data-rel="tooltip"]').tooltip(); 
            },
            "iDisplayLength" : 10
        });

    }
    

    function fmodalEditar(cod, imagen, nombre, link, estado){
        $("#txtCodmenu").val(cod);
        $("#txtIcono").val(imagen);
        $("#txtNombreMenu").val(nombre);
        $("#txtLink").val(link);
        $("#estado").val(estado);
        $("#mEditar").modal('show');
    }

    function fmodalNuevo(){
        $("#mNuevo").modal('show');
    }

    function fNuevoItem(){
        var ntxtNombreSede = $("#ntxtNombreSede").val();
        var nestado = $("#nestado").val();

        if($.trim(ntxtNombreSede) == ''){
            toastr.error('Por favor, ingrese Nombre de Sede.');
            $("#ntxtNombreSede").focus();

        }else if($.trim(nestado) == ''){
            toastr.error('Por favor, seleccione Estado de Sede.');
            $("#nestado").focus();

        }else{
            $('.desactivarC').fadeIn(500);
            $.ajax({
                url : "developer/Lopersa/insertItemSedes",
                type : "POST",
                data : {
                    'nombre_sede' : ntxtNombreSede,
                    'estado_sede' : nestado
                },
                dataType : "JSON",
                success : function (json){
                    if(json.success == true){
                        toastr.success("Item agregado exitosamente");
                        $("#frmNuevo")[0].reset();
                        
                        $("#mNuevo").modal('hide');
                        $('#tbl_sedes').DataTable().ajax.reload();

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
        var txtCodmenu = $("#txtCodmenu").val();
        var txtIcono = $("#txtIcono").val();
        var txtNombreMenu = $("#txtNombreMenu").val();
        var txtLink = $("#txtLink").val();
        var estado = $("#estado").val();

        if($.trim(txtIcono) == ''){
            toastr.error('Por favor, ingrese Icono de Menú.');
            $("#txtIcono").focus();

        }else if($.trim(txtNombreMenu) == ''){
            toastr.error('Por favor, ingrese Nombre de Menú.');
            $("#txtNombreMenu").focus();

        }else if($.trim(txtLink) == ''){
            toastr.error('Por favor, seleccione Nivel de Menú.');
            $("#txtLink").focus();

        }else if($.trim(estado) == ''){
            toastr.error('Por favor, seleccione Estado de Menú.');
            $("#estado").focus();

        }else{
             $('.desactivarC').fadeIn(500);
            $.ajax({
                url : "developer/Lopersa/editItemMenu",
                type : "POST",
                data : {
                    'codmenu':txtCodmenu,
                    'icono': txtIcono,
                    'nombre_menu' : txtNombreMenu,
                    'link' :  txtLink,
                    'estado' : estado
                },
                dataType : "JSON",
                success : function (json){
                    if(json.success == true){
                        toastr.success("Item Actualizado exitosamente");
                        $("#frmEditar")[0].reset();
                        
                        // $("#dPadre").hide();
                        $("#mEditar").modal('hide');
                        $('#tbl_sedes').DataTable().ajax.reload();

                        reloadmenu();
                       
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
        var nombre_sede = $("#bNombreSede").val();
        $('#tbl_sedes tbody').html('<tr class="odd"><td colspan="4" class="dataTables_empty" valign="top">Cargando datos...</td></tr>');
        var url = "developer/Lopersa/buscaSede?nombre_sede="+nombre_sede;
        $('#tbl_sedes').DataTable().ajax.url( url ).load();
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
                        $('#tbl_sedes').DataTable().ajax.reload(cb);
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

    $("#frmBusqueda").submit(function(event){
        event.preventDefault();
        buscar();
    });

</script>

