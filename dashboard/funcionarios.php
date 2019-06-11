<?php

    include 'developer/security.php';
?>
<div class="row" >
    <div class="col-md-12">
        <h1 class="page-header">
            Gestionar Docentes y funcionarios <small></small>
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
                    Búsqueda
                </div>
                <div class="panel-body">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Nombre Docente o funcionario: </label>
                            <input class="form-control" id="bNombreSol" name="bNombreSol" />
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label style="width:100%">Acciones</label>
                            <div class="btn-group" role="group" >
                                <button type="button" class="btn btn-default azul " onclick="buscar();"><i class="fa fa-search"></i> Buscar</button>
                                <button type="button" class="btn btn-default rojo tooltips" data-rel="tooltip" data-placement="bottom" title="Limpiar búsqueda" onclick="$('#tbl_docentes_funcionarios').DataTable().ajax.url('developer/Lopersa/loadSolicitantes?estado=').load(); $('#bNombreSol').val(''); "><i class="fa fa-trash-o"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="panel panel-default">
            <div class="panel-heading">
                Listado de Docentes y funcionarios
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
                    <a style="float:right;" class="btn btn-success" data-toggle="modal" data-target="#mNuevo"><i class="fa fa-plus-square-o"></i> Nuevo Docente o Funcionario</a>
                    <table class="table table-bordered table-hover" id="tbl_docentes_funcionarios">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Cédula</th>
                                <th>Nombre y Apellido</th>
                                <th>Teléfono</th>
                                <th>Perfil</th>
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
                    <h4 class="modal-title"><strong>Editar Docentes y funcionarios</strong></h4>
                </div>
                <div class="modal-body">
                    <!-- BEGIN FORM-->
                    <form id="frmEditar" method="POST" class="form-horizontal">
                        <div class="form-body row">
                            <div class="form-group">
                                <label class="control-label col-md-4">Cédula
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="hidden" name="txtCodigoSol" id="txtCodigoSol"/>
                                    <input type="text" name="EtxtCedula" id="EtxtCedula" class="form-control"  required="true" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Nombre
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="EtxtNombre" id="EtxtNombre" class="form-control"  required="true" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Apellido
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="EtxtApellido" id="EtxtApellido" class="form-control"  required="true" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Teléfono
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="EtxtTelefono" id="EtxtTelefono" class="form-control"  required="true" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Perfil
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <select id="EPerfil" name="EPerfil" class="form-control">
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
                    <h4 class="modal-title"><strong>Nueva Docentes y funcionarios </strong></h4>
                </div>
                <div class="modal-body">
                    <!-- BEGIN FORM-->
                    <form id="frmNuevo" method="POST" class="form-horizontal">
                        <div class="form-body row">
                            <div class="form-group">
                                <label class="control-label col-md-4">Cédula
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="NtxtCedula" id="NtxtCedula" class="form-control"  required="true" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Nombre
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="NtxtNombre" id="NtxtNombre" class="form-control"  required="true" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Apellido
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="NtxtApellido" id="NtxtApellido" class="form-control"  required="true" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Teléfono
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="NtxtTelefono" id="NtxtTelefono" class="form-control"  required="true" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Perfil
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <select id="NPerfil" name="NPerfil" class="form-control">
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
        
        floadMenu();
        combobox('EPerfil','developer/Lopersa/loadPerfiles2','Seleccione...');
        combobox('NPerfil','developer/Lopersa/loadPerfiles2','Seleccione...');

        $('#estado').change(function() {
            var est = $('#estado').val();
            $('#tbl_docentes_funcionarios tbody').html('<tr class="odd"><td colspan="7" class="dataTables_empty" valign="top">Cargando datos...</td></tr>');
            var url = "developer/Lopersa/loadSolicitantes?estado="+est;
            var cb = function (){ $('.tooltips').tooltip() };
            $('#tbl_docentes_funcionarios').DataTable().ajax.url( url ).load( cb );
        });

    });


    function floadMenu(){
        
        $('#tbl_docentes_funcionarios').dataTable({
            ajax : "developer/Lopersa/loadSolicitantes?estado=",
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
                { "orderable": false },//column 5
                { "orderable": false },//column 6
                { "class": "center", "orderable": false }//column 7
            ],
            initComplete: function(oSettings, json) {
                $('[data-rel="tooltip"]').tooltip(); 
            },
            "iDisplayLength" : 10
        });

    }
    

    function fmodalEditar(cod, cedula, nombre, apellido, telefono, perfil){
        $("#txtCodigoSol").val(cod);
        $("#EtxtCedula").val(cedula);
        $("#EtxtNombre").val(nombre);
        $("#EtxtApellido").val(apellido);
        $("#EtxtTelefono").val(telefono);
        $("#EPerfil").val(perfil);
        $("#mEditar").modal('show');
    }

    function fmodalNuevo(){
        $("#mNuevo").modal('show');
    }

    function fNuevoItem(){
        var NtxtCedula = $("#NtxtCedula").val();
        var NtxtNombre = $("#NtxtNombre").val();
        var NtxtApellido = $("#NtxtApellido").val();
        var NtxtTelefono = $("#NtxtTelefono").val();
        var NPerfil = $("#NPerfil").val();
        var nestado = $("#nestado").val();

        if($.trim(NtxtCedula) == ''){
            toastr.error('Por favor, ingrese Cédula.');
            $("#NtxtCedula").focus();

        }else if($.trim(NtxtNombre) == ''){
            toastr.error('Por favor, ingrese Nombre.');
            $("#NtxtNombre").focus();

        }else if($.trim(NtxtApellido) == ''){
            toastr.error('Por favor, ingrese Apellido.');
            $("#NtxtApellido").focus();

        }else if($.trim(NtxtTelefono) == ''){
            toastr.error('Por favor, ingrese Teléfono.');
            $("#NtxtTelefono").focus();

        }else if($.trim(NPerfil) == ''){
            toastr.error('Por favor, seleccione Perfil.');
            $("#NPerfil").focus();

        }else if($.trim(nestado) == ''){
            toastr.error('Por favor, seleccione Estado.');
            $("#nestado").focus();

        }else{

            $('.desactivarC').fadeIn(500);
            $.ajax({
                url: "developer/Lopersa/insertItemSolicitantes",
                type: "POST",
                data: {
                    'cedulasol' : NtxtCedula,
                    'nombresol' : NtxtNombre,
                    'apellidosol' : NtxtApellido,
                    'telefonosol' : NtxtTelefono,
                    'estadosol' : nestado,
                    'perfilsol' : NPerfil
                }
            })
            .done(function(data) {
                if(data.success == true){
                    toastr.success("Item agregado exitosamente");
                    $("#frmNuevo")[0].reset();
                    
                    $("#mNuevo").modal('hide');
                    fReload();

                }else{
                    toastr.error(data.mensaje);
                }
                $('.desactivarC').fadeOut(500);
            })
            .fail(function( jqXHR, textStatus ) {
                $("#mNuevo").modal('hide');
                $('.desactivarC').fadeOut(500);
                toastr.error( "Request failed: " + jqXHR.responseText);
            });

        }

    }

    function fEditarItem(){
        var txtCodigoSol = $("#txtCodigoSol").val();
        var EtxtCedula = $("#EtxtCedula").val();
        var EtxtNombre = $("#EtxtNombre").val();
        var EtxtApellido = $("#EtxtApellido").val();
        var EtxtTelefono = $("#EtxtTelefono").val();
        var EPerfil = $("#EPerfil").val();

        if($.trim(EtxtCedula) == ''){
            toastr.error('Por favor, ingrese Cédula.');
            $("#EtxtCedula").focus();

        }else if($.trim(EtxtNombre) == ''){
            toastr.error('Por favor, ingrese Nombre.');
            $("#EtxtNombre").focus();

        }else if($.trim(EtxtApellido) == ''){
            toastr.error('Por favor, ingrese Apellido.');
            $("#EtxtApellido").focus();

        }else if($.trim(EtxtTelefono) == ''){
            toastr.error('Por favor, ingrese Teléfono.');
            $("#EtxtTelefono").focus();

        }else if($.trim(EPerfil) == ''){
            toastr.error('Por favor, seleccione Perfil.');
            $("#EPerfil").focus();

        }else{
            $('.desactivarC').fadeIn(500);
            $.ajax({
                url: "developer/Lopersa/editItemSolicitante",
                type: "POST",
                data: {
                    'codsol':txtCodigoSol,
                    'cedulasol': EtxtCedula,
                    'nombresol': EtxtNombre,
                    'apellidosol' : EtxtApellido,
                    'telefonosol' :  EtxtTelefono,
                    'perfilsol' : EPerfil
                }
            })
            .done(function(data) {
                if(data.success == true){
                    toastr.success("Item Actualizado exitosamente");
                    $("#frmEditar")[0].reset();
                    $("#mEditar").modal('hide');
                    fReload();

                    reloadmenu();
                   
                }else{
                    toastr.error(data.mensaje);
                }
                $('.desactivarC').fadeOut(500);
            })
            .fail(function( jqXHR, textStatus ) {
                $('.desactivarC').fadeOut(500);
                toastr.error( "Request failed: " + jqXHR.responseText);
            });
        }

    }

    function buscar(){
        var nombresol = $("#bNombreSol").val();
        $('#tbl_docentes_funcionarios tbody').html('<tr class="odd"><td colspan="7" class="dataTables_empty" valign="top">Cargando datos...</td></tr>');
        var url = "developer/Lopersa/buscarSol?nombresol="+nombresol;
        $('#tbl_docentes_funcionarios').DataTable().ajax.url( url ).load();
    }

    function feditEstado(cod,est){
        var palabreo;
        if(est == 'off'){
            palabreo = "¿Está seguro de Inhabilitar este Docente o Funcionario?";
        }else{
            palabreo = "¿Está seguro de Habilitar esta Docente o Funcionario?";   
        }
        bootbox.confirm(palabreo, function(result) {
            if (result) {
                $('.desactivarC').fadeIn(500);
                $.ajax({
                    url: "developer/Lopersa/editEstadoSol",
                    type: "POST",
                    data: {codsol : cod, estado : est}
                })
                .done(function(data) {
                    if(data.success == true){
                        fReload();
                        $('.desactivarC').fadeOut(500);
                        toastr.success("Acción realizada exitosamente", "Maestro de Docentes y funcionarios");
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

    function fReload(){
        $('#tbl_docentes_funcionarios tbody').html('<tr class="odd"><td colspan="7" class="dataTables_empty" valign="top">Cargando datos...</td></tr>');
        var cb = function (){ $('.tooltips').tooltip() };
        $('#tbl_docentes_funcionarios').DataTable().ajax.reload(cb);
    }

</script>

