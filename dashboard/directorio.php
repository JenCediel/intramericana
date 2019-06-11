<?php

include 'developer/security.php';
?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Directorio <small></small>
        </h1>
    </div>

    <!-- comienza contenido -->
    <div class="col-md-12">


        <div class="panel panel-default">
            <div class="panel-heading">
                Listado de Empleados
            </div>
            <div class="panel-body">
                <div class="table-responsive-xl">
                    <div class="col-md-12" style="margin-bottom: 21px;">
                        <a style="float:right;" class="btn btn-success" data-toggle="modal" data-target="#mNuevo"><i class="fa fa-plus-square-o"></i> Nuevo Registro</a>
                    </div>
                    <table class="table table-striped table-hover" id="tbl_clientes" style="width:100%">
                        <thead>
                            <tr>
                                <th style="text-align: -moz-center;">No.</th>
                                <th style="text-align: -moz-center;">Foto</th>
                                <th style="text-align: -moz-center;">Area</th>
                                <th style="text-align: -moz-center;">Nombre</th>
                                <th style="text-align: -moz-center;">Cargo</th>
                                <th style="text-align: -moz-center;">Correo</th>
                                <th style="text-align: -moz-center;">Extension</th>
                                <th style="text-align: -moz-center;">Acciones</th>
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

    <div class="modal fade" id="mNuevo" tabindex="-1" role="dialog" aria-labelledby="mNuevo" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><strong>Nuevo Registro Direcotrio</strong></h4>
                </div>
                <div class="modal-body">
                    <!-- BEGIN FORM-->
                    <form id="frmNuevo" method="POST" class="form-horizontal">
                        <div class="form-body row">
                            <div class="form-group">
                                <label class="control-label col-md-4">Nombre Completo
                                    <span class="required">
                                        *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="ntxtNombre" id="ntxtNombre" class="form-control" required="true" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Correo Institucional
                                    <span class="required">
                                        *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="email" name="ntxtcorreo" id="ntxtcorreo" class="form-control" required="true" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Contraseña
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="password" name="ntxtContra" id="ntxtContra" class="form-control"  required="true" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Cargo
                                    <span class="required">
                                        *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="ntxtCargo" id="ntxtCargo" class="form-control" required="true" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4">Extension
                                    <span class="required">
                                        *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="ntxtExtension" id="ntxtExtension" class="form-control" required="true" />
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-4">Area
                                    <span class="required">
                                        *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <select id="nTxtArea" name="nTxtArea" class="form-control">
                                        <option value="" disabled selected>Seleccione</option>
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

    <div class="modal fade" id="mEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><strong>Editar Usuario</strong></h4>
                </div>
                <div class="modal-body">
                    <!-- BEGIN FORM-->
                    <form id="frmEditar" method="POST" class="form-horizontal">
                        <div class="form-body row">
                            <div style="display:none;">
                                <input type="text" name="txtcodigo" id="txtcodigo" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Nombre Completo
                                    <span class="required">
                                        *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="txtNombre" id="txtNombre" class="form-control" required="true" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Correo Institucional
                                    <span class="required">
                                        *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="email" name="txtcorreo" id="txtcorreo" class="form-control" required="true" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Cargo
                                    <span class="required">
                                        *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="txtCargo" id="txtCargo" class="form-control" required="true" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4">Extension
                                    <span class="required">
                                        *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="txtExtension" id="txtExtension" class="form-control" required="true" />
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-4">Area
                                    <span class="required">
                                        *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <select id="nTxtArea2" name="nTxtArea2" class="form-control">
                                        <option value="" disabled selected>Seleccione</option>
                                    </select>
                                </div>
                            </div>


                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="fEditarItem()">Guardar cambios</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FIN MODALS -->

<script>
    $(document).ready(function() {
        floadFuncionario();
        loadAreas(6);
        loadAreas(7);
        loadAreas(10);
        loadAreas(11);


        $.ajax({
            url: "developer/Lopersa/loadPerfilesS",
            type: "POST",
            data: {},
            dataType: "JSON",
            success: function(json) {
                if (json.success == true) {
                    html = '<option value="" disabled selected> Seleccione</option>'; //
                    $.each(json.perfiles, function(key, data) {
                        html += '<option value="' + data.codigo_perfil + '">' + data.nombre_perfil + '</td>';
                    });
                    $("#nPerfil").html(html);
                }
            },
            complete: function() {}
        });

        $('#estado').change(function() {
            var est = $('#estado').val();
            var url = "developer/Lopersa/loadFuncionario?estado=" + est;
            var cb = function() {
                $('.tooltips').tooltip()
            };
            $('#tbl_clientes').DataTable().ajax.url(url).load(cb);
        });
    });

    function loadAreas(codigo) {
        var jsonData = {
            "codnivel": codigo
        };

        $.ajax({
            url: "developer/Lopersa/loadAreasxNivel",
            type: "POST",
            data: jsonData,
            dataType: "JSON",
            success: function(json) {
                if (json.success == true) {
                    html = '<option value="" selected>Seleccione</option>'; //
                    $.each(json.area, function(key, data) {
                        html += '<option value="' + data.codigo + '">' + data.area + '</td>';
                    });
                    switch (codigo) {
                        case 6:
                            $("#nivPreTec").html(html);
                            break;
                        case 7:
                            $("#nivPreTecno").html(html);
                            break;
                        case 10:
                            $("#nivPrePro").html(html);
                            break;
                        case 11:
                            $("#nivPos").html(html);
                            break;
                    }
                }
            }
        });

    }


    function floadFuncionario() {
        $('#tbl_clientes').dataTable({
            ajax: "developer/Lopersa/loadFuncionario?estado=",
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
                "sSearch": "buscar: ",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
            },
            columnDefs: [{
                targets: -1,
                className: 'dt-body-center'
            }]
        });


    }

    function fmodalEditar(area, nombre, cargo, correo, extension, codigo) {
        $("#txtNombre").val(nombre);
        $("#txtCargo").val(cargo);
        $("#txtExtension").val(extension);
        $("#TxtArea").val(area);
        $("#txtcorreo").val(correo);
        $("#txtcodigo").val(codigo);
        $("#mEditar").modal('show');
    }

    function feditEstado(cod, est) {
        var palabreo;
        if (est == 'off') {
            palabreo = "¿Está seguro de Inhabilitar este Usuario?";
        } else {
            palabreo = "¿Está seguro de Habilitar este Usuario?";
        }
        bootbox.confirm(palabreo, function(result) {
            if (result) {
                $('.desactivarC').fadeIn(500);
                $.ajax({
                        url: "developer/code.php?case=editEstadoFuncionario",
                        type: "POST",
                        data: {
                            codusuario: cod,
                            estado: est
                        }
                    })
                    .done(function(data) {
                        if (data.success == true) {
                            var cb = function() {
                                $('.tooltips').tooltip()
                            };
                            $('#tbl_clientes').DataTable().ajax.reload(cb);
                            $('.desactivarC').fadeOut(500);
                            toastr.success("Acción realizada exitosamente", "Maestro de Usuarios");
                        } else {
                            toastr.error("Request failed: " + data.mensaje);
                        }
                    })
                    .fail(function(jqXHR, textStatus) {
                        $('.desactivarC').fadeOut(500);
                        toastr.error("Request failed: " + jqXHR.responseText);
                    });
            }
        });
    }


    function fNuevoItem() {
        var ntxtNombre = $("#ntxtNombre").val();
        var ntxtCargo = $("#ntxtCargo").val();
        var ntxtExtension = $("#ntxtExtension").val();
        var nTxtArea = $("#nTxtArea").val();
        var nTxtCorreo = $("#ntxtcorreo").val();
        var ntxtContra = $("#ntxtContra").val();
     
        console.log(nTxtCorreo)


        if ($.trim(ntxtNombre) == '') {
            toastr.error('Por favor, ingrese Nombre Completo.');
            $("#ntxtNombre").focus();

        } else if ($.trim(ntxtCargo) == '') {
            toastr.error('Por favor, ingrese Cargo');
            $("#ntxtCargo").focus();

        } else if ($.trim(ntxtExtension) == '') {
            toastr.error('Por favor, ingrese Extension.');
            $("#ntxtExtension").focus();

        } else {

            $.ajax({
                url: "developer/Lopersa/insertarfuncionario",
                type: "POST",
                data: {
                    'usuario': ntxtNombre,
                    'cargo': ntxtCargo,
                    'extension': ntxtExtension,
                    'area': nTxtArea,
                    'Correo': nTxtCorreo,
                    'contra': ntxtContra
                },
                dataType: "JSON",
                success: function(json) {
                    if (json.success == true) {
                        toastr.success("Item agregado exitosamente");
                        $("#frmNuevo")[0].reset();
                        $("#mNuevo").modal('hide');
                        $('#tbl_clientes').DataTable().ajax.reload();

                    } else {
                        toastr.error(json.mensaje);
                    }
                }
            });
        }

    }

    function fEditarItem() {
        var ntxtNombre = $("#txtNombre").val();
        var ntxtCargo = $("#txtCargo").val();
        var ntxtExtension = $("#txtExtension").val();
        var nTxtArea = $("#nTxtArea2").val();
        var nTxtCorreo = $("#txtcorreo").val();
        var nTxtcodigo = $("#txtcodigo").val();
        

        if ($.trim(txtNombre) == '') {
            toastr.error('Por favor, ingrese Nombre.');
            $("#EtxtNombre").focus();

        } else {
            $('.desactivarC').fadeIn(500);
            $.ajax({
                url: "developer/Lopersa/editModalFuncionario",
                type: "POST",
                data: {
                    'usuario': ntxtNombre,
                    'cargo': ntxtCargo,
                    'extension': ntxtExtension,
                    'area': nTxtArea,
                    'Correo': nTxtCorreo,
                    'codigo': nTxtcodigo
                },
                dataType: "JSON",
                success: function(json) {
                    if (json.success == true) {
                        toastr.success("Item Actualizado exitosamente");
                        $("#frmEditar")[0].reset();

                        // $("#dPadre").hide();
                        $("#mEditar").modal('hide');
                        $('#tbl_clientes').DataTable().ajax.reload();

                    } else {
                        toastr.error(json.mensaje);
                    }
                },
                complete: function() {
                    $('.desactivarC').fadeOut(500);
                }
            });
        }

    }


    $("#frmBusqueda").submit(function(event) {
        event.preventDefault();
    });


    //Select nuevo
    $.ajax({
        url: 'developer/Lopersa/selectAreas',
        method: 'POST',
        success: function(res) {
            $.each(res, function(key, value) {
                $('#nTxtArea').append('<option value="' + value.codigo + '">' + value.nombre + '</option>'); +
                $('#nTxtArea2').append('<option value="' + value.codigo + '">' + value.nombre + '</option>');
            });
        }
    });
</script>