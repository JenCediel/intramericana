<?php

    include 'developer/security.php';
?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Usuarios <small></small>
        </h1>
    </div>

    <!-- comienza contenido -->
    <div class="col-md-12">

        <!-- <form role="form" id="frmBusqueda">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Búsqueda
                </div>
                <div class="panel-body">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Nombre: </label>
                            <input class="form-control" id="txtNombre" name="txtNombre"a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label></label>
                            <button type="submit" class="btn btn-primary form-control">Buscar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form> -->

        <div class="panel panel-default">
            <div class="panel-heading">
                Listado de Usuarios
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

                    <a style="float:right;" class="btn btn-success" data-toggle="modal" data-target="#mNuevo"><i class="fa fa-plus-square-o"></i> Nuevo Usuario</a>

                    <table class="table table-bordered table-hover" id="tbl_clientes">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Foto</th>
                                <!-- <th>Identificación</th> -->
                                <th>Usuario</th>
                                <th>Nombre</th>
                                <th>Perfil</th>
                                <!-- <th>Teléfono</th> -->
                                <!-- <th>Dirección</th> -->
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
                                <label class="control-label col-md-4">Usuario
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="ntxtUsuario" id="ntxtUsuario" class="form-control"  required="true" />
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
                                <label class="control-label col-md-4">Nombre
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="ntxtNombre" id="ntxtNombre" class="form-control"  required="true" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Perfil
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <select id="nPerfil" name="nPerfil" class="form-control">
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

                            <fieldset>
                                <legend>Áreas</legend>
                                <div class="form-group">
                                <label class="control-label col-md-4">Pregrado Técnico
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <select id="nivPreTec" name="nivPreTec" class="form-control"></select>
                                </div>
                            </div>

                             <div class="form-group">
                                <label class="control-label col-md-4">Pregrado Tecnólogo
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <select id="nivPreTecno" name="nivPreTecno" class="form-control"></select>
                                </div>
                            </div>

                             <div class="form-group">
                                <label class="control-label col-md-4">Pregrado Profesional
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <select id="nivPrePro" name="nivPrePro" class="form-control"></select>
                                </div>
                            </div>

                             <div class="form-group">
                                <label class="control-label col-md-4">Posgrado
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <select id="nivPos" name="nivPos" class="form-control"></select>
                                </div>
                            </div>
                            </fieldset>

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
                            <div class="form-group">
                                <label class="control-label col-md-4">Usuario
                                    <span class="required">
                                         *
                                    </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="hidden" name="txtCodigoUsu" id="txtCodigoUsu" />
                                    <input type="text" name="txtUsuario" id="txtUsuario" class="form-control"  required="true" disabled />
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
        $(document).ready(function () {
            floadClientes();
            loadAreas(6);
            loadAreas(7);
            loadAreas(10);
            loadAreas(11);


            $.ajax({
                url : "developer/Lopersa/loadPerfilesS",
                type : "POST",
                data : {},
                dataType : "JSON",
                success : function (json){
                    if(json.success == true){
                        html = '<option value="" disabled selected>Seleccione</option>';//
                        $.each(json.perfiles, function (key, data) {
                            html += '<option value="'+data.codigo_perfil+'">'+data.nombre_perfil+'</td>';
                        });
                        $("#nPerfil").html(html);
                    }
                }, complete: function(){
                }
            });

            $('#estado').change(function() {
                var est = $('#estado').val();
                var url = "developer/Lopersa/loadUsuarios?estado="+est;
                var cb = function (){ $('.tooltips').tooltip() };
                $('#tbl_clientes').DataTable().ajax.url( url ).load( cb );
            });
        });

         function loadAreas(codigo){
        var jsonData = {"codnivel": codigo};

        $.ajax({
                url : "developer/Lopersa/loadAreasxNivel",
                type : "POST",
                data : jsonData,
                dataType : "JSON",
                success : function (json){
                    if(json.success == true){
                        html = '<option value="" selected>Seleccione</option>';//
                        $.each(json.area, function (key, data) {
                            html += '<option value="'+data.codigo+'">'+data.area+'</td>';
                        });
                        switch(codigo){
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


        function floadClientes(){
            $('#tbl_clientes').dataTable({
                ajax : "developer/Lopersa/loadUsuarios?estado=",
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
                    { "class": "center", "orderable": false },//column 6
                    { "class": "center", "orderable": false }//column 7
                ],
                initComplete: function(oSettings, json) {
                    $('[data-rel="tooltip"]').tooltip(); 
                },
                "iDisplayLength" : 10
            });
        }

        function fmodalEditar(cod, usuario, nombre){
            $("#txtCodigoUsu").val(cod);
            $("#txtUsuario").val(usuario);
            $("#EtxtNombre").val(nombre);
            $("#mEditar").modal('show');
        }

        function feditEstado(cod,est){
            var palabreo;
            if(est == 'off'){
                palabreo = "¿Está seguro de Inhabilitar este Usuario?";
            }else{
                palabreo = "¿Está seguro de Habilitar este Usuario?";   
            }
            bootbox.confirm(palabreo, function(result) {
                if (result) {
                    $('.desactivarC').fadeIn(500);
                    $.ajax({
                        url: "developer/code.php?case=editEstadoCliente",
                        type: "POST",
                        data: {codusuario : cod, estado : est}
                    })
                    .done(function(data) {
                        if(data.success == true){
                            var cb = function (){ $('.tooltips').tooltip() };
                            $('#tbl_clientes').DataTable().ajax.reload(cb);
                            $('.desactivarC').fadeOut(500);
                            toastr.success("Acción realizada exitosamente", "Maestro de Usuarios");
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


        function fNuevoItem(){
            var ntxtUsuario = $("#ntxtUsuario").val();
            var ntxtContra = $("#ntxtContra").val();
            var ntxtNombre = $("#ntxtNombre").val();
            var nPerfil = $("#nPerfil").val();
            var nestado = $("#nestado").val();

            var codareaniveltec = $("#nivPreTec").val();
            var codareaniveltecno = $("#nivPreTecno").val();
            var codareanivelpro = $("#nivPrePro").val();
            var codareanivelpos = $("#nivPos").val();

            if($.trim(ntxtUsuario) == ''){
                toastr.error('Por favor, ingrese Usuario.');
                $("#ntxtUsuario").focus();

            }else if($.trim(ntxtContra) == ''){
                toastr.error('Por favor, ingrese Contraseña.');
                $("#ntxtContra").focus();

            }else if($.trim(ntxtNombre) == ''){
                toastr.error('Por favor, ingrese Nombre.');
                $("#ntxtNombre").focus();

            }else if($.trim(nPerfil) == ''){
                toastr.error('Por favor, seleccione Perfil.');
                $("#nPerfil").focus();

            }else if($.trim(nestado) == ''){
                toastr.error('Por favor, seleccione Estado.');
                $("#nestado").focus();

            }else{

                $.ajax({
                    url : "developer/Lopersa/insertUsuario",
                    type : "POST",
                    data : {
                        'usuario': ntxtUsuario,
                        'pass' : ntxtContra,
                        'nombre': ntxtNombre,
                        'codperfil' :  nPerfil,
                        'estado' : nestado,
                        'codareaniveltec' : codareaniveltec,
                        'codareaniveltecno' : codareaniveltecno,
                        'codareanivelpro' : codareanivelpro,
                        'codareanivelpos' : codareanivelpos
                    },
                    dataType : "JSON",
                    success : function (json){
                        if(json.success == true){
                            toastr.success("Item agregado exitosamente");
                            $("#frmNuevo")[0].reset();
                            $("#mNuevo").modal('hide');
                            $('#tbl_clientes').DataTable().ajax.reload();

                        }else{
                            toastr.error(json.mensaje);
                        }
                    }
                });
            }

        }

        function fEditarItem(){
            var txtCodigo = $("#txtCodigoUsu").val();
            var txtNombre = $("#EtxtNombre").val();

            if($.trim(txtNombre) == ''){
                toastr.error('Por favor, ingrese Nombre.');
                $("#EtxtNombre").focus();

            }else{
                $('.desactivarC').fadeIn(500);
                $.ajax({
                    url : "developer/Lopersa/editModalUsuario",
                    type : "POST",
                    data : {
                        'codusuario':txtCodigo,
                        'nombre' : txtNombre
                    },
                    dataType : "JSON",
                    success : function (json){
                        if(json.success == true){
                            toastr.success("Item Actualizado exitosamente");
                            $("#frmEditar")[0].reset();
                            
                            // $("#dPadre").hide();
                            $("#mEditar").modal('hide');
                            $('#tbl_clientes').DataTable().ajax.reload();
                           
                        }else{
                            toastr.error(json.mensaje);
                        }
                    }, complete: function(){
                        $('.desactivarC').fadeOut(500);
                    }
                });
            }

        }


        $("#frmBusqueda").submit(function(event){
            event.preventDefault();
        });


        

    </script>

