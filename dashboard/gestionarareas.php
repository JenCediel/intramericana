<?php
include 'developer/security.php';
?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Gestionar Áreas <small></small>
        </h1>
    </div>

    <style>
        .azul,
        .azul:hover {
            background: #225081;
            border: medium none;
            color: #fff;
        }

        .rojo,
        .rojo:hover {
            background: rgb(217, 83, 79);
            border: medium none;
            color: #fff;
        }
    </style>

    <!-- comienza contenido -->
    <div class="col-md-12">

        <form id="frmBusqueda" role="form" style="display: none">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Búsqueda
                </div>
                <div class="panel-body">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Nombre area: </label>
                            <input class="form-control" id="bNombrearea" name="bNombrearea" />
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label style="width:100%">Acciones</label>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-default azul " onclick="buscar();"><i class="fa fa-search"></i> Buscar</button>
                                <button type="button" class="btn btn-default rojo tooltips" data-rel="tooltip" data-placement="bottom" title="Limpiar búsqueda" onclick="$('#tbl').DataTable().ajax.url('developer/Lopersa/loadAreas').load(); $('#bNombrearea').val('');$('#bNivel').val(''); "><i class="fa fa-trash-o"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="panel panel-default">
            <div class="panel-heading">
                Listado de áreas
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <a style="float:right;" class="btn btn-success" data-toggle="modal" data-target="#mNuevo"><i class="fa fa-plus-square-o"></i> Nueva área</a>
                    <table class="table table-bordered table-hover" id="tbl">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nombre área</th>
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
                                <input type="hidden" name="txtCod" id="txtCod" />
                                <label class="control-label col-md-4">Nombre Área
                                    <span class="required">
                                        *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="txtNombreArea" id="txtNombreArea" class="form-control" required="true" />
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
                                    </select>
                                </div>
                            </div>
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
                    <h4 class="modal-title"><strong>Nueva Área</strong></h4>
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
                                    <input type="text" name="ntxtNombre" id="ntxtNombre" class="form-control" required="true" />
                                </div>
                            </div>

                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="fNuevoItem();"><span class="fa fa-save"></span> Guardar item</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- FIN MODALS -->
</div>



<script>
    $(document).ready(function() {

        fload();
        floadEstado(2);

    });

    function floadEstado(codparametro) {
        $.ajax({
            url: "developer/Lopersa/floadEstado",
            type: "POST",
            data: {
                'codparametro': codparametro
            },
            dataType: "JSON",
            success: function(json) {
                html = '<option value="" selected disabled>Seleccione</option>';
                $.each(json.select, function(key, data) {
                    html += '<option value="' + data.codigo + '">' + data.nombre + '</td>';
                });
                $("#estado").html(html);
            }
        });
    }


    function fload() {

        $('#tbl').dataTable({
            ajax: "developer/Lopersa/loadAreas",
            "aoColumnDefs": [{
                "aTargets": [0]
            }],
            "oLanguage": {
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "No hay Datos registrados en el sistema",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _END_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sLoadingRecords": "Cargando Datos...",
                "sSearch": "",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
            },
            "searching": true,
            "aaSorting": [
                [0, 'desc']
            ],
            "aLengthMenu": [
                [10, 15, 20, -1],
                [10, 15, 20, "Todos"] // change per page values here
            ],
            "columns": [ //agregar configuraciones a cada una de las columnas de las tablas
                {}, //column 1
                {
                    "class": "center",
                    "orderable": false
                }, //column 2
                {
                    "orderable": false
                }, //column 3
                {
                    "class": "center",
                    "orderable": false
                }, //column 4

            ],
            initComplete: function(oSettings, json) {
                $('[data-rel="tooltip"]').tooltip();
            },
            "iDisplayLength": 10
        });

    }


    function fmodalEditar(cod, nombre, estado, nivel) {
        $("#txtCod").val(cod);
        $("#txtNombreArea").val(nombre);
        $("#estado").val(estado);
        $("#mEditar").modal('show');
    }

    function fmodalNuevo() {
        $("#mNuevo").modal('show');
    }

    function fNuevoItem() {
        var ntxtNombre = $("#ntxtNombre").val();

        if ($.trim(ntxtNombre) == '') {
            toastr.error('Por favor, ingrese el nombre de Área.');
            $("#ntxtNombre").focus();

        } else {

            $.ajax({
                url: "developer/Lopersa/insertItemArea",
                type: "POST",
                data: {
                    'nombre_area': ntxtNombre,
                },
                dataType: "JSON",
                success: function(json) {
                    if (json.success == true) {
                        toastr.success("Item agregado exitosamente");
                        $("#frmNuevo")[0].reset();

                        $("#mNuevo").modal('hide');
                        $('#tbl').DataTable().ajax.reload();

                        reloadmenu();
                    } else {
                        toastr.error(json.mensaje);
                    }
                }
            });
        }

    }

    function fEditarItem() {
        var txtCod = $("#txtCod").val();
        var txtNombreArea = $("#txtNombreArea").val();
        var estado = $("#estado").val();

        if ($.trim(txtNombreArea) == '') {
            toastr.error('Por favor, ingrese Nombre del Área.');
            $("#txtNombreArea").focus();

        } else if ($.trim(estado) == '') {
            toastr.error('Por favor, seleccione Estado de Menú.');
            $("#estado").focus();

        } else {

            $.ajax({
                url: "developer/Lopersa/editItemArea",
                type: "POST",
                data: {
                    'codarea': txtCod,
                    'nombre_area': txtNombreArea,
                    'estado_area': estado
                },
                dataType: "JSON",
                success: function(json) {
                    if (json.success == true) {
                        toastr.success("Item Actualizado exitosamente");
                        $("#frmEditar")[0].reset();

                        // $("#dPadre").hide();
                        $("#mEditar").modal('hide');
                        $('#tbl').DataTable().ajax.reload();

                        reloadmenu();

                    } else {
                        toastr.error(json.mensaje);
                    }
                }
            });
        }

    }

    function buscar() {
        var nombre_menu = $("#bNombrearea").val();
        var nivel = $("#bNivel").val();

        var url = "developer/Lopersa/buscarArea?nombre_area=" + nombre_menu + "&nivel_area=" + nivel;
        $('#tbl').DataTable().ajax.url(url).load();

    }


    $("#frmBusqueda").submit(function(event) {
        event.preventDefault();
        buscar();
    })
</script>