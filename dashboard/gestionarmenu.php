<?php

    include 'developer/security.php';
?>
<div class="row" >
    <div class="col-md-12">
        <h1 class="page-header">
            Gestionar Menú <small></small>
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

        <form id="frmBusqueda" role="form" >
            <div class="panel panel-default">
                <div class="panel-heading">
                    Búsqueda
                </div>
                <div class="panel-body">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Nombre Menú: </label>
                            <input class="form-control" id="bNombremenu" name="bNombremenu" />
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Nivel: </label>
                            <select id="bNivel" name="bNivel" class="form-control">
                                <option value=""  selected>Todos</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 bdivpadre" style="display:none">
                        <div class="form-group">
                            <label>Padre: </label>
                            <select id="bPadre" name="bPadre" class="form-control">
                                <option value=""  selected>Todos</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label style="width:100%">Acciones</label>
                            <div class="btn-group" role="group" >
                                <button type="button" class="btn btn-default azul " onclick="buscar();"><i class="fa fa-search"></i> Buscar</button>
                                <button type="button" class="btn btn-default rojo tooltips" data-rel="tooltip" data-placement="bottom" title="Limpiar búsqueda" onclick="$('#tbl_menu').DataTable().ajax.url('developer/Lopersa/loadMenu').load(); $('#bNombremenu').val('');$('#bNivel').val(''); "><i class="fa fa-trash-o"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="panel panel-default">
            <div class="panel-heading">
                Listado de Menús
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <a style="float:right;" class="btn btn-success" data-toggle="modal" data-target="#mNuevo"><i class="fa fa-plus-square-o"></i> Nuevo Menú</a>
                    <table class="table table-bordered table-hover" id="tbl_menu">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Icono</th>
                                <th>Nombre Menú</th>
                                <th>Nivel</th>
                                <th>Orden</th>
                                <th>Padre</th>
                                <th>Link</th>
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
                    <h4 class="modal-title"><strong>Editar Menú</strong></h4>
                </div>
                <div class="modal-body">
                    <!-- BEGIN FORM-->
                    <form id="frmEditar" method="POST" class="form-horizontal">
                        <div class="form-body row">
                            <div class="form-group">
                                <input type="hidden" name="txtCodmenu" id="txtCodmenu"   />
                                <label class="control-label col-md-4">Icono
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="txtIcono" id="txtIcono" class="form-control"  required="true" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Nombre Menú
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="txtNombreMenu" id="txtNombreMenu" class="form-control"  required="true" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Link
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="txtLink" id="txtLink" class="form-control"  required="true" />
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
                    <h4 class="modal-title"><strong>Nuevo Menú</strong></h4>
                </div>
                <div class="modal-body">
                    <!-- BEGIN FORM-->
                    <form id="frmNuevo" method="POST" class="form-horizontal">
                        <div class="form-body row">
                            <div class="form-group">
                                <label class="control-label col-md-4">Icono
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="ntxtIcono" id="ntxtIcono" class="form-control"  required="true" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Nombre
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="ntxtNombreMenu" id="ntxtNombreMenu" class="form-control"  required="true" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Nivel
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <select id="nnivel" name="nnivel" class="form-control">
                                        <option value="" disabled selected>Seleccione</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                            </div> 
                            <!-- SELECCIONAR PADRE -->
                            <div class="form-group dPadre" style="display:none;">
                                <label class="control-label col-md-4">Debajo de (Padre): 
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <select id="npadre" name="npadre" class="form-control">
                                        
                                    </select>
                                </div>
                            </div>
                            <!-- FIN SELECCIONAR PADRE -->
                            <div class="form-group">
                                <label class="control-label col-md-4">Link
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="ntxtLink" id="ntxtLink" class="form-control"  required="true" />
                                </div>
                            </div>
                            
                            <!-- <div class="form-group">
                                <label class="control-label col-md-4">Orden
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="ntxtOrden" id="ntxtOrden" placeholder="1" class="form-control" readonly required="true" style="text-align:right; color:red; font-weight: bold;" />
                                </div>
                            </div> -->
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
        
        floadMenu();

        $("#bNivel").on("change", function () {
            var nivel = $("#bNivel").val();
            if(nivel == '1'){
                $(".bdivpadre").hide();
                
            }else if(nivel == '2'){
                $.ajax({
                    url : "developer/Lopersa/loadPadresMenu",
                    type : "POST",
                    data : {},
                    dataType : "JSON",
                    success : function (json){
                        if(json.success == true){
                            html = '<option value="" selected>Todos</option>';//<option value="" disabled selected>Seleccione</option>
                            $.each(json.menu, function (key, data) {
                                html += '<option value="'+data.codigo_menu+'">'+data.nombre_menu+'</td>';
                            });
                            $("#bPadre").html(html);
                        }
                    }, complete: function(){
                        $(".bdivpadre").show();
                    }
                });
            }else{
                $(".bdivpadre").hide();
            }
            
        });
        $("#nnivel").on("change", function () {
            var nivel = $("#nnivel").val();
            if(nivel == '1'){
                $("#ntxtLink").val("#");
                $(".dPadre").hide();
                
            }else if(nivel == '2'){
                $("#ntxtLink").val("");
                $.ajax({
                    url : "developer/Lopersa/loadPadresMenu",
                    type : "POST",
                    data : {},
                    dataType : "JSON",
                    success : function (json){
                        if(json.success == true){
                            html = '';//<option value="" disabled selected>Seleccione</option>
                            $.each(json.menu, function (key, data) {
                                html += '<option value="'+data.codigo_menu+'">'+data.nombre_menu+'</td>';
                            });
                            $("#npadre").html(html);
                        }
                    }, complete: function(){
                        $(".dPadre").show();
                    }
                });
            }else{
                $(".dPadre").hide();
            }
            
        });
        
    });


    function floadMenu(){
        
        $('#tbl_menu').dataTable({
            ajax : "developer/Lopersa/loadMenu",
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
                { "orderable": false },//column 4
                { "orderable": false },//column 5
                { "class": "center", "orderable": false },//column 6
                { "orderable": false },//column 7
                { "orderable": false },//column 8
                { "class": "center", "orderable": false }//column 9
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
        var ntxtIcono = $("#ntxtIcono").val();
        var ntxtNombreMenu = $("#ntxtNombreMenu").val();
        var nnivel = $("#nnivel").val();
        var ntxtLink = $("#ntxtLink").val();
        var npadre = $("#npadre").val();
        var nestado = $("#nestado").val();

        if($.trim(ntxtIcono) == ''){
            toastr.error('Por favor, ingrese Icono de Menú.');
            $("#ntxtIcono").focus();

        }else if($.trim(ntxtNombreMenu) == ''){
            toastr.error('Por favor, ingrese Nombre de Menú.');
            $("#ntxtNombreMenu").focus();

        }else if($.trim(nnivel) == ''){
            toastr.error('Por favor, seleccione Nivel de Menú.');
            $("#nnivel").focus();

        }else if($.trim(nnivel) == 2 && $.trim(npadre) == ''){
            toastr.error('Por favor, seleccione Padre de Menú.');
            $("#npadre").focus();

        }else if($.trim(nestado) == ''){
            toastr.error('Por favor, seleccione Estado de Menú.');
            $("#nestado").focus();

        }else{

            $.ajax({
                url : "developer/Lopersa/insertItemMenu",
                type : "POST",
                data : {
                    'icono': ntxtIcono,
                    'nombre_menu' : ntxtNombreMenu,
                    'nivel': nnivel,
                    'link' :  ntxtLink,
                    'padre' : npadre,
                    'estado' : nestado
                },
                dataType : "JSON",
                success : function (json){
                    if(json.success == true){
                        toastr.success("Item agregado exitosamente");
                        $("#frmNuevo")[0].reset();
                        
                        $("#dPadre").hide();
                        $("#mNuevo").modal('hide');
                        $('#tbl_menu').DataTable().ajax.reload();

                        reloadmenu();
                    }else{
                        toastr.error(json.mensaje);
                    }
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
                        $('#tbl_menu').DataTable().ajax.reload();

                        reloadmenu();
                       
                    }else{
                        toastr.error(json.mensaje);
                    }
                }
            });
        }

    }

    function buscar(){
        var nombre_menu = $("#bNombremenu").val();
        var nivel = $("#bNivel").val();
        var padre = $("#bPadre").val();

        var url = "developer/Lopersa/buscarMenu?nombre_menu="+nombre_menu+"&nivel="+nivel+"&padre="+padre;
        $('#tbl_menu').DataTable().ajax.url( url ).load();

    }


    $("#frmBusqueda").submit(function( event ) {
        event.preventDefault();
        buscar();
    })

</script>

