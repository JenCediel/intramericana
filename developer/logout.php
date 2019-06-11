<?php
  session_start();
  // session_unset();
  unset($_SESSION["session"]);
  unset($_SESSION["codigo_usu"]);
  unset($_SESSION["usuario"]);
  unset($_SESSION["nombre_usu"]);
  unset($_SESSION["codperfil"]);
  unset($_SESSION["nombre_perfil"]);
  unset($_SESSION["foto"]);
  unset($_SESSION["codrol"]);
  unset($_SESSION["nombre_rol"]);
  // session_destroy();
  header("Location: ../login");