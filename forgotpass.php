<?php
	include("developer/conexion2.php");
	$params = explode(",", base64_decode($_GET["x"]));
    $email = $params[0];
    $token = trim($params[1]);
?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">
    <head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="SITE KEYWORDS HERE" />
		<meta name="description" content="">
		<meta name='copyright' content=''>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Title -->
		<title>Restablecer contraseña &minus; Intramericana</title>

    	<link rel="stylesheet" href="../assets/css/materialdesignicons.min.css">
    	<link rel="stylesheet" href="../assets/css/style.css">
	    <link rel="shortcut icon" type="image/png" href="../assets/ico/favicon.png"/>
  		<link href="../assets/css/toastr.min.css" rel="stylesheet" />


	    <!-- plugins:js -->
	    <script src="../assets/node_modules/material-components-web/material-components-web.min.js"></script>
	    <script src="../assets/code.jquery.com/jquery-3.3.1.min.js"></script>
	    <script src="../assets/js/misc.js"></script>
	    <script src="../assets/js/material.js"></script>
	    <script src="../assets/js/toastr.min.js"></script>
</html>

    </head>
    <body>	
		<div class="container" style="margin-top: 35px;">
			<div class="section-title" style="justify-content: center;display: flex;">
				<?php

					$html = '';
					
					$select = conectar2("SELECT * FROM usu_usuarios WHERE email = :email_usuario AND remember_tokern = :token");
				    $select->execute(array(':email_usuario' => $email, ':token' => $token));
				    $resultadoUs = $select->fetch();
				    
				    if ($select->rowCount() > 0) {

					    $updateUs = "UPDATE usu_usuarios SET remember_tokern = :remember_tokern WHERE email = :email_usuario";
						$con = conectar2($updateUs);

					    if ($con->execute(array(':email_usuario' => $email, ':remember_tokern' => ''))) {
					  		$html = '<div class="row" style="border: solid 2px #214a81;border-radius: 26px;">
								<div style="float: left">
									<img src="../assets/img/cambiarpass.png" style="height: 175px;margin-top: 20px;">
								</div>
								<form id="fmrpass" method="POST" class="form-horizontal">
									<div class="mdc-layout-grid__inner" style="padding: 40px;">
									
								    <input type="hidden" name="txtEmail" id="txtEmail" value= '.$email.'>
                                                    <!-- contraseña -->
									            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4-desktop">
									              <div class="input-item">
									                <label for="txtContraseña">Contraseña <span class="required">*</span></label>
									              </div>
									            </div>
									            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6-desktop">
									              <div class="input-item">
									                <input type="password" id="txtContraseña" name="txtContraseña">
									              </div>
									            </div>
                                                    <!-- repetir contraseña -->
									            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4-desktop">
									              <div class="input-item">
									                <label for="txtRepContraseña">Repetir Contraseña <span class="required">*</span></label>
									              </div>
									            </div>
									            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6-desktop">
									              <div class="input-item">
									                <input type="password" id="txtRepContraseña" name="txtRepContraseña">
									              </div>
									            </div>
									            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12-desktop" style="margin-right: 80px;">
									                <input style="float: right" type="checkbox" id="cbox1"><a style="float: right">Ver contraseña</a>	
									            </div>
									            
                                         <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                                           <button type="button" class="mdc-button mdc-button--raised w-100" onclick="confirmPass();">Cambiar contraseña</button>
                                		</div>
									</div>
								</form>
							</div>';
					  	}
				    }else{
					    $html = '<div class="row" style="border: solid 2px #214a81;border-radius: 40px;width: 650px;height: 197px;display: flex;">
								<div>
									<img src="../assets/img/confirmail_error.png" style="height: 200px;margin: -2px;">
								</div>
								<div style="float: left;margin-left: 25px;margin-top: 20px;">
							  		<h2 style="color: #214a81;"><b>Error</b></h2>
									<p>Error de token.</p>
									<br>
									<a class="btn" href="../login">Ir a inicio.</a>
								</div>
							</div>';	
				    }
				    echo $html;
				?>
				
			</div>
				
				<div class="desactivarC" style="height: 100%;width: 100%;position: fixed;top: 0;left: 0;background: rgba(255,255,255,0.7); z-index: 100;display:none;"><img src="../assets/img/loading.gif" style="margin-left:50%; margin-top:300px;width: 60px;"></div>
			</div>

		<!--/ End Team -->

		<script>	
			 $(function(){
            $("#cbox1").change(function(){
                var checkbox = document.getElementById('cbox1');
                var passField = document.getElementById('txtContraseña');
                var passField2 = document.getElementById('txtRepContraseña');
                if(checkbox.checked==true){
                    passField.type = "text";
                    passField2.type = "text";
                }else{
                    passField.type = "password";    
                    passField2.type = "password";    
                }
            });


        });
			function confirmPass() {

				var Email = $('#txtEmail').val();
				var Pass = $('#txtContraseña').val();
				var RePass = $('#txtRepContraseña').val();

				if($.trim(Pass) == ''){
			        toastr.error('Por favor, ingrese su nueva contraseña.');
			        $("#txtContraseña").focus();

			    }else if($.trim(RePass) == ''){
			        toastr.error('Por favor, repita su nueva contraseña.');
			        $("#txtRepContraseña").focus();

			    }else if($.trim(Pass) != $.trim(RePass)){
			        toastr.error('Las contraseñas no coinciden.');
			        $("#txtContraseña").focus();

			    }else{
			      $('.desactivarC').fadeIn(500);
			      $.ajax({
                    url : "developer/Lopersa/changePass",
			        type : "POST",
			        data : {
			          'Pass' : Pass,
			          'EmailRecuperar' : Email
			        },
			        dataType : "JSON",
			        success : function (json){
			          if(json.success == true){
			            toastr.success("Se ha guardado su nueva contraseña.");
			            $("#fmrpass")[0].reset();
                        window.location='../login';
			          }else{
			              toastr.error(json.mensaje);
			          }
			        }, complete : function(){
			          $('.desactivarC').fadeOut(500);
			        }
			      });
			    }
			}
		</script>
    </body>

</html>

