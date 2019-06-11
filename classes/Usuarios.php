<?php 
require_once '../developer/PDOConn.php';

class Usuarios extends db
{
    public function login($usuario)
  {
    $sql="SELECT us.codigo_usu, us.usuario, us.password, us.estado, us.nombre_usu, us.foto, us.estado, us.email, pf.codigo_perfil, pf.nombre_perfil, ro.codigo_rol, ro.nombre_rol FROM usu_usuarios us
                  INNER JOIN usu_perfiles pf ON pf.codigo_perfil = us.codperfil_fk 
                  INNER JOIN usu_roles ro ON ro.codigo_rol = pf.codrol_fk
                  WHERE us.email = :usuario";
    $params = array(':usuario'=>$usuario);
    $res = $this->row($sql,$params);
    return $res;
  }

  public function validarCorreoRecuperacion($email)
  {
    $sql = "SELECT * FROM usu_usuarios WHERE email = :email"; 
    $params = array(':email' => $email);
    $res = $this->row($sql, $params);
    return $res;
  }

  public function urlServer ()
  {
    $res = $this->urlservidor();
    return $res;
  }

  function base64url_encode($data) {
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
  }

  public function insertarToken($email, $token)
  {
    $sql =  "UPDATE usu_usuarios SET remember_tokern = :token WHERE email = :email"; 
    $params = array(':email' => $email, ':token' => $token);
    $res = $this->query($sql, $params);
    return $res;
  }

  function generatecod() {
    $randomString = str_shuffle("ghijklx6789".uniqid());
    return $randomString;
  }  

  public function EditarContraseña ($contraseña, $codusuario)
  {
    $sql = "UPDATE usu_usuarios SET password = :password WHERE codigo_usu = :codusuario";
    $params = array(':password'=> $contraseña, ':codusuario'=>$codusuario);
    $res = $this->query($sql, $params);
    return $res;
  }

  public function BuscarCorreo ($email)
  {
    $sql = "SELECT * FROM usu_usuarios WHERE email = :email_usuario";
    $params = array(':email_usuario' => $email);
    $res = $this->row($sql, $params);
    return $res;
  }

}