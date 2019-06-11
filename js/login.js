$("#frmLogin").submit(function(event) {
    event.preventDefault();

    var usuario = $("#txtUsuario").val();
    var password = $("#txtPassword").val();
    if ($.trim(usuario) == "") {
        toastr.error("Por favor, ingrese Usuario.");
        $("#txtUsuario").focus();
    } else if ($.trim(password) == "") {
        toastr.error("Por favor, ingrese Contraseña.");
        $("#txtPassword").focus();
    } else {
        $(".desactivarC").fadeIn(500);
        $.ajax({
            url: "developer/login/iniciarsesion",
            type: "POST",
            data: {
                usuario: usuario,
                password: password
            },
            dataType: "JSON",
            success: function(json) {
                if (json.success == true) {
                    toastr.success("Logueado exitosamente!");
                    window.location = "./index";
                } else {
                    toastr.error(json.mensaje);
                }
            }
        });
    }
});

function fChangePassword() {
    var txtEmail = $("#txtEmail").val();

    if ($.trim(txtEmail) == "") {
        toastr.error("Por favor, ingrese email.");
        $("#txtEmail").focus();
    } else {
        $(".desactivarC").fadeIn(500);
        $.ajax({
            url: "developer/Lopersa/recuperarUsuario",
            type: "POST",
            data: {
                emailRecuperar: txtEmail
            },
            dataType: "JSON",
            success: function(json) {
                if (json.success == true) {
                    toastr.success(
                        "Se ha enviado un correo a su dirección de correo electrónico"
                    );
                    $("#frmChangePassword")[0].reset();
                    $("#mChangePassword").modal("hide");
                } else {
                    toastr.error(json.mensaje);
                }
            },
            complete: function() {
                $(".desactivarC").fadeOut(500);
            }
        });
    }
}

function fmodalPassword() {
    $("#mChangePassword").modal("show");
}