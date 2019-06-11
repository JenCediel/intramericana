<?php 
require_once '../developer/PDOConn.php';

class Usuarios extends db
{


  public function login($usuario)
  {
    $sql="SELECT us.codigo_usu, us.usuario, us.password, us.estado, us.nombre_usu, us.foto, us.estado, pf.codigo_perfil, pf.nombre_perfil, ro.codigo_rol, ro.nombre_rol FROM usuarios us
                  INNER JOIN perfiles pf ON pf.codigo_perfil = us.codperfil_fk 
                  INNER JOIN roles ro ON ro.codigo_rol = pf.codrol_fk
                  WHERE us.usuario = :usuario";
    $params = array(':usuario'=>$usuario);
    $res = $this->row($sql,$params);
    //print_r(($res));
    return $res;
  }


  public function loadUsuarios($whe)
  {

    $sql = "SELECT codigo_usu, usuario, codperfil_fk, estado, nombre_usu, foto, pf.nombre_perfil 
            FROM usuarios 
            INNER JOIN perfiles pf ON pf.codigo_perfil = codperfil_fk ".$whe." ORDER BY codigo_usu ASC";
            $res = $this->table($sql);
            return $res;
  }


  public function loadPerfilesSAdmin()
  {
    $sql = "SELECT codigo_perfil, nombre_perfil, estado_perfil FROM perfiles WHERE estado_perfil = :estado  ORDER BY nombre_perfil ASC";
    $params = array(':estado' => 'on');
    $res = $this->table($sql, $params);
    return $res;
  }

  public function loadPerfilesS()
  {
    $sql = "SELECT codigo_perfil, nombre_perfil, estado_perfil FROM perfiles WHERE estado_perfil = :estado AND codigo_perfil!=:codigo_perfil ORDER BY nombre_perfil ASC";
    $params = array(':estado' => 'on',':codigo_perfil' => '1');
    $res = $this->table($sql, $params);
    return $res;
  }


  public function editEstadoCliente($codusuario, $estado)
  {
    $update = "UPDATE usuarios SET estado = :estado WHERE codigo_usu = :codusuario";
    $params = array(':codusuario' => $codusuario, ':estado' => $estado);
    $res = $this->table($update, $params);
    return $res;
  }


  public function editModalUsuario($codusuario, $nombre)
  {

    $update = "UPDATE usuarios SET nombre_usu = :nombre WHERE codigo_usu = :codusuario";
    $params = array(':codusuario' => $codusuario, ':nombre' => $nombre);
    $res = $this->table($update,$params);
    return $res;

  }


  public function insertUsuario($usuario, $pass, $codperfil, $estado, $nombre)
  {
    $insert = "INSERT INTO usuarios (usuario, password, codperfil_fk, estado, nombre_usu) VALUES (:usuario, :pass, :codperfil, :estado, :nombre)  RETURNING codigo_usu";
      $params = array(':usuario' => $usuario, ':pass' =>  sha1($pass), ':codperfil' => $codperfil, ':estado' => $estado, ':nombre' => $nombre);
      $res = $this->DataRow($insert,$params);
      return $res;  
  }

  public function insertUsuarioArea($codusuario, $codareanivel)
  {
    $insert = "INSERT INTO usuario_area (codusuario, codarea_nivel) VALUES (:codusuario, :codareanivel)";
      $params = array(':codusuario' => $codusuario, ':codareanivel' =>  $codareanivel);
      $res = $this->query($insert,$params);
      return $res;  
  }

  public function loadAreasxNivel($codnivel)
  {

    $sql = "SELECT an.*, a.nombre as area FROM
            area_nivel an INNER JOIN area a ON an.codarea=a.codigo
            WHERE codnivel=:codnivel";
            $params = array(':codnivel' => $codnivel);
            $res = $this->table($sql, $params);
            return $res;
  }

  public function buscarUsuario($usuario)
  {
    $select = "SELECT * FROM usuarios WHERE codigo_usu = :codusuario";
    $paramsselect = array(':codusuario' => $usuario);
    $row = $this->row($select,$paramsselect);
    return $row;
  }

  public function editarContrasena($nuevaContra, $usuario)
  {
    $update = "UPDATE usuarios SET password = :password WHERE codigo_usu = :codusuario";
    $params = array(':password'=> sha1($nuevaContra), ':codusuario'=>$usuario);
     if($this->query($update,$params)){
      return true;
    }
    else{
      return false;
    }
  }

}