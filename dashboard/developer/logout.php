<?php
  session_start();
  // session_unset();
  unset($_SESSION["PYS_session"]);
  unset($_SESSION["PYS_codigo_usu"]);
  unset($_SESSION["PYS_usuario"]);
  unset($_SESSION["PYS_nombre_usu"]);
  unset($_SESSION["PYS_codperfil"]);
  unset($_SESSION["PYS_nombre_perfil"]);
  unset($_SESSION["PYS_foto"]);
  unset($_SESSION["PYS_codrol"]);
  unset($_SESSION["PYS_nombre_rol"]);
  // session_destroy();
  header("Location: ../../login");