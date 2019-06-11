<?php
session_start();
date_default_timezone_set('Pacific/Honolulu');
header('content-type: application/json; charset=utf-8');
require("phpmailer/class.phpmailer.php");
require("phpmailer/class.smtp.php");

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPKeepAlive = true;
$mail->SMTPSecure = "tls";
$mail->SMTPDebug  = 0;
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;

$mail->Username = "sai@coruniamericana.edu.co";
$mail->Password = "SAI1234.";
$mail->SetFrom('admisiones@coruniamericana.edu.co', utf8_decode('Corporación Universitaria Americana'));

$mail->Subject = utf8_decode("Verificación de Paz y Salvo | Corporación Universitaria Americana");
$mail->AltBody = "";



if (isset($_GET['case'])) {
  $case = $_GET['case'];
}
if (isset($_GET['estado'])) {
  $estado = $_GET['estado'];
}

// VARIABLE menu
if (isset($_POST['codmenu'])) {
  $codmenu = $_POST['codmenu'];
}
if (isset($_POST['icono'])) {
  $icono_menu = trim($_POST['icono']);
}
if (isset($_POST['nombre_menu'])) {
  $nombre_menu = ucfirst(strtolower(trim($_POST['nombre_menu'])));
}
if (isset($_POST['nivel'])) {
  $nivel_menu = $_POST['nivel'];
}
if (isset($_POST['link'])) {
  $link_menu = strtolower($_POST['link']);
}
if (isset($_POST['padre'])) {
  $padre_menu = $_POST['padre'];
}
if (isset($_POST['estado'])) {
  $estado_menu = $_POST['estado'];
}
// variables para busqueda
if (isset($_GET['nombre_menu'])) {
  $nombre_menu = ucfirst(strtolower(trim($_GET['nombre_menu'])));
}
if (isset($_GET['nivel'])) {
  $nivel_menu = $_GET['nivel'];
}
if (isset($_GET['padre'])) {
  $padre_menu = $_GET['padre'];
}
// FIN VARIABLE MENU

//variables perfiles
if (isset($_POST['codperfil'])) {
  $codperfil = $_POST['codperfil'];
}
if (isset($_POST['nombre_perfil'])) {
  $nombre_perfil = $_POST['nombre_perfil'];
}
if (isset($_POST['rol'])) {
  $rol_perfil = $_POST['rol'];
}
if (isset($_POST['estado_perfil'])) {
  $estado_perfil = $_POST['estado_perfil'];
}
// FIN VARIABLE PERFILES

//-------------------
//VARIABLES ASIGNARMENU PERFILES
if (isset($_POST['codrol'])) {
  $codrol = $_POST['codrol'];
}
if (isset($_POST['menus'])) {
  $menus = $_POST['menus'];
}

// variables para mi perfil y para registro empresarial
if (isset($_GET['nombphoto'])) {
  $nombphoto = $_GET['nombphoto'];
}
if (isset($_POST['identificacion'])) {
  $identificacion = $_POST['identificacion'];
}
if (isset($_POST['nombre'])) {
  $nombre = $_POST['nombre'];
}
if (isset($_POST['apellido'])) {
  $apellido = $_POST['apellido'];
}
if (isset($_POST['direccion'])) {
  $direccion = $_POST['direccion'];
}
if (isset($_POST['celular'])) {
  $celular = $_POST['celular'];
}
if (isset($_POST['contraActual'])) {
  $contraActual = $_POST['contraActual'];
}
if (isset($_POST['nuevaContra'])) {
  $nuevaContra = $_POST['nuevaContra'];
}
// variables 

if (isset($_POST['codareaniveltec'])) {
  $codareaniveltec = $_POST['codareaniveltec'];
}

if (isset($_POST['codareaniveltecno'])) {
  $codareaniveltecno = $_POST['codareaniveltecno'];
}

if (isset($_POST['codareanivelpro'])) {
  $codareanivelpro = $_POST['codareanivelpro'];
}

if (isset($_POST['codareanivelpos'])) {
  $codareanivelpos = $_POST['codareanivelpos'];
}

// variables clientes.php
if (isset($_POST['codusuario'])) {
  $codusuario = $_POST['codusuario'];
}
if (isset($_POST['estado'])) {
  $estado = $_POST['estado'];
}

//variables de sedes.php
if (isset($_POST['nombre_sede'])) {
  $nombre_sede = $_POST['nombre_sede'];
}

if (isset($_POST['estado_sede'])) {
  $estado_sede = $_POST['estado_sede'];
}
if (isset($_POST['codigo_sede'])) {
  $codigo_sede = $_POST['codigo_sede'];
}


//variables de encuestas.php
if (isset($_POST['email_persona'])) {
  $email_persona = strtoupper(ucwords($_POST['email_persona']));
}

if (isset($_POST['nombre_persona'])) {
  $nombre_persona = ucwords($_POST['nombre_persona']);
}

if (isset($_POST['celular_persona'])) {
  $celular_persona = $_POST['celular_persona'];
}

if (isset($_POST['usuario'])) {
  $usuario = $_POST['usuario'];
} else {
  $usuario = $_SESSION["PYS_codigo_usu"];
}
if (isset($_POST['codencuesta'])) {
  $codencuesta = $_POST['codencuesta'];
}

// variables usuario.php

if (isset($_POST['pass'])) {
  $pass = $_POST['pass'];
}

//Variables Áreas
if (isset($_POST['codparametro'])) {
  $codparametro = $_POST['codparametro'];
}

if (isset($_POST['codarea'])) {
  $codarea = $_POST['codarea'];
}

if (isset($_POST['nombre_area'])) {
  $nombre_area = $_POST['nombre_area'];
}

if (isset($_POST['nivel_area'])) {
  $nivel_area = $_POST['nivel_area'];
}

if (isset($_POST['estado_area'])) {
  $estado_area = $_POST['estado_area'];
}

if (isset($_GET['nivel_area'])) {
  $nivel_areaGet = $_GET['nivel_area'];
}

if (isset($_GET['nombre_area'])) {
  $nombre_areaGet = $_GET['nombre_area'];
}

//Variables Solicitudes
if (isset($_POST['codsolicitud'])) {
  $codsolicitud = $_POST['codsolicitud'];
}

if (isset($_POST['codsolicitudNovedad'])) {
  $codsolicitudNovedad = $_POST['codsolicitudNovedad'];
}

if (isset($_GET['codsolicitudNovedadGet'])) {
  $codsolicitudNovedadGet = $_GET['codsolicitudNovedadGet'];
}

if (isset($_POST['codnivel'])) {
  $codnivel = $_POST['codnivel'];
}

if (isset($_POST['codsolicitudDet'])) {
  $codsolicitudDet = $_POST['codsolicitudDet'];
}

if (isset($_POST['estado_solicitud'])) {
  $estado_solicitud = $_POST['estado_solicitud'];
}


if (isset($_POST['email_estudiante'])) {
  $email_estudiante = $_POST['email_estudiante'];
}

if (isset($_POST['estadoGrado'])) {
  $estadoGrado = $_POST['estadoGrado'];
}

if (isset($_POST['nivelestudiante'])) {
  $nivelestudiante = $_POST['nivelestudiante'];
}
$estadoGet = '';
if (isset($_GET['estadoGet'])) {
  $estadoGet = $_GET['estadoGet'];
}
$procesoGet = '';
if (isset($_GET['procesoGet'])) {
  $procesoGet = $_GET['procesoGet'];
}

//Variables Procesos
if (isset($_POST['nombre_proceso'])) {
  $nombre_proceso = $_POST['nombre_proceso'];
}

if (isset($_POST['fecha_inicio'])) {
  $fechainicio = $_POST['fecha_inicio'];
}

if (isset($_POST['fecha_fin'])) {
  $fechafin = $_POST['fecha_fin'];
}


if (isset($_POST['cod_proceso'])) {
  $cod_proceso = $_POST['cod_proceso'];
}

//Novedad
if (isset($_POST['reportarnovedad'])) {
  $reportarnovedad = $_POST['reportarnovedad'];
}
if (isset($_POST['codsolicitudDetalle'])) {
  $codsolicitudDetalle = $_POST['codsolicitudDetalle'];
}

//Evidencias
if (isset($_GET["codestudiante"])) {
  $codestudianteGet = $_GET["codestudiante"];
}
if (isset($_GET["codnivel"])) {
  $codnivelGet = $_GET["codnivel"];
}
if (isset($_POST["codigo"])) {
  $codigo = $_POST["codigo"];
}

if (isset($_POST['codnivel'])) {
  $codnivel = $_POST['codnivel'];
}

if (isset($_POST['codestudiante'])) {
  $codestudiante = $_POST['codestudiante'];
}

//funcionario
if (isset($_POST["usuario"])) {
  $usuario = $_POST["usuario"];
}
if (isset($_POST["cargo"])) {
  $cargo = $_POST["cargo"];
}
if (isset($_POST["extension"])) {
  $extension = $_POST["extension"];
}

if (isset($_POST['area'])) {
  $area = $_POST['area'];
}

if (isset($_POST['Correo'])) {
  $Correo = $_POST['Correo'];
}
if (isset($_POST['contra'])) {
  $contra = $_POST['contra'];
}





$createtable = array(
  'data' => array()
);

//Llamados de clases
require_once '../classes/Menu.php';
require_once '../classes/Areas.php';
require_once '../classes/Solicitud.php';
require_once '../classes/Usuarios.php';
require_once '../classes/Perfiles.php';
require_once '../classes/Procesos.php';
require_once '../classes/funcionario.php';

//Creación de objetos
$m = new Menu();
$a = new Areas();
$s = new Solicitud();
$u = new Usuarios();
$p = new Perfiles();
$pr = new Procesos();
$fu = new Funcionario();

switch ($case) {
  case 'loadPerfiles2':



    $sql = "SELECT codperfil as cod, nombre_perfil as nombre, estado_perfil FROM perfil2 WHERE estado_perfil = 'on'";
    $table = table($sql);
    $json = json_encode($table);
    break;


    /************************ procesos para miperfil.php **************************/
  case 'uploadFotoPerfil':
    if ($_FILES['img-perfil']['tmp_name'] != "") {
      $file = $_FILES["img-perfil"]['name'];
      $extension = explode(".", $file);
      $url = "../assets/fotoperfil/" . $_GET['nombphoto'] . "." . $extension[1];
      $urlFoto = 'assets/fotoperfil/' . $_GET['nombphoto'] . "." . $extension[1];

      if (move_uploaded_file($_FILES['img-perfil']['tmp_name'], $url)) {
        $sql = "UPDATE usuarios SET foto='" . $urlFoto . "' WHERE codigo_usu='" . $_SESSION["PYS_codigo_usu"] . "'";
        query($sql);
        $_SESSION["PYS_foto"] = $urlFoto;
        $json = json_encode(array("success" => true, "mensaje" => "Foto de perfil actualizada exitosamente."));
      }
    } else {
      $json = json_encode(array("success" => false, "message" => "Campo vacio"));
    }
    break;


  case 'editUsuario':
    $update = "UPDATE usuarios SET nombre_usu = :nombre WHERE codigo_usu = :codusu";
    $params = array(':nombre' => $nombre, ':codusu' => $_SESSION["PYS_codigo_usu"]);

    if (query($update, $params)) {

      $_SESSION["PYS_nombre_usu"] = $nombre;
      $json = json_encode(array("success" => true));
    } else {
      $json = json_encode(array("success" => false, "mensaje" => "No se Actualizó la información. Por favor, intentelo de nuevo"));
    }
    break;

  case 'editContrasena':

    $row = $u->buscarUsuario($_SESSION["PYS_codigo_usu"]);

    if ($row != '') {
      if ($row['password'] == sha1($contraActual)) {

        $update = $u->editarContrasena($nuevaContra, $_SESSION["PYS_codigo_usu"]);

        if ($update) {
          $json = json_encode(array("success" => true));
        } else {
          $json = json_encode(array("success" => false, "mensaje" => "No se Actualizó la información. Por favor, intentelo de nuevo"));
        }
      } else {
        $json = json_encode(array("success" => false, "mensaje" => "La contraseña actual ingresada no es correcta"));
      }
    }
    break;

    /************************  FIN procesos para miperfil.php ****************************/


    /************************  procesos para gestionarmenu.php ****************************/
  case 'loadMenu':

    $table = $m->loadMenu();
    $i = 1;
    foreach ($table as $datarow => $data) {

      $icono = '<i class="fa ' . $data["imagen"] . '"></i>';

      $edit = '<a class="btn btn-sm btn-primary tooltips" data-rel="tooltip" data-placement="bottom" title="Editar Menú" onclick="fmodalEditar(' . $data["codigo_menu"] . ', \'' . $data["imagen"] . '\',  \'' . $data["nombre_menu"] . '\', \'' . $data["link"] . '\', \'' . $data["estado"] . '\')"><i class="fa fa-edit"></i></a>';

      if ($data["codsuperior"] == 0) {
        $codsuperior = 'Sin menú superior';
      } else {

        $rowmenu = $m->loadMenuImagen($data["codsuperior"]);
        if ($rowmenu != '') {
          $codsuperior = '<b><i class="fa ' . $rowmenu["imagen"] . '"></i> ' . $rowmenu["nombre_menu"] . '</b>';
        }
      }

      $options = $edit;

      array_push($createtable['data'], array($i, $icono, $data["nombre_menu"], $data["nivel"], $data["orden"], $codsuperior, $data["link"], $data["estado"], $options));

      $i++;
    }
    $json = json_encode($createtable);

    break;

  case 'buscarMenu':
    // estado = :estado AND
    $where = "";
    if ($nivel_menu != '') {
      $where .= " AND nivel = " . $nivel_menu;
    }
    if ($padre_menu != '') {
      $where .= " AND codsuperior = " . $padre_menu;
    }


    $table = $m->buscarMenu($nombre_menu, $where);


    $i = 1;
    foreach ($table as $datarow => $data) {

      $icono = '<i class="fa ' . $data["imagen"] . '"></i>';

      $edit = '<a class="btn btn-sm btn-primary tooltips" data-rel="tooltip" data-placement="bottom" title="Editar Menú" onclick="fmodalEditar(' . $data["codigo_menu"] . ', \'' . $data["imagen"] . '\',  \'' . $data["nombre_menu"] . '\', \'' . $data["link"] . '\', \'' . $data["estado"] . '\')"><i class="fa fa-edit"></i></a>';

      if ($data["codsuperior"] == 0) {
        $codsuperior = 'Sin menú superior';
      } else {

        $rowmenu = $m->loadMenuImagen($data["codsuperior"]);
        if ($rowmenu != '') {
          $codsuperior = '<b><i class="fa ' . $rowmenu["imagen"] . '"></i> ' . $rowmenu["nombre_menu"] . '</b>';
        }
      }

      $options = $edit;

      array_push($createtable['data'], array($i, $icono, $data["nombre_menu"], $data["nivel"], $data["orden"], $codsuperior, $data["link"], $data["estado"], $options));

      $i++;
    }
    $json = json_encode($createtable);
    break;

  case 'loadPadresMenu':

    $table = $m->loadPadresMenus();

    if (count($table) >= 1) {
      $json = json_encode(array("success" => true, "menu" => $table));
    } else {
      $json = json_encode(array("success" => false, "mensaje" => "No hay Menú disponibles"));
    }
    break;

  case 'insertItemMenu':

    if ($nivel_menu == '1') {


      $rowOrden = $m->MenuOrdenMax($nivel_menu);

      if ($rowOrden == '') {
        $orden = 1;
      } else {
        $orden = ($rowOrden["nivelmax"] + 1);
      }

      $insert = $m->insertarMenu($nombre_menu, $nivel_menu, $orden, 0, '#', $icono_menu, '_self', $estado_menu);
      $json = json_encode(array("success" => true, "orden" => $orden));
    } else if ($nivel_menu == '2') {
      $rowOrden2 = $m->MenuOrdenMaxNivel2($nivel_menu, $padre_menu);

      $orden2 = ($rowOrden2["nivelmax"] + 1);

      $insert = $m->insertarMenu($nombre_menu, $nivel_menu, $orden2, $padre_menu, $link_menu, $icono_menu, '_self', $estado_menu);
      $json = json_encode(array("success" => true, "orden" => $orden2));
    }
    break;

  case 'editItemMenu':

    $update = $m->editItemMenu($icono_menu, $nombre_menu, $link_menu, $estado_menu, $codmenu);
    $json = json_encode(array("success" => true));

    break;
    /************************  FIN procesos para gestionarmenu.php ****************************/

    /************************  procesos para gestionarperfiles.php ****************************/
  case 'loadPerfiles':
    $table = $p->loadPerfiles(); //, $params
    $i = 1;
    foreach ($table as $datarow => $data) {

      if ($data["estado_perfil"] == 'on') {
        $estado = 'Habilitado';
      } else if ($data["estado_perfil"] == 'off') {
        $estado = 'Inhabilitado';
      } else {
        $estado = 'Error';
      }

      $edit = '<a class="btn btn-sm btn-primary tooltips" data-rel="tooltip" data-placement="bottom" title="Editar Perfil" onclick="fmodalEditar(' . $data["codigo_perfil"] . ', \'' . $data["nombre_perfil"] . '\', \'' . $data["estado_perfil"] . '\')"><i class="fa fa-edit"></i></a>';
      $options = $edit;

      array_push($createtable['data'], array($i, $data["nombre_perfil"], $data["nombre_rol"], $data["menus"], $estado, $options));

      $i++;
    }
    $json = json_encode($createtable);
    break;

  case 'editItemPerfil':
    $table = $p->editItemPerfil($nombre_perfil, $estado_perfil, $codperfil);
    $json = json_encode(array("success" => true));
    break;

  case 'loadRol':
    $table = $p->loadRol();
    $json = json_encode($table);

    break;

  case 'loadPerfilesSelect':
    $sql = "SELECT codigo_perfil as cod, nombre_perfil as nombre FROM perfiles WHERE estado_perfil = 'on'";
    // $params = array(':estado' => $estado_rol);,$params

    $table = table($sql);

    $json = json_encode($table);

    break;

  case 'insertItemPerfil':

    $table = $p->insertItemPerfil($nombre_perfil, $rol_perfil, $estado_perfil);
    $json = json_encode(array("success" => true));

    break;
    /************************  FIN procesos para gestionarmenu.php ****************************/

    /************************  procesos para asignarmenuperfiles.php ****************************/
  case 'loadmodulos':
    $tablemenu = $p->loadmodulos();


    $rowrolesmenu = $p->loadmodulosS($codrol);


    $modulos = explode(",", $rowrolesmenu['menus']);


    $asignados = array();
    $noasignados = array();

    foreach ($tablemenu as $datarowmenu => $datamenu) {
      $pos = in_array($datamenu['codigo_menu'], $modulos);
      if ($pos === false) {
        array_push($noasignados, array('nombre_menu' => $datamenu['nombre_menu'], 'codmenu' => $datamenu['codigo_menu'], 'nivel' => $datamenu['nivel'], 'codsuperior' => $datamenu['codsuperior']));
      } else {
        array_push($asignados, array('nombre_menu' => $datamenu['nombre_menu'], 'codmenu' => $datamenu['codigo_menu'], 'nivel' => $datamenu['nivel'], 'codsuperior' => $datamenu['codsuperior']));
      }
    }

    $json = json_encode(array("success" => true, 'asignados' => $asignados, 'noasignados' => $noasignados));
    break;

  case 'updateConfigRolmenu':

    $table = $p->updateConfigRolmenu($menus, $codrol);
    $json = json_encode(array("success" => true));

    break;
    /************************  FIN procesos para asignarmenuperfiles.php ****************************/



    /************************  procesos para usuarios.php ****************************/

  case 'loadUsuarios':
    if ($estado != '') {
      $whe = "WHERE estado = '" . $estado . "'";
    } else {
      $whe = "";
    }

    $table = $u->loadUsuarios($whe);
    // WHERE p.estado = :estado$params = array(':estado' => 'on');

    //, $params
    $i = 1;
    foreach ($table as $datarow => $data) {

      if ($data["estado"] == 'on') {
        $estado = 'Habilitado';
      } else if ($data["estado"] == 'off') {
        $estado = 'Inhabilitado';
      } else {
        $estado = 'Error';
      }

      $edit = '<a class="btn btn-sm btn-primary tooltips" data-rel="tooltip" data-placement="bottom" title="Editar Usuario" onclick="fmodalEditar(' . $data["codigo_usu"] . ', \'' . $data["usuario"] . '\', \'' . $data["nombre_usu"] . '\')"><i class="fa fa-edit"></i></a>&nbsp;';
      $delete = '<a class="btn btn-danger btn-sm purple tooltips" data-original-title="Eliminar" data-rel="tooltip" title="Eliminar" onClick="feditEstado(' . $data["codigo_usu"] . ',\'off\')"><i class="fa fa-trash-o"></i></a>';
      $restore = '<a class="btn btn-success btn-sm purple tooltips" data-original-title="Restaurar" data-rel="tooltip" title="Restaurar" onClick="feditEstado(' . $data["codigo_usu"] . ', \'on\')""><i class="fa fa-undo"></i></a>';
      $options = $edit . $delete;

      if ($data["estado"] == 'on') $options = $edit . $delete;
      else $options = $restore;
      array_push($createtable['data'], array($i, '<img src="' . $data["foto"] . '" alt="" class="img-circle img-responsive" style="width: 50px;margin: 0px auto;" >', $data["usuario"], $data["nombre_usu"], $data["nombre_perfil"], $estado, $options));

      $i++;
    }
    $json = json_encode($createtable);
    break;

  case 'loadFuncionario':
    if ($estado != '') {
      $whe = "WHERE estado = '" . $estado . "'";
    } else {
      $whe = "";
    }

    $table = $fu->loadFuncionario($whe);
    // WHERE p.estado = :estado$params = array(':estado' => 'on');

    //, $params
    $i = 1;
    foreach ($table as $datarow => $data) {

      if ($data["estado"] == 'on') {
        $estado = 'Habilitado';
      } else if ($data["estado"] == 'off') {
        $estado = 'Inhabilitado';
      } else {
        $estado = 'Error';
      }

      $edit = '<a class="btn btn-sm btn-primary tooltips" data-rel="tooltip" data-placement="bottom" title="Editar Usuario" onclick="fmodalEditar(\'' . $data["nombrearea"] . '\', \'' . $data["nombre"] . '\', \'' . $data["cargo"] . '\', \'' . $data["correo"] . '\', \'' . $data["extension"] . '\', \'' . $data["codigo_funcionario"] . '\')"><i class="fa fa-edit"></i></a>&nbsp;';
      $delete = '<a class="btn btn-danger btn-sm purple tooltips" data-original-title="Eliminar" data-rel="tooltip" title="Eliminar" onClick="feditEstado(' . $data["codigo_funcionario"] . ',\'off\')"><i class="fa fa-trash-o"></i></a>';
      $restore = '<a class="btn btn-success btn-sm purple tooltips" data-original-title="Restaurar" data-rel="tooltip" title="Restaurar" onClick="feditEstado(' . $data["codigo_funcionario"] . ', \'on\')""><i class="fa fa-undo"></i></a>';
      $options = $edit . $delete;

      if ($data["estado"] == 'on') $options = $edit . $delete;
      else $options = $restore;
      array_push($createtable['data'], array($i, '<img src="" alt="" class="img-circle img-responsive" style="width: 50px;margin: 0px auto;" >', $data["nombrearea"], $data["nombre"], $data["cargo"], $data["correo"], $data["extension"], $options));

      $i++;
    }
    $json = json_encode($createtable);
    break;

  case 'loadPerfilesS':
    $table = "";
    if ($_SESSION["PYS_codperfil"] == 1) {
      $table = $u->loadPerfilesSAdmin();
    } else {
      $table = $u->loadPerfilesS();
    }


    if (count($table) >= 1) {
      $json = json_encode(array("success" => true, "perfiles" => $table));
    } else {
      $json = json_encode(array("success" => false, "mensaje" => "No hay Perfiles disponibles"));
    }
    break;

  case 'editEstadoCliente':
    $table = $u->editEstadoCliente($codusuario, $estado);
    $json = json_encode(array("success" => true));
    break;

  case 'editEstadoFuncionario':
    $table = $fu->editEstadoFuncionario($codusuario, $estado);
    $json = json_encode(array("success" => true));
    break;

  case 'editModalUsuario':
    $table = $u->editModalUsuario($codusuario, $nombre);
    $json = json_encode(array("success" => true));
    break;

    case 'editModalFuncionario':
    $table = $fu->editModalFuncionario($usuario, $cargo, $extension, $area, $Correo, $codigo);
    $json = json_encode(array("success" => true));
    break;



  case 'insertUsuario':

    $datarow = $u->insertUsuario($usuario, $pass, $codperfil, $estado, $nombre);

    if ($datarow != -1) {

      if ($codareaniveltec != '') {
        $insert1 = $u->insertUsuarioArea($datarow["codigo_usu"], $codareaniveltec);
      }
      if ($codareaniveltecno != '') {
        $insert2 = $u->insertUsuarioArea($datarow["codigo_usu"], $codareaniveltecno);
      }
      if ($codareanivelpro != '') {
        $insert3 = $u->insertUsuarioArea($datarow["codigo_usu"], $codareanivelpro);
      }
      if ($codareanivelpos != '') {
        $insert4 = $u->insertUsuarioArea($datarow["codigo_usu"], $codareanivelpos);
      }

      $json = json_encode(array("success" => true, "codigo_usu" => $datarow["codigo_usu"]));
    } else {
      $json = json_encode(array("success" => false, "message" => "No se insertó la usuario"));
    }
    break;

  case 'insertarfuncionario':

    $datarow = $fu->insertarFuncionario($usuario, $cargo, $extension, $area, $Correo, $contra);

    if ($datarow == 1) {



      $json = json_encode(array("success" => true, "codigo_usu" => $datarow["codigo_usu"]));
    } else {
      $json = json_encode(array("success" => false, "message" => "No se insertó la usuario"));
    }
    break;

  case 'loadAreasxNivel':
    $table = $u->loadAreasxNivel($codnivel);

    if (count($table) >= 1) {
      $json = json_encode(array("success" => true, "area" => $table));
    } else {
      $json = json_encode(array("success" => false, "mensaje" => "No hay áreas disponibles"));
    }
    break;




    /************************  FIN procesos para clientes.php ****************************/


    /************************  procesos para sedes.php ****************************/
  case 'loadSedes':
    if ($estado != '') {
      $whe = "WHERE estado_sede = '" . $estado . "'";
    } else {
      $whe = "";
    }
    $sql = "SELECT codigo_sede, nombre_sede, estado_sede FROM sedes " . $whe;
    // WHERE p.estado = :estado$params = array(':estado' => 'on');

    $table = table($sql); //, $params
    $i = 1;
    foreach ($table as $datarow => $data) {

      if ($data["estado_sede"] == 'on') {
        $estado = 'Habilitado';
      } else if ($data["estado_sede"] == 'off') {
        $estado = 'Inhabilitado';
      } else {
        $estado = 'Error';
      }

      $edit = '<a class="btn btn-sm btn-primary tooltips" data-rel="tooltip" data-placement="bottom" title="Editar Usuario" onclick="fmodalEditar(' . $data["codigo_sede"] . ', \'' . $data["nombre_sede"] . '\')"><i class="fa fa-edit"></i></a>&nbsp;';
      $delete = '<a class="btn btn-danger btn-sm purple tooltips" data-original-title="Eliminar" data-rel="tooltip" title="Eliminar" onClick="feditEstado(' . $data["codigo_sede"] . ',\'off\')"><i class="fa fa-trash-o"></i></a>';
      $restore = '<a class="btn btn-success btn-sm purple tooltips" data-original-title="Restaurar" data-rel="tooltip" title="Restaurar" onClick="feditEstado(' . $data["codigo_sede"] . ', \'on\')""><i class="fa fa-undo"></i></a>';
      $options = $edit . $delete;

      if ($data["estado_sede"] == 'on') $options = $edit . $delete;
      else $options = $restore;
      array_push($createtable['data'], array($i, $data["nombre_sede"], $estado, $options));

      $i++;
    }
    $json = json_encode($createtable);
    break;

  case 'insertItemSedes':
    $insert = "INSERT INTO sedes (nombre_sede, estado_sede) VALUES (:nombre_sede, :estado_sede) RETURNING codigo_sede";
    $params = array(':nombre_sede' => ucwords($nombre_sede), ':estado_sede' => $estado_sede);
    $datarow = DataRow($insert, $params);

    if ($datarow != -1) {
      $json = json_encode(array("success" => true, "codigo_sede" => $datarow["codigo_sede"]));
    } else {
      $json = json_encode(array("success" => false, "message" => "No se insertó la usuario"));
    }
    break;

  case 'editEstadoSede':
    $update = "UPDATE sedes SET estado_sede = :estado WHERE codigo_sede = :codigo_sede";
    $params = array(':codigo_sede' => $codigo_sede, ':estado' => $estado);

    if (query($update, $params)) {
      $json = json_encode(array("success" => true));
    } else {
      $json = json_encode(array("success" => false, "mensaje" => "No se Actualizó la información. Por favor, intentelo de nuevo"));
    }
    break;

  case 'buscaSede':
    // estado = :estado AND
    if (isset($_GET['nombre_sede'])) {
      $nombre_sede = $_GET['nombre_sede'];
    }

    $sql = "SELECT codigo_sede, nombre_sede, estado_sede FROM sedes WHERE UPPER(nombre_sede) LIKE UPPER('%" . $nombre_sede . "%') ORDER BY codigo_sede ASC";
    // $params = array(':nombre_menu' => $nombre_menu1 );

    $table = table($sql);
    $i = 1;
    foreach ($table as $datarow => $data) {

      if ($data["estado_sede"] == 'on') {
        $estado = 'Habilitado';
      } else if ($data["estado_sede"] == 'off') {
        $estado = 'Inhabilitado';
      } else {
        $estado = 'Error';
      }

      $edit = '<a class="btn btn-sm btn-primary tooltips" data-rel="tooltip" data-placement="bottom" title="Editar Usuario" onclick="fmodalEditar(' . $data["codigo_sede"] . ', \'' . $data["nombre_sede"] . '\')"><i class="fa fa-edit"></i></a>&nbsp;';
      $delete = '<a class="btn btn-danger btn-sm purple tooltips" data-original-title="Eliminar" data-rel="tooltip" title="Eliminar" onClick="feditEstado(' . $data["codigo_sede"] . ',\'off\')"><i class="fa fa-trash-o"></i></a>';
      $restore = '<a class="btn btn-success btn-sm purple tooltips" data-original-title="Restaurar" data-rel="tooltip" title="Restaurar" onClick="feditEstado(' . $data["codigo_sede"] . ', \'on\')""><i class="fa fa-undo"></i></a>';
      $options = $edit . $delete;

      if ($data["estado_sede"] == 'on') $options = $edit . $delete;
      else $options = $restore;
      array_push($createtable['data'], array($i, $data["nombre_sede"], $estado, $options));

      $i++;
    }
    $json = json_encode($createtable);
    break;

    /************************  FIN procesos para sedes.php ****************************/


    /************************  INICIO procesos para gestionarareas.php ****************************/
  case 'loadAreas':

    $table = $a->loadAreas();
    $i = 1;
    foreach ($table as $datarow => $data) {

      $edit = '<a class="btn btn-sm btn-primary tooltips" data-rel="tooltip" data-placement="bottom" title="Editar Área" onclick="fmodalEditar(\'' . $data["codigo"] . '\', \'' . $data["nombre"] . '\',  \'' . $data["codestado"] . '\')"><i class="fa fa-edit"></i></a>';

      $options = $edit;

      array_push($createtable['data'], array($i, $data["nombre"], $data["estado"], $options));

      $i++;
    }
    $json = json_encode($createtable);

    break;

  case 'floadEstado':

    $table = "";
    if ($_SESSION["PYS_codperfil"] == "1" || $_SESSION["PYS_codperfil"] == "2") {
      $table = $a->floadEstado($codparametro);
    } else {
      $table = $a->floadEstadoSinRechazado($codparametro);
    }



    if (count($table) >= 1) {
      $json = json_encode(array("success" => true, "select" => $table));
    } else {
      $json = json_encode(array("success" => false, "mensaje" => "No hay estados disponibles"));
    }
    break;

  case 'insertItemArea':

    $buscar = $a->buscarAreaxNivel($nombre_area);

    if ($buscar == '') {
      $insert = $a->insertarArea($nombre_area);
      if ($insert) {
        $json = json_encode(array("success" => true));
      } else {
        $json = json_encode(array("success" => false, "mensaje" => 'Error al guardar'));
      }
    } else {
      $json = json_encode(array("success" => false, "mensaje" => 'Ya existe un nombre de área en este nivel de estudio'));
    }

    break;

  case 'editItemArea':

    $update = $a->editItemArea($nombre_area, $estado_area, $codarea);

    if ($update) {
      $json = json_encode(array("success" => true));
    } else {
      $json = json_encode(array("success" => false, "mensaje" => 'Error al editar'));
    }


    break;

  case 'buscarArea':
    // estado = :estado AND
    $where = "";
    if ($nivel_areaGet != '') {
      $where .= " AND codnivel = " . $nivel_areaGet;
    }

    $table = $a->buscarArea($nombre_areaGet, $where);


    $i = 1;
    foreach ($table as $datarow => $data) {

      $edit = '<a class="btn btn-sm btn-primary tooltips" data-rel="tooltip" data-placement="bottom" title="Editar Área" onclick="fmodalEditar(\'' . $data["codigo"] . '\', \'' . $data["nombre"] . '\',  \'' . $data["codestado"] . '\', \'' . $data["codnivel"] . '\')"><i class="fa fa-edit"></i></a>';


      $options = $edit;

      array_push($createtable['data'], array($i, $data["nombre"], $data["nivel"], $data["estado"], $options));

      $i++;
    }
    $json = json_encode($createtable);
    break;


    /************************  FIN procesos para gestionarareas.php ****************************/

    /************************  INICIO procesos para gestionarsolicitud.php ****************************/
  case 'loadSolicitudes':

    $cond[] = "";

    $cond[0] = "";
    $cond[1] = "";
    $cond[2] = "";


    if ($estadoGet != "" && $estadoGet != "null") {
      $cond[1] = "s.codestado ='" . $estadoGet . "'";
    }
    if ($procesoGet != "" && $procesoGet != "null") {
      $cond[2] = "s.codproceso='" . $procesoGet . "'";
    }

    $where = "";
    $primero = 0;
    for ($i = 0; $i < 3; $i++) {
      if ($cond[$i] != "") {
        if ($primero == 0) {
          $where .= "WHERE " . $cond[$i];
        }
        if ($primero > 0) {
          $where .= " AND " . $cond[$i];
        }
        if ($primero == 0) {
          $primero = 1;
        }
      }
    }

    $table = $s->loadSolicitudes($where);
    $i = 1;
    foreach ($table as $datarow => $data) {

      $see = '<a class="btn btn-sm btn-warning tooltips" data-rel="tooltip" data-placement="bottom" title="Ver Solicitudes" onclick="fmodalSee(\'' . $data["codigo"] . '\',  \'' . $data["codnivel"] . '\',  \'' . $data["noestudiante"] . '\',  \'' . $data["apestudiante"] . '\',  \'' . $data["nivelestudiante"] . '\')"><i class="fa fa-eye"></i></a>';

      $edit = "";
      $chk = "";
      if ($_SESSION["PYS_codperfil"] == 2 || $_SESSION["PYS_codperfil"] == 1) { //Programador y Administrador (Admisiones es el ultimo que da el aval)

        switch ($data["codestado"]) {
          case '1':
            $edit = '<a class="btn btn-sm btn-primary tooltips" data-rel="tooltip" data-placement="bottom" title="Aprobar Solicitud" onclick="fmodalAprobacionGrado(\'' . $data["codigo"] . '\', \'' . $data["codestado"] . '\', \'' . $data["email"] . '\', \'' . $data["nivelestudiante"] . '\')"><i class="fa fa-graduation-cap"></i></a>';
            break;
          case '12':
            $edit = '<a class="btn btn-sm btn-default tooltips" data-rel="tooltip" data-placement="bottom" title="Aprobar Solicitud" onclick="fmodalAprobacionGrado(\'' . $data["codigo"] . '\', \'' . $data["codestado"] . '\', \'' . $data["email"] . '\', \'' . $data["nivelestudiante"] . '\')"><i class="fa fa-graduation-cap"></i></a>';
            break;

          case '3':
            $edit = '<a class="btn btn-sm btn-primary tooltips" data-rel="tooltip" data-placement="bottom" title="Aprobar Solicitud Financiera" onclick="fmodalAprobacionGrado(\'' . $data["codigo"] . '\', \'' . $data["codestado"] . '\', \'' . $data["email"] . '\', \'' . $data["nivelestudiante"] . '\')"><i class="fa fa-check"></i></a>';
            break;

          case '13':
            $edit = '<a class="btn btn-sm btn-success tooltips" data-rel="tooltip" data-placement="bottom" title="Aprobar Solicitud Financiera"><i class="fa fa-check"></i></a>';
            break;

          case '2':
            $edit = '<a class="btn btn-sm btn-danger tooltips" data-rel="tooltip" data-placement="bottom" title="Solicitud Rechazada"><i class="fa fa-close"></i></a>';
            break;
        }
      }

      $chk .= '<a href="javascript:void(0)" class="btn btn-sm btn-danger tooltips" data-rel="tooltip" data-placement="bottom" title="Soportes" onclick="fmodalUpload(\'' . $data["codestudiante"] . '\',\'' . $data["codnivel"] . '\',\'' . $data["nivelestudiante"] . '\')"><span class="fa fa-cloud-upload"></span></a><br/><br/>';


      $options = $see . $edit . $chk;

      $cantidad =  $data["aceptadas"] . "/" . $data["totalareas"];

      array_push($createtable['data'], array($data["fechasolicitud"], $data["proceso"], $data["identificacion"], $data["noestudiante"], $data["apestudiante"], $data["celular"], $data["nivelestudiante"],  $data["programa"], $data["estado"], $cantidad,  $options));

      $i++;
    }
    $json = json_encode($createtable);

    break;

  case 'loadSolicitudesDetalle':

    $table = $s->loadSolicitudesDetalle($codsolicitud);

    $i = 1;
    $html = "";


    foreach ($table as $datarow => $data) {
      $edit = "";
      $nove = "";
      $encu = "";
      if ($_SESSION["PYS_codperfil"] == 2 || $_SESSION["PYS_codperfil"] == 1) //Perfil administrador (admisiones) y programador
      {
        switch ($data["codestado"]) {
          case '1':
            $edit = '<a class="btn btn-sm btn-primary tooltips" data-rel="tooltip" data-placement="bottom" title="Aceptar Solicitud" onclick="fmodalAprobacion(\'' . $data["codigo"] . '\', \'' . $data["codestado"] . '\')"><i class="fa fa-legal"></i></a>';
            break;
          case '12':
            $edit = '<a class="btn btn-sm btn-primary tooltips" data-rel="tooltip" data-placement="bottom" title="Aceptar Solicitud" onclick="fmodalAprobacion(\'' . $data["codigo"] . '\', \'' . $data["codestado"] . '\')"><i class="fa fa-legal"></i></a>';
            break;
          case '3':
            $edit = '<a class="btn btn-sm btn-success tooltips" data-rel="tooltip" data-placement="bottom" title="Solicitud Aceptada"><i class="fa fa-check"></i></a>';
            break;
          case '2':
            $edit = '<a class="btn btn-sm btn-danger tooltips" data-rel="tooltip" data-placement="bottom" title="Solicitud Rechazada" onclick="fmodalAprobacion(\'' . $data["codigo"] . '\', \'' . $data["codestado"] . '\')"><i class="fa fa-close"></i></a>';
            break;
        }
        $nove = '<a class="btn btn-sm btn-warning tooltips" data-rel="tooltip" data-placement="bottom" title="Novedades" onclick="fmodalNovedades(\'' . $data["codigo"] . '\', \'' . $data["area"] . '\')"><i class="fa fa-file"></i></a>';
      } else {
        //Para los demás perfiles, se valida su área, la cual es la que va a usar para concretar su checkout

        $buscar = $s->buscarAreayUsuario($data["codarea_nivel"], $_SESSION["PYS_codigo_usu"]);
        if ($data["codarea"] == $buscar['codarea']) {
          switch ($data["codestado"]) {
            case '1':
              $edit = '<a class="btn btn-sm btn-primary tooltips" data-rel="tooltip" data-placement="bottom" title="Aceptar Solicitud ' . $data["area"] . '" onclick="fmodalAprobacion(\'' . $data["codigo"] . '\', \'' . $data["codestado"] . '\')"><i class="fa fa-graduation-cap"></i></a>';
              break;
            case '3':
              $edit = '<a class="btn btn-sm btn-success tooltips" data-rel="tooltip" data-placement="bottom" title="Solicitud Aceptada"><i class="fa fa-check"></i></a>';
              break;
            case '2':
              $edit = '<a class="btn btn-sm btn-danger tooltips" data-rel="tooltip" data-placement="bottom" title="Solicitud Rechazada"><i class="fa fa-close"></i></a>';
              break;
            case '12':
              $edit = '<a class="btn btn-sm btn-primary tooltips" data-rel="tooltip" data-placement="bottom" title="Aceptar Solicitud" onclick="fmodalAprobacion(\'' . $data["codigo"] . '\', \'' . $data["codestado"] . '\')"><i class="fa fa-legal"></i></a>';
              break;
          }
          $nove = '<a class="btn btn-sm btn-warning tooltips" data-rel="tooltip" data-placement="bottom" title="Novedades" onclick="fmodalNovedades(\'' . $data["codigo"] . '\', \'' . $data["area"] . '\')"><i class="fa fa-file"></i></a>';
        } else {
          switch ($data["codestado"]) {
            case '1':
              $edit = '<a class="btn btn-sm btn-danger tooltips" data-rel="tooltip" data-placement="bottom" title="Área no disponible para certificar" onclick="noFound()"><i class="fa fa-graduation-cap"></i></a>';
              break;
            case '3':
              $edit = '<a class="btn btn-sm btn-success tooltips" data-rel="tooltip" data-placement="bottom" title="Solicitud Aceptada"><i class="fa fa-check"></i></a>';
              break;
            case '2':
              $edit = '<a class="btn btn-sm btn-danger tooltips" data-rel="tooltip" data-placement="bottom" title="Solicitud Rechazada"><i class="fa fa-close"></i></a>';
              break;
            case '12':
              $edit = '<a class="btn btn-sm btn-danger tooltips" data-rel="tooltip" data-placement="bottom" title="Área no disponible para certificar" onclick="noFound()"><i class="fa fa-graduation-cap"></i></a>';
              break;
          }
          $nove = '<a class="btn btn-sm btn-warning tooltips" data-rel="tooltip" data-placement="bottom" title="Novedades" onclick="fmodalNovedades(\'' . $data["codigo"] . '\', \'' . $data["area"] . '\')"><i class="fa fa-file"></i></a>';
        }
      }

      switch ($data["codarea"]) {
        case '6':
          $buscar = $s->cargarLinkEgresadoSinLink($data["codestudiante"], $data["codnivel"], $data["codarea"]);

          if ($buscar != "") {
            foreach ($buscar as $key => $value) {
              $encu .= "- " . $value["link"] . "<br/>";
            }
          } else {
            $encu = "Sin encuestas realizadas";
          }
          break;
      }

      $html .= "<tr>";
      $html .= "<td>" . $i . "</td>";
      $html .= "<td>" . $data["area"] . "</td>";
      $html .= "<td>" . $data["usuario"] . "</td>";
      $html .= "<td>" . $data["fecha"] . "</td>";
      if ($data["novedades"] != 0) {
        $html .= "<td>" . $data["novedades"] . "</td>";
      } else {
        $html .= "<td>Sin novedad</td>";
      }

      $html .= "<td>" . $data["estado"] . "</td>";
      $html .= "<td>" . $edit . $nove . "</br>" . $encu . "</td>";
      $html .= "</tr>";
      $i++;
    }

    $json = json_encode(array("table" => $html));

    break;

  case 'floadEstado':

    $table = $a->floadEstado($codparametro);

    if (count($table) >= 1) {
      $json = json_encode(array("success" => true, "select" => $table));
    } else {
      $json = json_encode(array("success" => false, "mensaje" => "No hay Menú disponibles"));
    }
    break;

  case 'checkout':

    $url = "http://aplicaciones.americana.edu.co/pazysalvo/solicitud";
    $enviar_correo = false;
    $texto = "";
    //Validamos el texto
    if ($estadoGrado != "2") {
      if ($estadoGrado == "3") //Estado Aceptado
      {
        $buscarCk = $s->buscarSolicitudDetalleAceptadas($codsolicitud);
        if ($buscarCk == '') {
          //SI fue aceptado, actualizamos el estado y se modifica el texto para el correo
          $update = $s->checkoutSolicitud($codsolicitud, $_SESSION["PYS_codigo_usu"], $estadoGrado);
          if ($update) {
            $json = json_encode(array("success" => true, "mensaje" => 'Estudiante validado para graduarse'));
            $texto = 'Su proceso de verificación de <b>PAZ Y SALVO</b> para ' . $nivelestudiante . ' en las diferentes áreas ha culminado satisfactoriamente. Le agradecemos ingresar al Sistema de <a href=' . $url . ' target="_blank">Paz y Salvo</a> y descargar el volante de pago de su nivel en la opción "Descargar volante de pago" y así continuar con su proceso de grado.<br><br>Este mensaje es automático por lo tanto no responda este correo.';
            $enviar_correo = true;
          } else {
            $json = json_encode(array("success" => false, "mensaje" => 'Error al editar'));
          }
        } //Fin if($buscarCk == ''){
        else {
          $json = json_encode(array("success" => false, "mensaje" => 'Validaciones incompletas para este estudiante'));
        }
      } //Fin if($estadoGrado == "3")
      else if ($estadoGrado == "13") //Estado Apto
      {
        $buscarCk = $s->buscarSolicitudDetalleAceptadas($codsolicitud);
        if ($buscarCk == '') {
          //SI fue aceptado, actualizamos el estado y se modifica el texto para el correo
          $update = $s->checkoutSolicitud($codsolicitud, $_SESSION["PYS_codigo_usu"], $estadoGrado);
          if ($update) {
            $json = json_encode(array("success" => true, "mensaje" => 'Estudiante validado para graduarse'));
            $texto = 'Su proceso de verificación de <b>PAZ Y SALVO</b> para ' . $nivelestudiante . ' ha culminado satisfactoriamente. <br/>Por favor verifique según la programación el listado oficial de graduandos. Si su nombre no registra en el listado de graduandos por favor acerquese a la oficina de Admisiones.<br><br>Este mensaje es automático por lo tanto no responda este correo.';
            $enviar_correo = true;
          } else {
            $json = json_encode(array("success" => false, "mensaje" => 'Error al editar'));
          }
        } //Fin if($buscarCk == ''){
        else {
          $json = json_encode(array("success" => false, "mensaje" => 'Validaciones incompletas para este estudiante'));
        }
      } //Fin if($estadoGrado == "13")
      else {
        $update = $s->checkoutSolicitud($codsolicitud, $_SESSION["PYS_codigo_usu"], $estadoGrado);
        if ($update) {
          $json = json_encode(array("success" => true, "mensaje" => 'Estado del estudiante cambiado satisfactoriamente'));
        } else {
          $json = json_encode(array("success" => false, "mensaje" => 'Error al editar'));
        }
      }
    } else {
      //SI fue rechazado, actualizamos el estado y se modifica el texto para el correo
      $update = $s->checkoutSolicitud($codsolicitud, $_SESSION["PYS_codigo_usu"], $estadoGrado);
      if ($update) {
        $json = json_encode(array("success" => true, "mensaje" => 'Estudiante rechazado para graduarse'));
        $texto = 'Su proceso de verificación de <b>PAZ Y SALVO</b> para ' . $nivelestudiante . ' en las diferentes áreas ha culminado y no fue satisfactorio. Le agradecemos acercarse a las oficinas de Admisiones para corregir de ser necesario su inconveniente.';
        $enviar_correo = true;
      } else {
        $json = json_encode(array("success" => false, "mensaje" => 'Error al editar'));
      }
    }

    if ($enviar_correo) {
      //Envío del correo al estudiante, notificando que ya se ha verificado la validación de su paz y salvo

      if ($email_estudiante != '') {

        $html = "<!DOCTYPE html>";
        $html .= "<html>";
        $html .= "<head>";
        $html .= "<title>Calificaci&oacute;n Admismiones | Corporaci&oacute;n Universitaria Americana</title>";
        $html .= "<meta charset='UTF-8'>";
        $html .= "<style> 
                    body{
                        text-align:center;
                    }
                  /*button*/
                    .button{
                      display: inline-block;
                      padding:0 10px;
                      color: #4c4c4c;
                      height: 40px;
                      text-align: center;
                      line-height: 35px;
                      white-space: nowrap;
                       cursor: pointer;
                      box-sizing: border-box; 
                      border: 1px solid #CCCCCC;
                      margin-bottom:10px;
                      border-radius:3px;
                      font-weight: bold;
                      outline: 0;
                      text-decoration: none;
                    }
                    .primary-button{
                      color: #fff !important;
                      background: #004e93!important;
                      border: 1px solid #004e93;
                    }
                </style>";
        $html .= "</head>";
        $html .= "<body>";
        $html .= '<table style="width:100%;max-width:600px" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">';
        $html .= '<tbody>';
        $html .= '<tr>';
        $html .= '<td role="modules-container" style="padding:0px 0px 0px 0px;color:#000000;text-align:left" width="100%" bgcolor="#ffffff" align="left">';
        $html .= '<table style="table-layout:fixed" width="100%" cellspacing="0" cellpadding="0" border="0">';
        $html .= '<tbody>';
        $html .= '<tr>';
        $html .= '<td style="font-size:6px;line-height:10px;padding:0px 0px 0px 0px" valign="top" align="center">';
        $html .= '<img style="display:block;max-width:100%!important;width:100%;height:auto!important" src="../assets/img/header-email.jpg" width="600" border="0">';
        $html .= '</td>';
        $html .= '</tr>';
        $html .= '</tbody>';
        $html .= '</table>';

        $html .= '<table style="table-layout:fixed" width="100%" cellspacing="0" cellpadding="0" border="0">';
        $html .= '<tbody>';
        $html .= '<tr>';
        $html .= '<td style="padding:0px 0px 20px 0px">';
        $html .= '</td>';
        $html .= '</tr>';
        $html .= '</tbody>';
        $html .= '</table>';

        $html .= '<table style="table-layout:fixed" width="100%" cellspacing="0" cellpadding="0" border="0">';
        $html  .= '<tbody>';
        $html .= '<tr>';
        $html .= '<td style="padding:18px 0px 10px 0px;line-height:22px;text-align:inherit" valign="top" height="100%">';
        $html .= '<div style="text-align:center">';
        $html .= '<span style="font-size:22px";font-family:arial,helvetica,sans-serif">';
        $html .= '<img src="../assets/img/graduation-certificate.png" style="width:30%;" /><br/>';
        $html .= '<strong>Estimado estudiante</strong>';
        $html .= '</span></div>';
        $html  .= '</td>';
        $html .= '</tr>';

        $html .= '<tr>';
        $html .= '<td style="padding:0px 0px 0px 0px;line-height:22px;text-align:inherit" valign="top" height="100%">';
        $html .= '<p font-style:normal;font-variant-ligatures:normal;font-variant-caps:normal;font-weight:400;font-family:Georgia,"Times New Roman","Bitstream Charter",Times,serif;font-size:16px;text-align:justify;color:rgb(51,51,51)>';
        $html .= '<span style="font-family:arial,helvetica,sans-serif;font-size:16px">';
        $html .= $texto;
        $html .= '</span></p>';
        $html  .= '</td>';
        $html .= '</tr>';


        /*$html .= '<tr>';
                $html .= '<td style="padding:0px 0px 0px 0px;line-height:22px;text-align:inherit" valign="top" height="100%">';
                $html .= '<p font-style:normal;font-variant-ligatures:normal;font-variant-caps:normal;font-weight:400;font-family:Georgia,"Times New Roman","Bitstream Charter",Times,serif;font-size:16px;text-align:justify;color:rgb(51,51,51)>';
                $html .= '<span style="font-family:arial,helvetica,sans-serif;font-size:16px">';
                $html .= 'Para realizar la encuesta ingresa dando click en el siguiente botón:';
                $html .='</span></p>';
                $html  .='</td>';
                $html .= '</tr>';*/


        $html .= '</tbody>';
        $html .= '</table>';

        $html .= '<table style="table-layout:fixed" width="100%" cellspacing="0" cellpadding="0" border="0">';
        $html .= '<tbody>';
        $html .= '<tr>';
        $html .= '<td style="font-size:6px;line-height:10px;padding:0px 0px 0px 0px" valign="top" align="center">';
        $html .= '<img style="display:block;max-width:100%!important;width:100%;height:auto!important" src="../assets/img/footer-email.jpg" alt="" tabindex="0" width="600" border="0">';
        $html .= '</td>';
        $html .= '</tr>';
        $html .= '</tbody></table>';
        $html .= '</td>';
        $html .= '</tr>';
        $html .= '</tbody>';
        $html .= '</table>';
        $html .= "</body>";
        $html .= "</html>";
        $mail->MsgHTML($html);
        $mail->AddAddress($email_estudiante, "");

        $mail->IsHTML(true);
        $mail->smtpConnect(
          array(
            "ssl" => array(
              "verify_peer" => false,
              "verify_peer_name" => false,
              "allow_self_signed" => true
            )
          )
        );

        if ($mail->Send()) {
          $json = json_encode(array("success" => true, "mensaje" => "Notificación enviada al estudiante"));
        } else {
          $json = json_encode(array("success" => true, "mensaje" => $mail->ErrorInfo));
        }
      } //Fin if $email_estudiante
    } //Fin if($estadoGrado == "2" || $estadoGrado == "3" )


    break;

  case 'checkoutDetalle':

    $update = $s->checkoutSolicitudDetalle($codsolicitudDet, $estado_solicitud, $_SESSION["PYS_codigo_usu"]);

    if ($update) {
      $json = json_encode(array("success" => true, "mensaje" => 'Certificado aceptado correctamente'));
    } else {
      $json = json_encode(array("success" => false, "mensaje" => 'Error al editar'));
    }


    break;

  case 'buscarArea':
    // estado = :estado AND
    $where = "";
    if ($nivel_areaGet != '') {
      $where .= " AND codnivel = " . $nivel_areaGet;
    }

    $table = $a->buscarArea($nombre_areaGet, $where);


    $i = 1;
    foreach ($table as $datarow => $data) {

      $edit = '<a class="btn btn-sm btn-primary tooltips" data-rel="tooltip" data-placement="bottom" title="Editar Área" onclick="fmodalEditar(\'' . $data["codigo"] . '\', \'' . $data["nombre"] . '\',  \'' . $data["codestado"] . '\', \'' . $data["codnivel"] . '\')"><i class="fa fa-edit"></i></a>';


      $options = $edit;

      array_push($createtable['data'], array($i, $data["nombre"], $data["nivel"], $data["estado"], $options));

      $i++;
    }
    $json = json_encode($createtable);
    break;


    /************************  FIN procesos para gestionarareas.php ****************************/

    /************************  INICIO procesos para gestionarprocesos.php ****************************/

  case 'floadProcesos':

    if ($estadoGet != '') {
      $whe = "WHERE s.codestado = '" . $estadoGet . "'";
    } else {
      $whe = "";
    }

    $table = $pr->floadProcesos();

    if (count($table) >= 1) {
      $json = json_encode(array("success" => true, "select" => $table));
    } else {
      $json = json_encode(array("success" => false, "mensaje" => "No hay estados disponibles"));
    }
    break;

  case 'loadProcesos':

    $table = $pr->loadProcesos();
    $i = 1;
    foreach ($table as $datarow => $data) {

      //$dateinicio = str_replace('-', '/', $data["fechainicio"]);
      $fechainicio =  date('d-m-Y', strtotime($data["fechainicio"]));

      //$datefin = str_replace('-', '/', $data["fechafin"]);
      $fechafin =  date('d-m-Y', strtotime($data["fechafin"]));

      //$fecharegistro =  date('d-m-Y', strtotime($data["fecharegistro"]));

      /*$fechaactualizacion = "";
          if($data["fechaactualizacion"] != ''){
            $fechaactualizacion =  date('d-m-Y', strtotime($data["fechaactualizacion"]));
          }*/


      $edit = '<a class="btn btn-sm btn-primary tooltips" data-rel="tooltip" data-placement="bottom" title="Editar Procesos" onclick="fmodalEditar(\'' . $data["codigo"] . '\', \'' . $data["nombre"] . '\',  \'' . $fechainicio . '\',  \'' . $fechafin . '\',  \'' . $data["codnivel"] . '\')"><i class="fa fa-edit"></i></a>';

      $options = $edit;

      array_push($createtable['data'], array($i, $data["nombre"], $fechainicio, $fechafin, $data["nivel"], $options));

      $i++;
    }
    $json = json_encode($createtable);
    break;


  case 'editItemProceso':

    $fecha_inicio = strtotime(date("d-m-Y H:i:00", time()));
    $fecha_fin = strtotime($fechafin);

    if ($fecha_inicio < $fecha_fin) {
      $update = $pr->editItemProceso($_SESSION["PYS_codigo_usu"], $nombre_proceso, $fechainicio, $fechafin, $cod_proceso, $codnivel);
      $json = json_encode(array("success" => true));
    } else {
      $json = json_encode(array("success" => false, "mensaje" => "La fecha de finalización es menor a la fecha de inicio"));
    }

    break;


  case 'insertItemProceso':

    $fecha_inicio = strtotime(date("d-m-Y H:i:00", time()));
    $fecha_fin = strtotime($fechafin);

    if ($fecha_inicio < $fecha_fin) {
      $table = $pr->insertItemProceso($_SESSION["PYS_codigo_usu"], $nombre_proceso, $fechainicio, $fechafin, $codnivel);
      $json = json_encode(array("success" => true));
    } else {
      $json = json_encode(array("success" => false, "mensaje" => "La fecha de finalización es menor a la fecha de inicio"));
    }

    break;


  case 'buscarProceso':
    // estado = :estado AND
    $where = "";
    if ($nivel_procesGet != '') {
      $where .= " AND codnivel = " . $nivel_procesGet;
    }

    $table = $pr->buscarProceso($nombre_procesGet, $where);


    $i = 1;
    foreach ($table as $datarow => $data) {

      $edit = '<a class="btn btn-sm btn-primary tooltips" data-rel="tooltip" data-placement="bottom" title="Editar Procesos" onclick="fmodalEditar(\'' . $data["codigo"] . '\', \'' . $data["nombre"] . '\',  \'' . $data["fechainicio"] . '\',  \'' . $data["fechafin"] . '\',  \'' . $data["codnivel"] . '\',  \'' . $data["fecharegistro"] . '\',  \'' . $data["fechaactualizacion"] . '\',  \'' . $data["codusuario"] . '\')"><i class="fa fa-edit"></i></a>';


      $options = $edit;

      array_push($createtable['data'], array($i, $data["nombre"], $data["fechainicio"], $data["fechafin"], $data["nivel"], $data["fecharegistro"], $data["fechaactualizacion"], $data["usuario"], $options));

      $i++;
    }
    $json = json_encode($createtable);
    break;


  case 'floadnivel':

    $table = $a->floadEstado($codparametro);

    if (count($table) >= 1) {
      $json = json_encode(array("success" => true, "select" => $table));
    } else {
      $json = json_encode(array("success" => false, "mensaje" => "No hay nivel disponibles"));
    }
    break;

    /************************  FIN procesos para gestionarprocesos.php ****************************/

    /************************  INICIO procesos para ingresarnovedad ****************************/

  case 'floadNovedades':

    $table = $s->floadNovedades($codsolicitudDetalle);


    if (count($table) >= 1) {

      $html = "";
      $i = count($table);
      foreach ($table as $datarow => $data) {

        $evi = '<button class="btn btn-sm btn-danger tooltips" data-rel="tooltip" data-placement="bottom" title="Cargar evidencia" onclick="fmodalNovedadesEvidencias(\'' . $data["codigo"] . '\')"><i class="fa fa-cloud-upload"></i></button>';

        $html .= "<tr>";
        $html .= "<td>" . $i . "</td>";
        $html .= "<td>" . $data["fecha"] . "</td>";
        $html .= "<td>" . $data["usuario"] . "</td>";
        $html .= "<td>" . $data["comentario"] . "</td>";
        $html .= "<td>" . $evi . "</td>";
        $html .= "</tr>";
        $i = $i - 1;
      }

      $json = json_encode(array("success" => true, "table" => $html));
    } else {
      $json = json_encode(array("success" => false, "mensaje" => "No hay novedades registradas para esta área."));
    }
    break;

  case 'ingresarnovedad':
    //Ingresa una novedad
    $insert = $s->insertItemNovedad($_SESSION["PYS_nombre_usu"], $reportarnovedad, $codsolicitudDetalle);

    //Cambia el estado de la solicitud detalle a "Pendiente", hasta que no se le de clic en "Aceptar solicitud"
    $update = $s->checkoutSolicitudDetalle($codsolicitudDetalle, "12", $_SESSION["PYS_codigo_usu"]);

    if ($insert) {
      $json = json_encode(array("success" => true, "mensaje" => "Novedad registrada correctamente."));
    } else {
      $json = json_encode(array("success" => false, "mensaje" => "Error al registrar novedad."));
    }

    break;

  case 'cantSolicitudesxArea':

    $contador = 0;
    $mensaje = "";

    if ($_SESSION["PYS_codperfil"] == 2) //Para el usuario administrador  de Admisiones
    {
      $total = $s->cantSolicitudesxAreaxAdmin("2");
      if ($total != "") {
        $contador = $total["total"];
      }
    }
    if ($_SESSION["PYS_codperfil"] == 1) //Para el usuario administrador  de Admisiones
    {
      $contador = -1;
    } else {
      //Se busca la cantidad de áreas por usuario
      $areas = $a->buscarAreasxUsuario($_SESSION["PYS_codigo_usu"]);
      //Cuenta todas las solicitudes
      if ($areas != "") {
        foreach ($areas as $key => $value) {
          $total = $s->cantSolicitudesxArea($value['codigo']);
          if ($total != "") {
            $contador = $total["total"] + $contador;
          }
        }
      }
    }

    if ($contador > 0) {
      $mensaje = "<span class='fa fa-bell'></span> Ud tiene " . $contador . " solicitudes sin responder.";
    } else if ($contador == 0) {
      $mensaje = "<span class='fa fa-bell-slash'></span> Ud tiene no tiene solicitudes pendientes.";
    } else {
      $mensaje = "Bienvenido Superadministrador.";
    }

    $json = json_encode(array("mensaje" => $mensaje));


    break;

    /************************  FIN procesos para ingresarnovedad ****************************/

    /************************  INICIO procesos para ingresarevidencia ****************************/
  case 'uploadEvidencia':

    if ($_FILES['upload']['tmp_name'] != "") {

      $size = 4000000; //4MB

      if ($_FILES['upload']['size'] < $size) {
        $file = $_FILES["upload"]['name'];
        $extension = pathinfo($file, PATHINFO_EXTENSION);

        if ($s->validarFormato($extension)) {
          if ($s->validarMime_type($_FILES['upload']['type'])) {
            $folder = "~/assets/soportes/";
            if (!file_exists($folder)) {
              mkdir($folder, 0777, true);
            }
            $url = $folder . $file;

            if (move_uploaded_file($_FILES['upload']['tmp_name'], $url)) {

              $insert = $s->uploadEvidencia($file, $extension, $url, $codestudianteGet, $codnivelGet, $_SESSION["PYS_nombre_usu"], $_FILES['upload']['type']);
              if ($insert) {
                $json = json_encode(array("success" => true, "mensaje" => "Soporte cargado exitosamente"));
              } else {
                $json = json_encode(array("success" => false, "mensaje" => 'Error al cargar el soporte'));
              }
            } else {
              $json = json_encode(array("success" => false, "mensaje" => 'Error al guardar el soporte'));
            }
          } else {
            $json = json_encode(array("success" => false, "mensaje" => 'Error al guardar el soporte, archivo no permitido para cargar'));
          }
        } else {
          $json = json_encode(array("success" => false, "mensaje" => 'Error al guardar el soporte, archivo no permitido para cargar'));
        }
      } else {
        $json = json_encode(array("success" => false, "mensaje" => 'Error al cargar el soporte, el tamaño supera lo permitido'));
      }
    } else {
      $json = json_encode(array("success" => false, "mensaje" => 'Campo soporte vacio ' . $_FILES['upload']['error']));
    }
    break;

  case 'floadSoporte':

    $table = $s->floadSoporte($codestudiante, $codnivel);


    if (count($table) >= 1) {

      $html = "";
      $i = count($table);
      foreach ($table as $datarow => $data) {
        $html .= "<tr>";
        $html .= "<td style='width:20px'>" . $i . "</td>";
        $html .= "<td style='width:40px'>";

        switch ($data["ext"]) {
          case 'bmp':
            $html .= "<img src='./assets/ext/bmp.png' />";
            break;
          case 'doc':
            $html .= "<img src='./assets/ext/doc.png' />";
            break;
          case 'docx':
            $html .= "<img src='./assets/ext/docx.png' />";
            break;
          case 'gif':
            $html .= "<img src='./assets/ext/gif.png' />";
            break;
          case 'html':
            $html .= "<img src='./assets/ext/html.png' />";
            break;
          case 'jpeg':
            $html .= "<img src='./assets/ext/jpeg.png' />";
            break;
          case 'jpg':
            $html .= "<img src='./assets/ext/jpg.png' />";
            break;
          case 'mp3':
            $html .= "<img src='./assets/ext/mp3.png' />";
            break;
          case 'pdf':
            $html .= "<img src='./assets/ext/pdf.png' />";
            break;
          case 'png':
            $html .= "<img src='./assets/ext/png.png' />";
            break;
          case 'ppt':
            $html .= "<img src='./assets/ext/ppt.png' />";
            break;
          case 'pptx':
            $html .= "<img src='./assets/ext/pptx.png' />";
            break;
          case 'rar':
            $html .= "<img src='./assets/ext/rar.png' />";
            break;
          case 'sql':
            $html .= "<img src='./assets/ext/sql.png' />";
            break;
          case 'txt':
            $html .= "<img src='./assets/ext/txt.png' />";
            break;
          case 'wav':
            $html .= "<img src='./assets/ext/wav.png' />";
            break;
          case 'xls':
            $html .= "<img src='./assets/ext/xls.png' />";
            break;
          case 'xlsx':
            $html .= "<img src='./assets/ext/xlsx.png' />";
            break;
          case 'zip':
            $html .= "<img src='./assets/ext/zip.png' />";
            break;
          default:
            # code...
            break;
        }

        $strSearchHTML = "~/";
        $strReplaceHTML = "";
        $url = str_replace($strSearchHTML, $strReplaceHTML, $data["url"]);
        $html .= "</td>";
        $html .= "<td>" . $data["nombrearchivo"] . "</td>";
        $html .= "<td style='width:95px'><a download href='" . $url . "' target='_blank' class='btn btn-primary'><span class='fa fa-download'></span></a><a href='javascript:void(0)' onclick='deletee(" . $data["codigo"] . "," . $codestudiante . "," . $codnivel . ")' class='btn btn-danger'><span class='fa fa-close'></span></a></td>";
        $html .= "</tr>";
        $i = $i - 1;
      }

      $json = json_encode(array("success" => true, "table" => $html));
    } else {
      $json = json_encode(array("success" => false, "mensaje" => "No hay soportes registrados para este nivel de grado."));
    }
    break;

  case 'deleteSoporte':

    $delete = $s->deleteSoporte($codigo, "0", $_SESSION["PYS_nombre_usu"]);
    if ($delete) {
      $json = json_encode(array("success" => true, "mensaje" => "Soporte eliminado correctamente"));
    } else {
      $json = json_encode(array("success" => false, "mensaje" => "Error al eliminar"));
    }
    break;

  case 'floadSoportesNovedades':

    $table = $s->floadSoportesNovedades($codsolicitudNovedad);


    if (count($table) >= 1) {

      $html = "";
      $i = count($table);
      foreach ($table as $datarow => $data) {
        $html .= "<tr>";
        $html .= "<td style='width:20px'>" . $i . "</td>";
        $html .= "<td style='width:40px'>";

        switch ($data["ext"]) {
          case 'bmp':
            $html .= "<img src='./assets/ext/bmp.png' />";
            break;
          case 'gif':
            $html .= "<img src='./assets/ext/gif.png' />";
            break;
          case 'jpeg':
            $html .= "<img src='./assets/ext/jpeg.png' />";
            break;
          case 'jpg':
            $html .= "<img src='./assets/ext/jpg.png' />";
            break;
          case 'pdf':
            $html .= "<img src='./assets/ext/pdf.png' />";
            break;
          case 'png':
            $html .= "<img src='./assets/ext/png.png' />";
            break;
        }
        $strSearchHTML = "~/";
        $strReplaceHTML = "";
        $url = str_replace($strSearchHTML, $strReplaceHTML, $data["url"]);
        $html .= "</td>";
        $html .= "<td>" . $data["nombrearchivo"] . "</td>";
        $html .= "<td style='width:95px'><a download href='" . $url . "' target='_blank' class='btn btn-primary'><span class='fa fa-download'></span></a><a href='javascript:void(0)' onclick='deleteeNovedades(" . $data["codigo"] . ")' class='btn btn-danger'><span class='fa fa-close'></span></a></td>";
        $html .= "</tr>";
        $i = $i - 1;
      }

      $json = json_encode(array("success" => true, "table" => $html));
    } else {
      $json = json_encode(array("success" => false, "mensaje" => "No hay soportes registrados para esta novedad."));
    }
    break;

  case 'deleteSoporteNovedad':

    $delete = $s->deleteSoporteNovedad($codigo, "1", $_SESSION["PYS_nombre_usu"]);
    if ($delete) {
      $json = json_encode(array("success" => true, "mensaje" => "Soporte eliminado correctamente"));
    } else {
      $json = json_encode(array("success" => false, "mensaje" => "Error al eliminar"));
    }
    break;

  case 'uploadEvidenciaNovedades':

    if ($_FILES['uploadNovedades']['tmp_name'] != "") {

      $size = 4000000; //4MB

      if ($_FILES['uploadNovedades']['size'] < $size) {
        $file = $_FILES["uploadNovedades"]['name'];
        $extension = pathinfo($file, PATHINFO_EXTENSION);

        if ($s->validarFormato($extension)) {
          if ($s->validarMime_type($_FILES['uploadNovedades']['type'])) {
            $Createfolder = "../assets/novedades/";
            if (!file_exists($Createfolder)) {
              mkdir($Createfolder, 0777, true);
            }
            $folder = "~/assets/novedades/";
            $url = $folder . $file;
            $urlLoad = $Createfolder . $file;

            $insert = $s->uploadEvidenciaNovedades($file, $extension, $url, $codsolicitudNovedadGet, $_SESSION["PYS_nombre_usu"], $_FILES['uploadNovedades']['type']);
            if ($insert) {
              if (move_uploaded_file($_FILES['uploadNovedades']['tmp_name'], $urlLoad)) {

                $json = json_encode(array("success" => true, "mensaje" => "Soporte cargado exitosamente"));
              } else {
                $json = json_encode(array("success" => false, "mensaje" => 'Error al guardar el soporte'));
              }
            } else {
              $json = json_encode(array("success" => false, "mensaje" => 'Error al cargar el soporte, por favor modifique el nombre del archivo a cargar'));
            }
          } else {
            $json = json_encode(array("success" => false, "mensaje" => 'Error al guardar el soporte, archivo no permitido para cargar'));
          }
        } else {
          $json = json_encode(array("success" => false, "mensaje" => 'Error al guardar el soporte, archivo no permitido para cargar'));
        }
      } else {
        $json = json_encode(array("success" => false, "mensaje" => 'Error al cargar el soporte, el tamaño supera lo permitido'));
      }
    } else {
      $json = json_encode(array("success" => false, "mensaje" => 'Campo soporte vacio ' . $_FILES['uploadNovedades']['error']));
    }
    break;

    /************************  FIN procesos para ingresarevidencia ****************************/


  case 'selectAreas':
    $datos = $a->selectAreas();
    $json = json_encode($datos);
    break;
}
echo $json;
