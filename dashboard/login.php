<?php
    session_start();
    if (isset($_SESSION["PYS_session"])) {
        header("Location: dashboard.php");
    }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Iniciar sesión | Corporación Universitaria Americana.</title>
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
    background: url(assets/img/intranet.png) no-repeat center center fixed; 
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}

.card-container.card {
    max-width: 350px;
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
            <p id="profile-name" class="profile-name-card" style='color:#0C509F;'>Dashboard</p>
            <img id="profile-img" style="width: 100%" src="assets/img/intramericana-14.png" />
            <form class="form-signin" id="frmLogin">
                <span id="reauth-email" class="reauth-email"></span>
                <input id="txtUsuario" name="txtUsuario" type="text" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
                <input type="password" id="txtPassword" name="txtPassword" class="form-control" placeholder="Contraseña" required>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" >Iniciar sesión</button>
            </form><!-- /form -->
            <a href="#" class="forgot-password">
                ¿Olvidó la contraseña?
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->
    

    <script>
        $("#frmLogin").submit(function( event ) {
            event.preventDefault();       
            var usuario = $("#txtUsuario").val();
            var password = $("#txtPassword").val();
            if($.trim(usuario) == ''){
                toastr.error('Por favor, ingrese Usuario.');
                $("#txtUsuario").focus();
            }else if($.trim(password) == ''){
                toastr.error('Por favor, ingrese Contraseña.');
                $("#txtPassword").focus();
            }else{
                $.ajax({
                    url : "developer/login/iniciarsesion",
                    type : "POST",
                    data : {
                        'usuario' : usuario,
                        'password' : password
                    },
                    dataType : "JSON",
                    success : function (json){
                        if(json.success == true){
                            toastr.success("Logueado exitosamente!");
                            window.location='index.php';
                        }else{
                            toastr.error(json.mensaje);
                        }
                    }
                });
            }
        });
    </script>
    
   
</body>
</html>
