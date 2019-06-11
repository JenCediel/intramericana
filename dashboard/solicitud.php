
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Solicitud de Paz y Salvo | Corporación Universitaria Americana</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- TOAST STYLE -->
    <link href="assets/css/toastr.min.css" rel="stylesheet" />

    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    <!-- TOAST SCRIPTS -->
    <script src="assets/js/toastr.min.js"></script>

   <style>
        /*
 * Specific styles of signin component
 */
/*
 * General styles
 */
body, html {
    height: 100%;
    background: url(assets/img/background-soporte.jpg) no-repeat center center fixed; 
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}

.card-container.card {
    max-width: 750px;
    padding: 40px 40px;
}

.btn {
    font-weight: 700;
    height: 36px;
    -moz-user-select: none;
    -webkit-user-select: none;
    user-select: none;
    cursor: default;
}

/*
 * Card component
 */
.card {
    background-color: #F7F7F7;
    /* just in case there no content*/
    padding: 20px 25px 30px;
    margin: 0 auto 25px;
    margin-top: 50px;
    /* shadows and rounded borders */
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}

.profile-img-card {
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}

/*
 * Form styles
 */
.profile-name-card {
    font-size: 16px;
    font-weight: bold;
    text-align: center;
    margin: 10px 0 0;
    min-height: 1em;
}

.reauth-email {
    display: block;
    color: #404040;
    line-height: 2;
    margin-bottom: 10px;
    font-size: 14px;
    text-align: center;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.form-signin #inputEmail,
.form-signin #inputPassword {
    direction: ltr;
    height: 44px;
    font-size: 16px;
}

.form-signin input[type=email],
.form-signin input[type=password],
.form-signin input[type=text],
.form-signin button {
    width: 100%;
    display: block;
    margin-bottom: 10px;
    z-index: 1;
    position: relative;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.form-signin .form-control:focus {
    border-color: rgb(104, 145, 162);
    outline: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
}

.btn.btn-signin {
    /*background-color: #4d90fe; */
    background-color: #09192A;
    /* background-color: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));*/
    padding: 0px;
    font-weight: 700;
    font-size: 14px;
    height: 36px;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    border: none;
    -o-transition: all 0.218s;
    -moz-transition: all 0.218s;
    -webkit-transition: all 0.218s;
    transition: all 0.218s;
}

.btn.btn-signin:hover,
.btn.btn-signin:active,
.btn.btn-signin:focus {
    background-color: rgb(9, 25, 42,0.6);
}

.forgot-password {
    color: rgb(0, 78, 147);;
}

.forgot-password:hover,
.forgot-password:active,
.forgot-password:focus{
    color: #09192A;
}
   </style>
</head>
<body>

    <div class="container">
         
        <div class="card card-container">
            <div id="dform">
              <center>
                <p id="profile-name" class="profile-name-card" style='color:#0C509F;'>Solicita aquí tu certificado de Paz y Salvo para grado</p>
                 <img id="profile-img" style="width: 40%" src="assets/img/logo2.png" />
                    <form class="form-signin" id="frm" style="width: 50%">
                        <span id="reauth-email" class="reauth-email"></span>
                        <input id="txtID" name="txtID" type="text" class="form-control" placeholder="Digite su identificaci&oacute;n" required autofocus>
                        <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" >Verificar</button>
                    </form><!-- /form -->    
                </center>
            </div>


            <div id="dinfo" style="display: none;">
               <center><img id="profile-img" style="width: 40%" src="assets/img/logo2.png" /></center>
               <input type="hidden" id="cantNiveles" name="cantNiveles" />
                <p id="profile-name" class="profile-name-card" style='color:#0C509F;'>VERIFICA TUS DATOS</p>
                 <form class="form-signin" id="dfrm">
                    
                    

                     <div class="form-body row">
                            <div class="form-group">
                                <div class="col-md-6">
                                   <label>Identificación<span class="required">*</span></label>
                                   <input id="dtxtID" name="dtxtID" type="text" class="form-control" readonly />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                   <label>Nombre<span class="required">*</span></label>
                                   <input id="dtxtNombre" name="dtxtNombre" type="text" class="form-control" readonly />
                                </div>
                            </div>
                      </div>

                      <div class="form-body row">
                            <div class="form-group">
                                <div class="col-md-6">
                                   <label>Apellido<span class="required">*</span></label>
                                   <input id="dtxtApellido" name="dtxtApellido" type="text" class="form-control" readonly />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                   <label>Dirección<span class="required">*</span></label>
                                   <input id="dtxtDireccion" name="dtxtDireccion" type="text" class="form-control"  />
                                </div>
                            </div>
                      </div>

                      <div class="form-body row">
                            <div class="form-group">
                                <div class="col-md-6">
                                   <label>Teléfono</label>
                                   <input id="dtxtTelefono" name="dtxtTelefono" type="text" class="form-control"  />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                   <label>Celular<span class="required">*</span></label>
                                   <input id="dtxtCelular" name="dtxtCelular" type="text" class="form-control"  />
                                </div>
                            </div>
                      </div>

                      <div class="form-body row">
                            <div class="form-group">
                                <div class="col-md-6">
                                   <label>Correo electrónico<span class="required">*</span></label>
                                   <input id="dtxtEmail" name="dtxtEmail" type="text" class="form-control"  />
                                </div>
                            </div>

                      </div>

                      <div class="form-body row">
                            <div class="form-group">
                                <div class="col-md-6">
                                   <label>Solicitud de Grado para<span class="required">*</span></label>
                                   <div id="solicitud"></div>
                                </div>
                                <div class="col-md-6">
                                   <label>Es OBLIGATORIO diligenciar las encuestas en cada nivel de grado solicitado, así NO tendrás ningún tipo de inconvenientes con el área de Egresados.<span class="required">*</span></label>
                                   <div id="links"></div>
                                </div>
                            </div>
                      </div>


                    <p id="profile-name" style="font-size: 10pt">Te invitamos a verificar y/o <a target="_blank" href="http://aplicaciones.americana.edu.co:9090/portaldeusuarios/sinubq"><b>actualizar tus datos</b></a>, para ello, ingresa a <a target="_blank" href="http://aplicaciones.americana.edu.co:9090/portaldeusuarios/sinubq"><b>SINÚ</b></a>.<br/> Si todo anda bien, solicita tu <b>Paz y Salvo aquí <span class="fa fa-hand-o-down"></span></b></p>
                    <button class="btn btn-lg btn-success btn-block btn-signin" type="submit" >Solicitar Paz y Salvo</button>
                    <a class="btn btn-warning btn-block" onclick="back()" >Realizar otro proceso de Paz y Salvo</a>
                </form><!-- /form -->   
            </div>
        </div><!-- /card-container -->

        <div class="modal fade" id="mSee" tabindex="-1" role="dialog" aria-labelledby="mSee" aria-hidden="true" >
        <div class="modal-dialog" style="width: 50%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><strong>Listado de áreas</strong></h4>
                </div>
                <div class="modal-body">
                    <!-- BEGIN FORM-->
                    <h5>
                        <!-- Solicitud No: <label id="lblSolicitud"></label><br/> --> Nivel de estudio: <label id="lblNivelEstudio"></label>
                    </h5>
                    
                    <div class="table-responsive">
                    
                    <table class="table table-bordered table-hover" id="tbl_detalle">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Área</th>
                                <th>Usuario</th>
                                <!--<th>Fecha</th>-->
                                <th>Estado</th>
                                <th>Novedad</th>
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

    <div class="modal fade" id="mNovedad" tabindex="-1" role="dialog" aria-labelledby="mNovedad" aria-hidden="true" >
        <div class="modal-dialog" style="width: 50%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><strong>Registro de novedades</strong></h4>
                    <span class="required">*</span><i>Recuerde ser respetuoso y amable al momento de responder una novedad.</i><br/>
                    <span class="required">*</span><i>Ud podrá adjuntar evidencias y/o soportes una vez haya realizado la novedad.</i><br/>
                    <span class="required">*</span><i>Las novedades serán respondidas en las siguientes jornadas laborales:
                        <ul>
                            <li>Lunes a viernes-> 8:00am a 12m y 2:00pm a 6:00pm</li>
                            <li>Sábados-> 8:00am a 12m</li>
                        </ul>
                    </i>
                    <input type="hidden" name="codDetalle" id="codDetalle"   />
                </div>
                <div class="modal-body">
                    <!-- BEGIN FORM-->
                    <h5>
                        Nivel de estudio: <label id="lblNivelEstudioNov"></label><br/>
                        Área de novedad: <label id="lblAreaNov"></label>
                    </h5>
                    
                    <div class="table-responsive">
                    
                        <table class="table table-bordered table-hover" id="tbl_novedad">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <!--<th>Fecha registro</th>-->
                                    <th>Usuario</th>
                                    <th>Respuesta</th>
                                    <th>Evidencias</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                     <label class="control-label col-md-4">Comentario:</label>
                    <textarea id="reportarnovedad" class="form-control" rows="2" cols="10"></textarea>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="guardarNovedad()">Registrar novedad</button>
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
                    <p>
                        <b>Documentos requeridos:</b><br />
                        Envié escaneado en formato .pdf, .jpg, .png los siguientes documentos:
                    </p>
                    <ul>
                        <li>Documento de Identidad ampliado al 150%.</li>
                        <li>Resultado de las pruebas Saber Pro o certificado de asistencia.</li>
                        <li>Estudiantes de Derecho, fotocopia de la carta de aprobación de Judicatura</li>
                        <li>Si realizo trabajo de Grado, fotocopia de la aprobación del trabajo de Grado</li>
                    </ul>
                </div>
                <div class="modal-body">
                    <!-- BEGIN FORM-->
                    <h5>
                        Nivel de estudio: <label id="lblNivelEstudioUp"></label>
                    </h5>
                    
                    <div class="table-responsive">
                    
                    <table class="table table-bordered" id="tbl_upload">
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
                        <input type="file" id="upload" name="upload"  accept=".pdf|image/*" >
                    </form>
                </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="uploadEvidencia()"><span class="fa fa-upload"></span> Cargar soporte</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="mVolantepgo" tabindex="-1" role="dialog" aria-labelledby="mVolantepgo" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><strong>Descargue el volante de pago del derecho de grado</strong></h4>
                </div>
                <div class="modal-body">
                    <!-- BEGIN FORM-->
                   
                    <input type="checked" name="chkVolante" id="chkVolante" />Aceptar términos
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="descargarvolante()"><span class="fa fa-download"></span> Descargar volante</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="mEgresados" tabindex="-1" role="dialog" aria-labelledby="mEgresados" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><strong>Para tener en cuenta</strong></h4>
                </div>
                <div class="modal-body">
                    <!-- BEGIN FORM-->
                    <h5>
                        Nivel de estudio: <label id="lblNivelEstudioEgresado"></label>
                    </h5>
                    <p>Para que este proceso sea exitoso, ud debe tener en cuenta las siguientes recomendaciones:</p>
                    <p>Teniendo muy claro esto, puede proceder a realizar su encuesta:</p>
                    <div id="respegresado" class="table-responsive">
                        <center><a id="link" class="btn btn-success" target="_blank"></a></center>
                    </div>
                
                </div>
                <div class="modal-footer">
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

    </div><!-- /container -->
    

    <script>
        var Aprograma;
        $("#frm").submit(function( event ) {
            event.preventDefault();
            
            var txtID = $("#txtID").val();

            if($.trim(txtID) == ''){
                toastr.error('Por favor, ingrese su identificación.');
                $("#txtID").focus();
            }else{
                $.ajax({
                    url : "developer/solicitud/verificar",
                    type : "POST",
                    data : {
                        'txtID' : txtID
                    },
                    dataType : "JSON",
                    success : function (json){
                        if(json.success == true){
                            toastr.success(json.mensaje);
                            $("#dinfo").fadeIn(500);
                            $("#dform").hide();
                            $("#dtxtID").val(json.identificacion);
                            $("#dtxtNombre").val(json.nombre);
                            $("#dtxtApellido").val(json.apellido);
                            $("#solicitud").html(json.chk);
                            $("#links").html(json.link_s);
                            Aprograma = json.Arrprograma;
                            //$("#dtxtCantNiveles").val(json.cantNiveles);
                            
                        }else{
                            toastr.error(json.mensaje);
                        }
                    }
                });
            }
        });

        function back(){
             $("#dinfo").hide();
             $("#dform").fadeIn(500);
             $("#txtID").val("");
        }

        $("#dfrm").submit(function( event ) {
            event.preventDefault();
            
            var txtID = $("#txtID").val();
            var txtNombre = $("#dtxtNombre").val();
            var txtApellido = $("#dtxtApellido").val();
            var txtDireccion = $("#dtxtDireccion").val();
            var txtTelefono = $("#dtxtTelefono").val();
            var txtCelular = $("#dtxtCelular").val();
            var txtEmail = $("#dtxtEmail").val();

            if($.trim(txtID) == ''){
                toastr.error('Por favor, ingrese su identificación.');
                $("#txtID").focus();
            }
            else if($.trim(txtNombre) == ''){
                toastr.error('Por favor, ingrese su nombre.');
                $("#txtNombre").focus();
            }
            else if($.trim(txtApellido) == ''){
                toastr.error('Por favor, ingrese su apellido.');
                $("#txtApellido").focus();
            }
            else if($.trim(txtDireccion) == ''){
                toastr.error('Por favor, ingrese su dirección.');
                $("#txtDireccion").focus();
            }
            else if($.trim(txtCelular) == ''){
                toastr.error('Por favor, ingrese su número de celular.');
                $("#txtCelular").focus();
            }
            else if($.trim(txtEmail) == ''){
                toastr.error('Por favor, ingrese su correo electrónico.');
                $("#txtEmail").focus();
            } else if (!$("input[name=solicitud]:checked").val()) {
                 toastr.error('Por favor, seleccione una solicitud de grado.');
            }
            else{
                var k = 0;
                $.ajax({
                    url : "developer/solicitud/solicitar",
                    type : "POST",
                    data : {
                        'txtID' : txtID,
                        'txtNombre' : txtNombre,
                        'txtApellido' : txtApellido,
                        'txtDireccion' : txtDireccion,
                        'txtTelefono' : txtTelefono,
                        'txtCelular' : txtCelular,
                        'txtEmail' : txtEmail
                    },
                    dataType : "JSON",
                    success : function (json){
                        if(json.success == true){

                            $('input[name=solicitud]').each(function () {
                                if (this.checked) {
                                    $.ajax({
                                        url : "developer/solicitud/solicitarGrado",
                                        type : "POST",
                                        data : {
                                            'codestudiante' : json.codestudiante,
                                            'Aprograma': Aprograma, 
                                            'codnivel' : $(this).val()
                                        },
                                        dataType : "JSON",
                                        success : function (json2){

                                            if(json2.success == true){
                                                 toastr.success(json2.mensaje);
                                            }else{
                                                toastr.error(json2.mensaje);
                                            }
                                        }
                                        /*,
                                        complete: function () {
                                            if (k === $("#dtxtCantNiveles").val()) {
                                                 
                                            }
                                        }*/
                                    });
                                }
                                k++;

                            });
                        }else{
                            toastr.error(json.mensaje);
                        }
                    }
                    ,
                    complete: function(){
                        validarSolicitudes(txtID);
                    }
                });
            }
        });

        function validarSolicitudes(txtID){
            $.ajax({
                url : "developer/solicitud/verificar",
                type : "POST",
                data : {
                    'txtID' : txtID
                },
                dataType : "JSON",
                success : function (json){
                    if(json.success == true){
                        toastr.success(json.mensaje);
                        $("#dinfo").fadeIn(500);
                        $("#dform").hide();
                        $("#dtxtID").val(json.identificacion);
                        $("#dtxtNombre").val(json.nombre);
                        $("#dtxtApellido").val(json.apellido);
                        $("#solicitud").html(json.chk);
                        $("#links").html(json.link_s);

                        
                    }else{
                        toastr.error(json.mensaje);
                    }
                }
            });
        }

        function fmodalSee(codestudiante, codnivel, nivel){
            $("#mSee").modal('show');
            $("#lblNivelEstudio").html(nivel);
            $("#lblNivelEstudioNov").html(nivel);
            //$('#tbl_novedad tbody').html("");
            var jsonData = {'codestudiante' : codestudiante, 'codnivel' : codnivel};
             $.ajax({
                    url : "developer/solicitud/floadAreasxEstudiantexNivel",
                    type : "POST",
                    data : jsonData,
                    dataType : "JSON",
                    success : function (json2){

                        if(json2.success == true){
                             $('#tbl_detalle tbody').html(json2.table);
                        }else{
                            toastr.error(json2.mensaje);
                        }
                    }
                   
                });
        }

        function fmodalUpload(codestudiante, codnivel, nivel){
            $("#mUpload").modal('show');
            $("#lblNivelEstudioUp").html(nivel);

            $("#lblCodEstudiante").val(codestudiante);
            $("#lblCodnivel").val(codnivel);

            floadSoportes(codestudiante, codnivel);
        }

        function fmodalUploadNovedades(codestudiante, codnivel, nivel, codarea){
            $("#mUploadNnovedades").modal('show');
            $("#lblNivelEstudioUpNovedades").html(nivel);
            $("#lblCodarea").val(codarea);

            floadSoportesNovedades(codestudiante, codnivel, codarea);
        }

        function floadSoportes(codestudiante, codnivel){
            var jsonData = {'codestudiante' : codestudiante, 'codnivel' : codnivel};
             $.ajax({
                url : "developer/solicitud/floadSoporte",
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

        function floadSoportesNovedades(codigo){
            var jsonData = {'codsolicitudNovedad' : codigo};
             $.ajax({
                url : "developer/solicitud/floadSoportesNovedades",
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
                  }).fail( function( jqXHR, textStatus, errorThrown ) {
                        toastr.error("Error al cargar el soporte, por favor modifique el nombre del archivo a cargar.");
                    });
            }
            else
            {
                toastr.error("Error al cargar el soporte, el tamaño supera lo permitido");
            }
        }

        function uploadEvidenciaNovedades(){
            var input = document.getElementById('uploadNovedades');
            var file = input.files[0];
            if(file.size < 4000000)
            {
                var formData = new FormData($("#frm-uploadNovedades")[0]);
                var codsolicitudNovedad = $("#codNovedad").val();

                  $.ajax({
                      url: "developer/solicitud/uploadEvidenciaNovedades?codsolicitudNovedadGet="+codsolicitudNovedad,
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

        function deletee(codigo, codestudiante, codnivel){
            if (confirm('¿Estás seguro de eliminar este soporte?')) {
                 $('#tbl_upload tbody').html("");
                var jsonData = {"codigo": codigo};
                $.ajax({
                        url : "developer/solicitud/deleteSoporte",
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

       function deleteeNovedades(codigo){
            if (confirm('¿Estás seguro de eliminar este soporte?')) {
                 $('#tbl_uploadNovedades tbody').html("");
                var jsonData = {"codigo": codigo};
                $.ajax({
                        url : "developer/solicitud/deleteSoporteNovedad",
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

        function fmodalNovedades(codigo, nombre){
            $("#codDetalle").val(codigo);
            $("#lblAreaNov").html(nombre);
            $("#mNovedad").modal('show');
            $('#tbl_novedad tbody').html("");

            cargarTablaNovedades(codigo);
        }

        function fmodalNovedadesEvidencias(codigo){
            $("#codNovedad").val(codigo);
            $("#mUploadNovedades").modal('show');
            $('#tbl_uploadNovedades tbody').html("");

            floadSoportesNovedades(codigo);
            //cargarTablaNovedadesEvidencias(codigo);
        }

        function cargarTablaNovedades(codigo){
        var jsonData = {"codsolicitudDetalle": codigo};

        $.ajax({
                url : "developer/solicitud/floadNovedades",
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

    /*function cargarTablaNovedadesEvidencias(codigo){
        var jsonData = {"codsolicitudNovedad": codigo};

        $.ajax({
                url : "developer/solicitud/floadNovedadesEvidencia",
                type : "POST",
                data : jsonData,
                dataType : "JSON",
                success : function (json){
                    if(json.success == true){
                       $('#tbl_uploadNovedades tbody').html(json.table);
                    }else{
                        toastr.error(json.mensaje);
                    }
                     

                }
            });
    }*/

    function guardarNovedad(){
       var codsolicitud = $("#codsolicitud").val();
       var codDetalle = $("#codDetalle").val();
       var reportarnovedad = $("#reportarnovedad").val();
       var jsonData = {"codsolicitudDetalle": codDetalle, "reportarnovedad": reportarnovedad};

        $.ajax({
                url : "developer/solicitud/ingresarnovedad",
                type : "POST",
                data : jsonData,
                dataType : "JSON",
                success : function (json){
                    if(json.success == true){
                        toastr.success(json.mensaje);
                        cargarTablaNovedades(codDetalle);
                        floadDetalle(codsolicitud);
                        $("#reportarnovedad").val("");
                    }else{
                        toastr.error(json.mensaje);
                    }
                     

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

    function fmodalVolantepago(codestudiante, codnivel){
        $("#mVolantepgo").modal('show');
    }

    function descargarvolante(){
         var codestudiante = $("#lblCodEstudiante").val();
         var codnivel = $("#lblCodnivel").val();
         var ecaes =  $("#ecaes").val();
         var jsonData = {'codestudiante' : codestudiante, 'codnivel' : codnivel, 'ecaes': ecaes};
         $.ajax({
            url : "developer/solicitud/guardarEcaes",
            type : "POST",
            data : jsonData,
            dataType : "JSON",
            success : function (json2){

                if(json2.success == true){
                     toastr.success(json2.mensaje);
                }else{
                    toastr.error(json2.mensaje);
                }
            }
           
        });
    }

    function fmodalEgresados(codestudiante, codnivel, codarea, nombre, nivel, link){
        $("#mEgresados").modal('show');
        $("#lblNivelEstudioEgresado").html(nivel);
        $("#link").attr("href",link);
        var text = "Ir a " + nombre;
        $("#link").text(text);
        var onclick = "egresados('"+codestudiante+"','"+codnivel+"','"+codarea+"','"+nombre+"')";
        $("#link").attr("onclick",onclick);

    }

    function egresados(codestudiante, codnivel, codarea, link){
        var jsonData = {'codestudiante' : codestudiante, 'codnivel' : codnivel, 'codarea' : codarea, 'link' : link};
         $.ajax({
                url : "developer/solicitud/insertegresados",
                type : "POST",
                data : jsonData,
                dataType : "JSON",
                success : function (json2){
                    console.log("Ok");
                }
               
            });
    }

    </script>
    
   
</body>
</html>
