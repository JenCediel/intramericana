<?php
// session_start();
?>
<nav class="navbar navbar-default top-navbar" role="navigation">
    <!-- menu izquierda -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" ><img src="assets/img/logo-americana.png" class="img-responsive"></a>
    </div>
    <!-- menu derecha -->
    <ul class="nav navbar-top-links navbar-right">
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                <img id="imagen-perfil" src="<?php echo $_SESSION["PYS_foto"]; ?>"  class="img-responsive img-circle" style="width:50px;float: left;margin-right: 10px;margin-top: -14px;"> <span id="nombre-usuario"><?php echo $_SESSION["PYS_nombre_usu"]?></span> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a onclick="loadpag('miperfil.php','');"><i class="fa fa-user fa-fw"></i> Mi perfil</a>
                </li>
                <!-- <li><a href="#"><i class="fa fa-gear fa-fw"></i> Configuración</a> -->
                </li>
                <li class="divider"></li>
                <li><a onclick="localStorage.clear();" href="developer/logout.php"><i class="fa fa-sign-out fa-fw"></i> Cerrar sesión</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
</nav>