<?php

    include 'developer/security.php';
?>
<div class="row" >
    <div class="col-md-12">
        <h1 class="page-header">
            Gestionar Procesos <small></small>
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

        <form id="frmBusqueda" role="form" style="display: none" >
            <div class="panel panel-default">
                <div class="panel-heading">
                    Búsqueda
                </div>
                <div class="panel-body">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Nombre Proceso: </label>
                            <input class="form-control" id="bNombreProceso" name="bNombreProceso" />
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label style="width:100%">Acciones</label>
                            <div class="btn-group" role="group" >
                                <button type="button" class="btn btn-default azul " onclick="buscar();"><i class="fa fa-search"></i> Buscar</button>
                                <button type="button" class="btn btn-default rojo tooltips" data-rel="tooltip" data-placement="bottom" title="Limpiar búsqueda" onclick="$('#tbl').DataTable().ajax.url('developer/Lopersa/loadProcesos').load(); $('#bNombreProceso').val('');$('#bNivel').val(''); "><i class="fa fa-trash-o"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="panel panel-default">
            <div class="panel-heading">
                Listado de procesos
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <a style="float:right;" class="btn btn-success" data-toggle="modal" data-target="#mNuevo"><i class="fa fa-plus-square-o"></i> Nuevo proceso</a>
                    <table class="table table-bordered table-hover" id="tbl">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Proceso</th>
                                <th>Fecha apertura</th>
                                <th>Fecha cierre</th>
                                <th>Nivel estudio</th>
                                <!--<th>Fecha Registro</th>
                                 <th>Fecha Actualización</th> 
                                <th>Usuario</th>-->
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
                    <h4 class="modal-title"><strong>Editar Proceso</strong></h4>
                </div>
                <div class="modal-body">
                    <!-- BEGIN FORM-->
                    <form id="frmEditar" method="POST" class="form-horizontal">
                        <div class="form-body row">
                           
                            <div class="form-group">
                                 <input type="hidden" name="txtCod" id="txtCod"   />
                                <label class="control-label col-md-4">Nombre proceso
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="txtNombreProceso" id="txtNombreProceso" class="form-control"  required="true" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4">Fecha inicio
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="date" name="txtFechaInicio" id="txtFechaInicio" class="form-control"  required="true" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4">Fecha fin
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="date" name="txtFechaFin" id="txtFechaFin" class="form-control"  required="true" />
                                </div>
                            </div>

                            <div class="form-group">
                            <label class="control-label col-md-4">Nivel
                                <span class="required">
                                         *
                                </span>
                            </label>
                                <div class="col-md-6"> 
                                            <select id="nivelPro2" name="nivelPro2" class="form-control">
                                                
                                            </select>
                                </div>
                            </div> 

                            <!-- <div class="form-group">
                                <label class="control-label col-md-4">Estado
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <select id="estado" name="estado" class="form-control">
                                    </select>
                                </div>
                            </div> -->
                        </div>
                    </form>
                    <!-- END FORM-->
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="fEditarItem();"><span class="fa fa-edit"></span> Guardar cambios</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="mNuevo" tabindex="-1" role="dialog" aria-labelledby="mNuevo" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><strong>Nuevo Proceso</strong></h4>
                </div>
                <div class="modal-body">
                    <!-- BEGIN FORM-->
                    <form id="frmNuevo" method="POST" class="form-horizontal">
                        
                        <div class="form-body row">
                            <div class="form-group">
                                <label class="control-label col-md-4">Nombre proceso
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="ntxtNombreProceso" id="ntxtNombreProceso" class="form-control"  required="true" />
                                </div>
                            </div>   
                        </div>

                        <div class="form-body row">
                            <div class="form-group">
                                <label class="control-label col-md-4">Fecha inicio
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="date" name="ntxtFechaInicio" id="ntxtFechaInicio" class="form-control"  required="true" />
                                </div>
                            </div>   
                        </div>

                        <div class="form-body row">
                            <div class="form-group">
                                <label class="control-label col-md-4">Fecha finalización
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="date" name="ntxtFechaFin" id="ntxtFechaFin" class="form-control"  required="true" />
                                </div>
                            </div>   
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-md-4">Nivel
                                <span class="required">
                                         *
                                </span>
                            </label>
                            <div class="col-md-6"> 
                                        <select id="nivelPro" name="nivelPro" class="form-control">
                                            
                                        </select>
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
        
        fload();
        floadnivel(3);
      
    });

    function floadnivel(codparametro){
        $.ajax({
                url : "developer/Lopersa/floadEstado",
                type : "POST",
                data : {
                    'codparametro': codparametro
                },
                dataType : "JSON",
                success : function (json){
                    html = '<option value="" selected disabled>Seleccione...</option>';
                            $.each(json.select, function (key, data) {
                                html += '<option value="'+data.codigo+'">'+data.nombre+'</td>';
                            });
                        $("#nivelPro").html(html);
                        $("#nivelPro2").html(html);
                }
            });
    }


    function fload(){
        
        $('#tbl').dataTable({
            ajax : "developer/Lopersa/loadProcesos",
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
                /*{ "orderable": false },//column 5
                { "orderable": false },//column 7
                { "orderable": false },//column 8*/
                { "class": "center", "orderable": false }//column 9
                
                  
            ],
            initComplete: function(oSettings, json) {
                $('[data-rel="tooltip"]').tooltip(); 
            },
            "iDisplayLength" : 10
        });

    }
    

    function fmodalEditar(cod, nombre, fechaIni, fechaFin, codNvl){

        $("#txtCod").val(cod);
        $("#txtNombreProceso").val(nombre);
        $("#txtFechaInicio").val(fechaIni);
        $("#txtFechaFin").val(fechaFin);
        $("#nivelPro2").val(codNvl);
        // $("#estado").val(estado);
        $("#mEditar").modal('show');

        document.getElementById("txtFechaInicio").value = fechaIni;
    }

    function fmodalNuevo(){
        $("#mNuevo").modal('show');
    }

    function fNuevoItem(){

        var ntxtNombreProceso = $("#ntxtNombreProceso").val();
        var ntxtFechaInicio = $("#ntxtFechaInicio").val();
        var ntxtFechaFin = $("#ntxtFechaFin").val();
        var ntxtCodNvl = $("#nivelPro").val();

        if($.trim(ntxtNombreProceso) == ''){
            toastr.error('Por favor, ingrese el nombre del proceso.');
            $("#ntxtNombreProceso").focus();
        }else if($.trim(ntxtFechaInicio) == null){
            toastr.error('Por favor, ingrese fecha de inicio.');
            $("#ntxtFechaInicio").focus();
        }else if($.trim(ntxtFechaFin) == null){
            toastr.error('Por favor, ingrese fecha de finalización.');
            $("#ntxtFechaFin").focus();
        }else if($.trim(ntxtCodNvl) == ''){
            toastr.error('Por favor, ingrese el nivel.');
            $("#nivelPro").focus();
        }else{

            $.ajax({
                url : "developer/Lopersa/insertItemProceso",
                type : "POST",
                data : {
                    'nombre_proceso' : ntxtNombreProceso,
                    'fecha_inicio' : ntxtFechaInicio,
                    'fecha_fin' : ntxtFechaFin,
                    'codnivel' : ntxtCodNvl,
                },
                dataType : "JSON",
                success : function (json){
                    if(json.success == true){
                        toastr.success("Item agregado exitosamente");
                        $("#frmNuevo")[0].reset();
                        
                        $("#mNuevo").modal('hide');
                        $('#tbl').DataTable().ajax.reload();

                        reloadmenu();
                    }else{
                        toastr.error(json.mensaje);
                    }
                }
            });
        }

    }

    function fEditarItem(){

        var txtCod = $("#txtCod").val();
        var txtNombreProceso = $("#txtNombreProceso").val();
        var txtFechaInicio = $("#txtFechaInicio").val();
        var txtFechaFin = $("#txtFechaFin").val();
        var txtCodNvl = $("#nivelPro2").val();
        // var estado = $("#estado").val();

        if($.trim(txtNombreProceso) == ''){
            toastr.error('Por favor, ingrese nombre del proceso.');
            $("#txtNombreProceso").focus();
        }else if($.trim(txtFechaInicio) == null){
            toastr.error('Por favor, seleccione fecha de inicio.');
            $("#txtFechaInicio").focus();
        }else if($.trim(txtFechaFin) == null){
            toastr.error('Por favor, seleccione fecha de finalización');
            $("#txtFechaFin").focus();
        }else if($.trim(txtCodNvl) == ''){
            toastr.error('Por favor, seleccione el nivel');
            $("#nivelPro2").focus();
        }else{

            $.ajax({
                url : "developer/Lopersa/editItemProceso",
                type : "POST",
                data : {
                    'cod_proceso':txtCod,
                    'nombre_proceso' : txtNombreProceso,
                    'fecha_inicio' : txtFechaInicio,
                    'fecha_fin' : txtFechaFin,
                    'codnivel' : txtCodNvl,
                },
                dataType : "JSON",
                success : function (json){
                    if(json.success == true){
                        toastr.success("Item Actualizado exitosamente");
                        $("#frmEditar")[0].reset();
                        
                        // $("#dPadre").hide();
                        $("#mEditar").modal('hide');
                        $('#tbl').DataTable().ajax.reload();

                        reloadmenu();
                       
                    }else{
                        toastr.error(json.mensaje);
                    }
                }
            });
        }

    }

    function buscar(){
        var nombre_menu = $("#bNombreProceso").val();
        var nivel = $("#bNivel").val();

        var url = "developer/Lopersa/buscarProceso?nombre_proceso="+nombre_proceso;
        $('#tbl').DataTable().ajax.url( url ).load();

    }


    $("#frmBusqueda").submit(function( event ) {
        event.preventDefault();
        buscar();
    })

</script>

