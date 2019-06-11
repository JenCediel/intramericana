<?php

    include 'developer/security.php';
?>
<div class="row" >
    <div class="col-md-12">
        <h1 class="page-header">
            Gestionar Solicitudes de Paz y Salvo <small></small>
        </h1>
    </div>

    <style>
        .buttons-excel{
            margin-top: 2px;
            background: green;
            color: white;
            border: none;
            padding: 5px 15px;
            font-size: 16px;
            border-radius: 5px;
            margin-left: 10px;
        }
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
        <input type="hidden" name="codsolicitud" id="codsolicitud">
        <input type="hidden" name="email" id="email"   />
        <input type="hidden" name="nivelestudiante" id="nivelestudiante"   />
        <div class="panel panel-default">
            <div class="panel-heading">
                Listado de Solicitudes
            </div>
            <div class="panel-body table-responsive">
                <div class="">
                    <div style="float:right;margin-left: 10px;">
                        <label style="float: left;margin-right: 10px;margin-top: 4px;"> ID. estudiante: </label>
                        <input class="form-control" id="bNombremenu" name="bNombremenu" onkeyup="doSearch('bNombremenu','tbl_menu')" style="width: 150px" />
                    </div>
                     <div style="float:right;margin-left: 10px;">
                        <label style="float: left;margin-right: 10px;margin-top: 4px;"> Estado </label>
                        <select id="estadoFiltro" onchange="onchange_estado()" class="form-control input-sm" style="float: left;width:150px;"></select>
                    </div>
                    <div style="float:right;margin-left: 10px;">
                        <label style="float: left;margin-right: 10px;margin-top: 4px;"> Proceso </label>
                        <select id="sproceso" onchange="onchange_sproceso()" class="form-control input-sm" style="float: left;width:150px;"></select>
                    </div>
                    <table class="table table-bordered table-hover" id="tbl_menu">
                        <thead>
                            <tr>
                                <!--<th>No.</th>-->
                                <th>Fecha solicitud</th>
                                <th>Solicitud</th>
                                <th>Identificación</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Celular</th>
                                <th>Nivel estudio</th>
                                <th>Programa</th>
                                <th>Estado</th>
                                <th>Total</th>
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

   
    <div class="modal fade" id="mSee" tabindex="-1" role="dialog" aria-labelledby="mSee" aria-hidden="true" >
        <div class="modal-dialog" style="width: 60%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><strong>Certificar Paz y Salvo</strong></h4>
                </div>
                <div class="modal-body">
                    <!-- BEGIN FORM-->
                    <h5>
                        Solicitud No: <label id="lblSolicitud"></label><br/> Estudiante: <label id="lblEstudiante"></label><br/> Nivel de estudio: <label id="lblNivelEstudio"></label>
                    </h5>
                    
                    <div class="table-responsive">
                    
                    <table class="table table-bordered table-hover" id="tbl_detalle">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Área</th>
                                <th>Usuario</th>
                                <th>Fecha</th>
                                <th>Novedades</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="mNovedad" tabindex="-1" role="dialog" aria-labelledby="mSee" aria-hidden="true" >
        <div class="modal-dialog" style="width: 50%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><strong>Registro de novedades</strong></h4>
                    <input type="hidden" name="codDetalle" id="codDetalle"   />
                </div>
                <div class="modal-body">
                    <!-- BEGIN FORM-->
                    <h5>
                        Estudiante: <label id="lblEstudianteNov"></label><br/> Nivel de estudio: <label id="lblNivelEstudioNov"></label><br/>
                        Área de novedad: <label id="lblArea"></label>
                    </h5>
                    
                    <div class="table-responsive">
                    
                        <table class="table table-bordered table-hover" id="tbl_novedad">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Fecha registro</th>
                                    <th>Usuario</th>
                                    <th>Respuesta</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                     <label class="control-label col-md-4">Redacte la novedad</label>
                    <textarea id="reportarnovedad" class="form-control" rows="2" cols="10"></textarea>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="guardarNovedad()">Guardar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

     <div class="modal fade" id="mAprobacion" tabindex="-1" role="dialog" aria-labelledby="mSee" aria-hidden="true" >
        <div class="modal-dialog" style="width: 50%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><strong>Aprobación de Paz y Salvo por área</strong></h4>
                    <input type="hidden" name="codSolicitudDet" id="codSolicitudDet"   />
                </div>
                <div class="modal-body">
                    <!-- BEGIN FORM-->
                    <label >Seleccione el estado para esta área</label>
                    <select id="estado" class="form-control" style="width:50%"></select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="checkoutDet()">Guardar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="mAprobacionGrado" tabindex="-1" role="dialog" aria-labelledby="mSee" aria-hidden="true" >
        <div class="modal-dialog" style="width: 50%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><strong>Aprobación de Paz y Salvo</strong></h4>
                </div>
                <div class="modal-body">
                    <!-- BEGIN FORM-->
                    <label >Seleccione el estado para este Estudiante</label>
                    <select id="estadoGrado" class="form-control" style="width:50%"></select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="checkout()">Guardar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="mUpload" tabindex="-1" role="dialog" aria-labelledby="mUpload" aria-hidden="true" >
        <div class="modal-dialog" style="width: 50%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><strong>Listado de Soportes</strong></h4>
                    <input type="hidden" id="lblCodnivel" name="lblCodnivel">
                    <input type="hidden" id="lblCodEstudiante" name="lblCodEstudiante">
                </div>
                <div class="modal-body">
                    <!-- BEGIN FORM-->
                    <h5>
                        Nivel de estudio: <label id="lblNivelEstudioUp"></label>
                    </h5>
                    
                    <div class="table-responsive">
                    
                    <table class="table table-bordered" id="tbl_upload" style="width: 100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th></th>
                                <th>Nombre</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
                
                <fieldset>
                    <legend>Subir soporte</legend>
                    <form role="form" id="frm-upload">
                        <label class="control-label col-md-4">Seleccione un archivo</label>
                        <input type="file" id="upload" name="upload"  accept="*" >
                    </form>
                </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="uploadEvidencia()"><span class="fa fa-upload"></span> Cargar evidencia</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="mUploadNovedades" tabindex="-1" role="dialog" aria-labelledby="mUploadNovedades" aria-hidden="true" >
        <div class="modal-dialog" style="width: 50%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><strong>Listado de Soportes y/o Evidencias por novedad</strong></h4>
                    <input id="codNovedad" type="hidden" name="codNovedad" />
                </div>
                <div class="modal-body">
                    <!-- BEGIN FORM-->
                    <div class="table-responsive">
                    
                    <table class="table table-bordered" id="tbl_uploadNovedades">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th></th>
                                <th>Nombre</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
                
                <fieldset>
                    <legend>Subir soporte</legend>
                    <form role="form" id="frm-uploadNovedades">
                        <label class="control-label col-md-4">Seleccione un archivo</label>
                        <input type="file" id="uploadNovedades" name="uploadNovedades"  accept=".pdf|image/*" >
                    </form>
                </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="uploadEvidenciaNovedades()"><span class="fa fa-upload"></span> Cargar soporte</button>
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
        floadEstados(1);
        floadProcesos();

    });

    function onchange_estado(){
        var pro = $('#sproceso').val();
        var est = $('#estadoFiltro').val();
        var url = "developer/Lopersa/loadSolicitudes?estadoGet="+est+"&procesoGet="+pro;
        var cb = function (){ $('.tooltips').tooltip() };
        $('#tbl_menu').DataTable().ajax.url( url ).load( cb );
    }

    function onchange_sproceso(){
        var pro = $('#sproceso').val();
        var est = $('#estadoFiltro').val();
        var url = "developer/Lopersa/loadSolicitudes?estadoGet="+est+"&procesoGet="+pro;
        var cb = function (){ $('.tooltips').tooltip() };
        $('#tbl_menu').DataTable().ajax.url( url ).load( cb );
    }
    function fload(){
        
        $('#tbl_menu').dataTable({
            ajax : "developer/Lopersa/loadSolicitudes",
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
            rowCallback:function(row,data)
            {
              
              if(data[8] == "Pendiente")
              {
                $($(row).find("td")[8]).css("background-color","#FFCC4D");
                $($(row).find("td")[8]).css("color","#FFFFFF");
              }
              else if(data[8] == "En trámite"){
                  $($(row).find("td")[8]).css("background-color","#81EAFF");
                  $($(row).find("td")[8]).css("color","#FFFFFF");
              }
              else if(data[8] == "Rechazado"){
                  $($(row).find("td")[8]).css("background-color","#DD2E44");
                  $($(row).find("td")[8]).css("color","#FFFFFF");
              }
              else if(data[8] == "Aceptado"){
                  $($(row).find("td")[8]).css("background-color","#004E93");
                  $($(row).find("td")[8]).css("color","#FFFFFF");
              }
              else if(data[8] == "Apto"){
                  $($(row).find("td")[8]).css("background-color","#77B255");
                  $($(row).find("td")[8]).css("color","#FFFFFF");
              }
            },
            "searching": false,
            "aaSorting" : [[0, 'desc']],
            "aLengthMenu" : [
                [10, 15, 20, -1], 
                [10, 15, 20, "Todos"] // change per page values here
            ],
               dom: 'lBfrtip',
            buttons: [
                'excel'
            ]
            ,
            "columns": [ //agregar configuraciones a cada una de las columnas de las tablas
                //{},//column 1
                { "class": "center", "orderable": false },//column 2
                { "orderable": false },//column 3
                { "orderable": false },//column 4
                { "orderable": false },//column 5
                { "class": "center", "orderable": false },//column 6
                { "class": "center", "orderable": false },//column 7
                { "orderable": false },//column 8
                { "orderable": false },//column 9
                { "orderable": false },//column 10
                { "orderable": false },//column 11
                { "orderable": false }//column 12
               
            ],
            initComplete: function(oSettings, json) {
                $('[data-rel="tooltip"]').tooltip(); 
            },
            "iDisplayLength" : 10
        });

    }

    function floadEstados(codparametro){
        var jsonData = {"codparametro": codparametro};
        $.ajax({
                url : "developer/Lopersa/floadEstado",
                type : "POST",
                data : jsonData,
                dataType : "JSON",
                success : function (json){
                    html = '<option value="" selected disabled>Seleccione...</option>';
                            $.each(json.select, function (key, data) {
                                html += '<option value="'+data.codigo+'">'+data.nombre+'</td>';
                            });
                            $("#estadoFiltro").html(html);
                            $("#estado").html(html);
                            $("#estadoGrado").html(html);
                }
            });
        
    }

    function floadProcesos(){
        $.ajax({
                url : "developer/Lopersa/floadProcesos",
                type : "POST",
                dataType : "JSON",
                success : function (json){
                    html = '<option value="" selected disabled>Seleccione...</option>';
                            $.each(json.select, function (key, data) {
                                html += '<option value="'+data.codigo+'">'+data.nombre+'</td>';
                            });
                            $("#sproceso").html(html);
                }
            });
        
    }

    function floadDetalle(codigo){

        var jsonData = {"codsolicitud": codigo};

        $.ajax({
                url : "developer/Lopersa/loadSolicitudesDetalle",
                type : "POST",
                data : jsonData,
                dataType : "JSON",
                success : function (json){
                    $('#tbl_detalle tbody').html(json.table);
                }
            });
        
    }

    function fmodalSee(cod, codnivel, noestudiante, apestudiante, nivelestudiante){
        $("#codsolicitud").val(cod);
        $("#lblSolicitud").html(cod);
        var nombre = noestudiante + " " + apestudiante;
        $("#lblEstudiante").html(nombre);
        $("#lblNivelEstudio").html(nivelestudiante);

        $("#lblEstudianteNov").html(nombre);
        $("#lblNivelEstudioNov").html(nivelestudiante);

        floadDetalle(cod);
        $("#mSee").modal('show');
    }

    function fmodalAprobacion(codigo, codestado){
         $("#mAprobacion").modal('show');
         $("#estado").val(codestado);
         $("#codSolicitudDet").val(codigo);
         
    }

    function fmodalAprobacionGrado(codigo, codestado, email, nivel){
         $("#mAprobacionGrado").modal('show');
         $("#estadoGrado").val(codestado);
         $("#codsolicitud").val(codigo);
         $("#email").val(email);
         $("#nivelestudiante").val(nivel);
    }

    function checkoutDet(){

         var r = confirm('¿Confirma el cambio de estado para este estudiante, en esta área?');
         if (r == true) {
            var codestado = $("#estado").val();
            var codigo = $("#codSolicitudDet").val();
            var jsonData = {"codsolicitudDet": codigo, "estado_solicitud": codestado};
            var codsolicitud = $("#codsolicitud").val();

        $.ajax({
                url : "developer/Lopersa/checkoutDetalle",
                type : "POST",
                data : jsonData,
                dataType : "JSON",
                success : function (json){
                    if(json.success == true){
                        toastr.success(json.mensaje);
                        floadDetalle(codsolicitud);
                        $('#tbl_menu').DataTable().ajax.reload();
                    }else{
                        toastr.error(json.mensaje);
                    }
                     

                }
            });
         }
    }

    function checkout(){

         var r = confirm('¿Confirma dar el aval final de Paz y Salvo para este estudiante?');
         if (r == true) {
            var codigo = $("#codsolicitud").val();
            var email = $("#email").val();
            var estado = $("#estadoGrado").val();
            var nivelestudiante = $("#nivelestudiante").val();
            var jsonData = {"codsolicitud": codigo, "email_estudiante": email, "estadoGrado": estado, "nivelestudiante": nivelestudiante};

        $.ajax({
                url : "developer/Lopersa/checkout",
                type : "POST",
                data : jsonData,
                dataType : "JSON",
                success : function (json){
                    if(json.success == true){
                        toastr.success(json.mensaje);
                        $('#tbl_menu').DataTable().ajax.reload();
                    }else{
                        toastr.error(json.mensaje);
                    }
                     

                }
            });
         }
    }
    
    function noFound(){
        toastr.error('Ud no tiene permisos para realizar esta acción');
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

    function fmodalNovedades(codigo, nombre){
        $("#codDetalle").val(codigo);
        $("#lblArea").html(nombre);
        $("#mNovedad").modal('show');
        $('#tbl_novedad tbody').html("");

        cargarTablaNovedades(codigo);
    }

    function cargarTablaNovedades(codigo){
        var jsonData = {"codsolicitudDetalle": codigo};

        $.ajax({
                url : "developer/Lopersa/floadNovedades",
                type : "POST",
                data : jsonData,
                dataType : "JSON",
                success : function (json){
                    if(json.success == true){
                       $('#tbl_novedad tbody').html(json.table);
                    }else{
                        toastr.error(json.mensaje);
                    }
                     

                }
            });
    }

    function guardarNovedad(){
       var codsolicitud = $("#codsolicitud").val();
       var codDetalle = $("#codDetalle").val();
       var reportarnovedad = $("#reportarnovedad").val();
       var jsonData = {"codsolicitudDetalle": codDetalle, "reportarnovedad": reportarnovedad};

        $.ajax({
                url : "developer/Lopersa/ingresarnovedad",
                type : "POST",
                data : jsonData,
                dataType : "JSON",
                success : function (json){
                    if(json.success == true){
                        toastr.success(json.mensaje);
                        cargarTablaNovedades(codDetalle);
                        floadDetalle(codsolicitud);
                    }else{
                        toastr.error(json.mensaje);
                    }
                     

                }
            });
 
    }

     function fmodalUpload(codestudiante, codnivel, nivel){
            $("#mUpload").modal('show');
            $("#lblNivelEstudioUp").html(nivel);
            $("#lblNivelEstudioUp").html(nivel);

            $("#lblCodEstudiante").val(codestudiante);
            $("#lblCodnivel").val(codnivel);

            floadSoportes(codestudiante, codnivel);
        }

    function floadSoportes(codestudiante, codnivel){
            var jsonData = {'codestudiante' : codestudiante, 'codnivel' : codnivel};
             $.ajax({
                url : "developer/Lopersa/floadSoporte",
                type : "POST",
                data : jsonData,
                dataType : "JSON",
                success : function (json2){

                    if(json2.success == true){
                         $('#tbl_upload tbody').html(json2.table);
                    }else{
                        toastr.error(json2.mensaje);
                    }
                }
               
            });
        }

        function uploadEvidencia(){
            var input = document.getElementById('upload');
            var file = input.files[0];
            if(file.size < 4000000)
            {
                var formData = new FormData($("#frm-upload")[0]);
                var codestudiante = $("#lblCodEstudiante").val();
                var codnivel = $("#lblCodnivel").val();
                  $.ajax({
                      url: "developer/solicitud/uploadEvidencia?codestudiante="+codestudiante+"&codnivel="+codnivel,
                      type:"POST",
                      data:formData,
                      contentType: false,
                      processData: false,
                      dataType:"JSON",
                      success: function(json){
                        if(json.success==true){

                          toastr.success(json.mensaje);

                          $("#frm-upload")[0].reset();
                          floadSoportes(codestudiante, codnivel);

                        }
                        else{
                            toastr.error(json.mensaje);
                        }
                      }, complete: function(){
                        
                      }
                  });
            }
            else
            {
                toastr.error("Error al cargar el soporte, el tamaño supera lo permitido");
            }
        }

        function deletee(codigo, codestudiante, codnivel){
            if (confirm('¿Estás seguro de eliminar este soporte?')) {
                 $('#tbl_upload tbody').html("");
                var jsonData = {"codigo": codigo};
                $.ajax({
                        url : "developer/Lopersa/deleteSoporte",
                        type : "POST",
                        data : jsonData,
                        dataType : "JSON",
                        success : function (json){
                             if(json.success==true){
                                floadSoportes(codestudiante, codnivel);
                                toastr.success(json.mensaje);
                             }
                            else{
                                toastr.error(json.mensaje);
                            }
                        }
                    });
            }
       }

       function fmodalNovedadesEvidencias(codigo){
            $("#codNovedad").val(codigo);
            $("#mUploadNovedades").modal('show');
            $('#tbl_uploadNovedades tbody').html("");

            floadSoportesNovedades(codigo);
        }

        function floadSoportesNovedades(codigo){
            var jsonData = {'codsolicitudNovedad' : codigo};
             $.ajax({
                url : "developer/Lopersa/floadSoportesNovedades",
                type : "POST",
                data : jsonData,
                dataType : "JSON",
                success : function (json2){

                    if(json2.success == true){
                         $('#tbl_uploadNovedades tbody').html(json2.table);
                    }else{
                        toastr.error(json2.mensaje);
                    }
                }
               
            });
        }

        function uploadEvidenciaNovedades(){
            var input = document.getElementById('uploadNovedades');
            var file = input.files[0];
            if(file.size < 4000000)
            {
                var formData = new FormData($("#frm-uploadNovedades")[0]);
                var codsolicitudNovedad = $("#codNovedad").val();

                  $.ajax({
                      url: "developer/Lopersa/uploadEvidenciaNovedades?codsolicitudNovedadGet="+codsolicitudNovedad,
                      type:"POST",
                      data:formData,
                      contentType: false,
                      processData: false,
                      dataType:"JSON",
                      success: function(json){
                        if(json.success==true){

                          toastr.success(json.mensaje);

                          $("#frm-uploadNovedades")[0].reset();
                          floadSoportesNovedades(codsolicitudNovedad);

                        }
                        else{
                            toastr.error(json.mensaje);
                        }
                      }, complete: function(){
                        
                      }
                  }).fail( function( jqXHR, textStatus, errorThrown ) {
                        toastr.error("Error al cargar el soporte, por favor modifique el nombre del archivo a cargar.");
                    });
            }
            else
            {
                toastr.error("Error al cargar el soporte, el tamaño supera lo permitido");
            }
        }

        function deleteeNovedades(codigo){
            if (confirm('¿Estás seguro de eliminar este soporte?')) {
                 $('#tbl_uploadNovedades tbody').html("");
                var jsonData = {"codigo": codigo};
                $.ajax({
                        url : "developer/Lopersa/deleteSoporteNovedad",
                        type : "POST",
                        data : jsonData,
                        dataType : "JSON",
                        success : function (json){
                             if(json.success==true){
                                floadSoportesNovedades(codigo);
                                toastr.success(json.mensaje);
                             }
                            else{
                                toastr.error(json.mensaje);
                            }
                        }
                    });
            }
       }

</script>

