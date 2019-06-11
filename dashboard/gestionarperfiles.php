<?php

    include 'developer/security.php';
?>
<div class="row" >
    <div class="col-md-12">
        <h1 class="page-header">
            Gestionar Perfiles <small></small>
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
                            <label>Nombre perfil: </label>
                            <input class="form-control" id="bNombrePerfil" name="bNombrePerfil"  onkeyup="doSearch('bNombrePerfil','tbl_perfiles')"/>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="panel panel-default">
            <div class="panel-heading">
                Listado de Perfiles
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <a style="float:right;" class="btn btn-success" data-toggle="modal" data-target="#mNuevo"><i class="fa fa-plus-square-o"></i> Nuevo perfil</a>
                    <table class="table table-bordered table-hover" id="tbl_perfiles">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nombre perfil</th>
                                <th>Rol</th>
                                <th>Menús asignados</th>
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
                    <h4 class="modal-title"><strong>Editar Perfil</strong></h4>
                </div>
                <div class="modal-body">
                    <!-- BEGIN FORM-->
                    <form id="frmEditar" method="POST" class="form-horizontal">
                        <div class="form-body row">
                            <input type="hidden" name="txtCodPerfil" id="txtCodPerfil" />
                            <div class="form-group">
                                <label class="control-label col-md-4">Nombre Perfil
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="txtNombrePerfil" id="txtNombrePerfil" class="form-control"  required="true" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Estado
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <select id="estado" name="estado" class="form-control">
                                        <option value="" disabled selected>Seleccione</option>
                                        <option value="on">Habilitado</option>
                                        <option value="off">Inhabilitado</option>
                                    </select>
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
                    <h4 class="modal-title"><strong>Nuevo Perfil</strong></h4>
                </div>
                <div class="modal-body">
                    <!-- BEGIN FORM-->
                    <form id="frmNuevo" method="POST" class="form-horizontal">
                        <div class="form-body row">
                            <div class="form-group">
                                <label class="control-label col-md-4">Nombre
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="ntxtNombrePerfil" id="ntxtNombrePerfil" class="form-control"  required="true" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Rol
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <select id="nRol" name="nRol" class="form-control">
                                        
                                    </select>
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
                                        <option value="on">Habilitado</option>
                                        <option value="off">Inhabilitado</option>
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

        combobox('bRol','developer/Lopersa/loadRol','Todos');
        combobox('nRol','developer/Lopersa/loadRol','Seleccione...');
        
        fLoadPerfiles();

    });


    function fLoadPerfiles(){
        
        $('#tbl_perfiles').dataTable({
            ajax : "developer/Lopersa/loadPerfiles",
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
                { "orderable": false },//column 2
                { "orderable": false },//column 3
                { "orderable": false },//column 4
                { "class": "center", "orderable": false },//column 5
                { "class": "center", "orderable": false }//column 6
            ],
            initComplete: function(oSettings, json) {
                $('[data-rel="tooltip"]').tooltip(); 
            },
            "iDisplayLength" : 10
        });

    }
    

    function fmodalEditar(cod, nombre, estado){
        $("#txtCodPerfil").val(cod);
        $("#txtNombrePerfil").val(nombre);
        $("#estado").val(estado);
        $("#mEditar").modal('show');
    }

    function fmodalNuevo(){
        $("#mNuevo").modal('show');
    }

    function fNuevoItem(){
        var ntxtNombrePerfil = $("#ntxtNombrePerfil").val();
        var nRol = $("#nRol").val();
        var nestado = $("#nestado").val();

        if($.trim(ntxtNombrePerfil) == ''){
            toastr.error('Por favor, ingrese Nombre de Perfil.');
            $("#ntxtNombrePerfil").focus();

        }else if($.trim(nRol) == ''){
            toastr.error('Por favor, seleccione Rol de Perfil.');
            $("#nnivel").focus();

        }else if($.trim(nestado) == ''){
            toastr.error('Por favor, seleccione Estado de Perfil.');
            $("#nestado").focus();

        }else{

            $.ajax({
                url : "developer/Lopersa/insertItemPerfil",
                type : "POST",
                data : {
                    'nombre_perfil' : ntxtNombrePerfil,
                    'rol' : nRol,
                    'estado_perfil' : nestado
                },
                dataType : "JSON",
                success : function (json){
                    if(json.success == true){
                        toastr.success("Item agregado exitosamente");
                        $("#frmNuevo")[0].reset();
                        
                        $("#mNuevo").modal('hide');
                        $('#tbl_perfiles').DataTable().ajax.reload();
                    }else{
                        toastr.error(json.mensaje);
                    }
                }
            });
        }

    }

    function fEditarItem(){
        var txtCodPerfil = $("#txtCodPerfil").val();
        var txtNombrePerfil = $("#txtNombrePerfil").val();
        var estado = $("#estado").val();

        if($.trim(txtNombrePerfil) == ''){
            toastr.error('Por favor, ingrese Nombre de Perfil.');
            $("#txtNombrePerfil").focus();

        }else if($.trim(estado) == ''){
            toastr.error('Por favor, seleccione Estado de Perfil.');
            $("#estado").focus();

        }else{

            $.ajax({
                url : "developer/Lopersa/editItemPerfil",
                type : "POST",
                data : {
                    'codperfil':txtCodPerfil,
                    'nombre_perfil' : txtNombrePerfil,
                    'estado_perfil' : estado
                },
                dataType : "JSON",
                success : function (json){
                    if(json.success == true){
                        toastr.success("Item Actualizado exitosamente");
                        $("#frmEditar")[0].reset();
                        
                        // $("#dPadre").hide();
                        $("#mEditar").modal('hide');
                        $('#tbl_perfiles').DataTable().ajax.reload();

                       
                    }else{
                        toastr.error(json.mensaje);
                    }
                }
            });
        }

    }


    $("#frmBusqueda").submit(function(event){
        event.preventDefault();
    });


    function buscar(){
        var nombre_menu = $("#bNombremenu").val();

        var url = "developer/Lopersa/buscarMenu&nombre_menu="+nombre_menu+"&nivel="+nivel+"&padre="+padre;
        $('#tbl_perfiles').DataTable().ajax.url( url ).load();

    }

</script>

