<?php 
require_once '../developer/PDOConn.php';

class Solicitud extends db
{

  public function loadSolicitudes($where)
  {
    $sql="SELECT s.*, e.identificacion, e.nombre as noestudiante, e.apellido as apestudiante, e.direccion, e.telefono, e.celular, e.email,
                p.nombre as proceso, p.codnivel, p.fechainicio, p.fechafin,
                (SELECT count(*) as totalareas FROM solicitud_detalle WHERE codsolicitud=s.codigo), 
                (SELECT count(*) as aceptadas FROM solicitud_detalle WHERE codsolicitud=s.codigo AND codestado='3'),
                (SELECT programa FROM estudiante_nivelestudio ne INNER JOIN programa_ciclos ps ON ne.codprograma=ps.codprograma WHERE codestudiante=e.codigo AND ne.codnivel=p.codnivel) as programa,
                pv2.nombre as nivelestudiante,
                pv.nombre as estado
                FROM solicitud s INNER JOIN estudiante e ON e.codigo=s.codestudiante
                INNER JOIN proceso p ON p.codigo=s.codproceso 
                INNER JOIN parametro_valor pv2 ON pv2.codigo=p.codnivel
                INNER JOIN parametro_valor pv ON pv.codigo=s.codestado " . $where . " 
                ORDER BY s.codigo DESC";
    $res = $this->table($sql);
    return $res;
  }

  public function loadSolicitudesDetalle($codsolicitud)
  {
    $sql="SELECT sd.* , a.nombre as area, pv.nombre as estado, u.usuario, an.codarea, an.codnivel, s.codestudiante,
          (SELECT count(*) FROM solicitud_novedad WHERE codsolicitud_detalle=sd.codigo) as novedades
          FROM solicitud_detalle sd INNER JOIN area_nivel an ON sd.codarea_nivel=an.codigo
          INNER JOIN solicitud s ON s.codigo=sd.codsolicitud
          INNER JOIN area a ON a.codigo=an.codarea
          INNER JOIN parametro_valor pv ON pv.codigo=sd.codestado
          LEFT JOIN usuarios u ON u.codigo_usu=sd.codusuario WHERE  a.codestado=:codestado AND sd.codsolicitud=:codsolicitud ";
    $params = array(':codsolicitud'=>$codsolicitud, ':codestado'=>4);
    $res = $this->table($sql,$params);
    return $res;
  }

  public function checkoutSolicitudDetalle($codigo, $codestado, $codusuario)
  {
    $sql="UPDATE solicitud_detalle SET codestado=:codestado, codusuario=:codusuario, fechaactualizacion='" . $this->datetimeNow() . "' WHERE codigo=:codigo";
    $params = array(':codigo' => $codigo, ':codestado' => $codestado, ':codusuario' => $codusuario);

    if($this->query($sql,$params)){
      return true;
    }
    else{
      return false;
    }
  }

  public function buscarSolicitudDetalleAceptadas($codsolicitud)
  {
    $sql="SELECT 1 FROM solicitud_detalle WHERE codsolicitud = :codsolicitud AND codestado=:codestado";
    $params = array(':codsolicitud'=>$codsolicitud, ':codestado' => 1);
    $res = $this->row($sql,$params);
    return $res;
  }

   public function checkoutSolicitud($codigo, $codusuario, $codestado)
  {
    $sql="UPDATE solicitud SET codestado=:codestado, codusuario=:codusuario, fechaactualizacion='" . $this->datetimeNow() . "' WHERE codigo=:codigo";
    $params = array(':codigo' => $codigo, ':codestado' => $codestado, ':codusuario' => $codusuario);

    if($this->query($sql,$params)){
      return true;
    }
    else{
      return false;
    }
  }

  public function buscarAreayUsuario($codarea, $codusuario)
  {
    $sql="SELECT an.codarea
          FROM usuario_area ua INNER JOIN area_nivel an ON ua.codarea_nivel=an.codigo
          INNER JOIN area a ON a.codigo=an.codarea
          WHERE ua.codusuario=:codusuario AND ua.codarea_nivel=:codarea";
    $params = array(':codarea'=>$codarea, ':codusuario' => $codusuario);
    $res = $this->row($sql,$params);
    return $res;
  }

  public function buscarProcesoxNivelFechas($codnivel)
  {
    $sql="SELECT * FROM proceso WHERE codnivel = :codnivel AND ('" . $this->datetimeNow() . "' BETWEEN fechainicio AND fechafin)";
    $params = array(':codnivel'=>$codnivel);
    $res = $this->row($sql,$params);
    return $res;
  }

  public function buscarEstudiantexNivel($identificacion, $codnivel)
  {
    $sql="SELECT en.* FROM estudiante_nivelestudio en INNER JOIN estudiante e ON e.codigo=en.codestudiante WHERE en.codnivel=:codnivel AND e.identificacion=:identificacion";
    $params = array(':codnivel'=>$codnivel, ':identificacion'=>$identificacion);
    $res = $this->row($sql,$params);
    return $res;
  }

  public function buscarCodEstudiantexCodNivel($codestudiante, $codnivel, $codprograma)
  {
    $sql="SELECT en.* FROM estudiante_nivelestudio en WHERE en.codnivel=:codnivel AND en.codestudiante=:codestudiante AND codprograma=:codprograma";
    $params = array(':codnivel'=>$codnivel, ':codestudiante'=>$codestudiante, ':codprograma'=>$codprograma);
    $res = $this->row($sql,$params);
    return $res;
  }

  public function buscarIdEstudiantexCodPrograma($identificacion, $codprograma)
  {
    $sql="SELECT en.* FROM estudiante_nivelestudio en INNER JOIN estudiante e ON e.codigo= en.codestudiante WHERE e.identificacion=:identificacion AND codprograma=:codprograma";
    $params = array(':identificacion'=>$identificacion, ':codprograma'=>$codprograma);
    $res = $this->row($sql,$params);
    return $res;
  }

  public function buscarSolicitudFechasxEstudiante($codestudiante, $codnivel)
  {
    $sql="SELECT s.* FROM solicitud s INNER JOIN proceso p ON p.codigo=s.codproceso WHERE s.codestudiante=:codestudiante AND p.codnivel=:codnivel AND ('" . $this->datetimeNow() . "' BETWEEN p.fechainicio AND p.fechafin)";
    $params = array(':codestudiante'=>$codestudiante, ':codnivel'=>$codnivel);
    $res = $this->row($sql,$params);
    return $res;
  }

  public function buscarNombreNivel($codnivel)
  {
    $sql="SELECT * FROM parametro_valor WHERE codigo=:codnivel ";
    $params = array(':codnivel'=>$codnivel);
    $res = $this->row($sql,$params);
    return $res;
  }

  public function cargarNivelesxIDEstudiante($identificacion)
  {
    $sql="SELECT en.*, pv.nombre FROM estudiante_nivelestudio en INNER JOIN estudiante e ON e.codigo=en.codestudiante INNER JOIN parametro_valor pv ON pv.codigo=en.codnivel WHERE e.identificacion=:identificacion";
    $params = array(':identificacion'=>$identificacion);
    $res = $this->row($sql,$params);
    return $res;
  }

  public function buscarNivelesxIDEstudiante($identificacion,$codnivel)
  {
    $sql="SELECT en.*, pv.nombre, pv.aux FROM estudiante_nivelestudio en INNER JOIN estudiante e ON e.codigo=en.codestudiante INNER JOIN parametro_valor pv ON pv.codigo=en.codnivel WHERE e.identificacion=:identificacion AND codnivel=:codnivel";
    $params = array(':identificacion'=>$identificacion, ':codnivel'=>$codnivel);
    $res = $this->row($sql,$params);
    return $res;
  }

  public function buscarNivelesxIDEstudiantexProcesos($identificacion,$codnivel)
  {
    $sql="SELECT en.*, pv.nombre, pv.aux, s.* FROM estudiante_nivelestudio en INNER JOIN estudiante e ON e.codigo=en.codestudiante INNER JOIN parametro_valor pv ON pv.codigo=en.codnivel INNER JOIN solicitud s ON s.codestudiante=e.codigo WHERE e.identificacion=:identificacion AND codnivel=:codnivel ORDER BY s.codproceso DESC";
    $params = array(':identificacion'=>$identificacion, ':codnivel'=>$codnivel);
    $res = $this->row($sql,$params);
    return $res;
  }

  public function buscarEstudiante($identificacion)
  {
    $sql="SELECT * FROM estudiante e  WHERE e.identificacion=:identificacion";
    $params = array(':identificacion'=>$identificacion);
    $res = $this->row($sql,$params);
    return $res;
  }


  public function insertEstudiante($txtID, $txtNombre, $txtApellido, $txtDireccion, $txtTelefono, $txtCelular, $txtEmail)
  {
    $sql="INSERT INTO estudiante (identificacion, nombre, apellido, direccion, telefono, celular, email) VALUES (:txtID, :txtNombre, :txtApellido, :txtDireccion, :txtTelefono, :txtCelular, :txtEmail) RETURNING codigo";
    $params = array(':txtID' => $txtID, ':txtNombre' => $txtNombre, ':txtApellido' => $txtApellido, ':txtDireccion' => $txtDireccion, ':txtTelefono' => $txtTelefono, ':txtCelular' => $txtCelular, ':txtEmail' => $txtEmail);

   return $this->DataRow($sql,$params);
  }

  public function insertEstudianteNivel($codestudiante, $codnivel, $codprograma)
  {
    $sql="INSERT INTO estudiante_nivelestudio (codestudiante, codnivel, codprograma) VALUES (:codestudiante, :codnivel, :codprograma)";
    $params = array(':codestudiante' => $codestudiante, ':codnivel' => $codnivel, ':codprograma' => $codprograma);

    if($this->query($sql,$params)){
      return true;
    }
    else{
      return false;
    }
  }

  public function insertSolicitud($codestudiante, $codproceso)
  {
    $insert="INSERT INTO solicitud (codestudiante, fechasolicitud, codproceso) VALUES (:codestudiante, '" . $this->datetimeNow() . "', :codproceso) RETURNING codigo";
    $params = array(':codestudiante' => $codestudiante, ':codproceso' => $codproceso);

    $res = $this->DataRow($insert,$params);
      return $res;  
  }

  public function loadAreasxNivel($codnivel)
  {
    $sql="SELECT * FROM area_nivel WHERE codnivel=:codnivel";
    $params = array(':codnivel'=>$codnivel);
    $res = $this->table($sql,$params);
    return $res;
  }

  public function insertSolicitudDetalle($codsolicitud, $codarea_nivel)
  {
    $sql="INSERT INTO solicitud_detalle (codsolicitud, codarea_nivel, fecha) VALUES (:codsolicitud, :codarea_nivel, '" . $this->datetimeNow() . "')";
    $params = array(':codsolicitud' => $codsolicitud, ':codarea_nivel' => $codarea_nivel);

    if($this->query($sql,$params)){
      return true;
    }
    else{
      return false;
    }
  }

  public function buscarProgramaCiclo($codprograma)
  {
    $sql="SELECT * FROM programa_ciclos WHERE codprograma=:codprograma";
    $params = array(':codprograma'=>$codprograma);
    $res = $this->row($sql,$params);
    return $res;
  }

  public function buscarProgramaNivel($codprograma, $codnivel)
  {
    $sql="SELECT * FROM programa_ciclos WHERE codprograma=:codprograma AND codnivel=:codnivel";
    $params = array(':codprograma'=>$codprograma, ':codnivel'=>$codnivel);
    $res = $this->row($sql,$params);
    return $res;
  }

  public function floadNovedades($codsolicitud_detalle)
  {
    $sql="SELECT sn.* FROM solicitud_novedad sn WHERE codsolicitud_detalle=:codsolicitud_detalle ORDER BY fecha DESC";
    $params = array(':codsolicitud_detalle'=>$codsolicitud_detalle);
    $res = $this->table($sql,$params);
    return $res;
  }

  public function insertItemNovedad($usuario, $comentario, $codsolicitud_detalle)
  {
    $insert="INSERT INTO solicitud_novedad (usuario, fecha, comentario, codsolicitud_detalle) VALUES (:usuario, '" . $this->datetimeNow() . "', :comentario, :codsolicitud_detalle)";
    $params = array(':usuario' => $usuario, ':comentario' => $comentario, ':codsolicitud_detalle' => $codsolicitud_detalle);

    if($this->query($insert,$params)){
      return true;
    }
    else{
      return false;
    } 
  }

   public function floadAreasxEstudiantexNivel($codestudiante, $codnivel)
    {
      $sql="SELECT sd.*, a.nombre as area,
            (SELECT usuario FROM usuarios WHERE codigo_usu=sd.codusuario) as usuario,
            (SELECT nombre FROM parametro_valor WHERE codigo=sd.codestado) as estado 
            FROM solicitud_detalle sd INNER JOIN solicitud s ON sd.codsolicitud=s.codigo
            INNER JOIN proceso p ON p.codigo=s.codproceso
            INNER JOIN area_nivel an ON an.codigo=sd.codarea_nivel
            INNER JOIN area a ON a.codigo=an.codarea
            WHERE s.codestudiante=:codestudiante AND p.codnivel=:codnivel";
      $params = array(':codestudiante'=>$codestudiante, ':codnivel'=>$codnivel);
      $res = $this->table($sql,$params);
      return $res;
    }

    public function cantSolicitudesxArea($codarea_nivel)
    {
      $sql="SELECT count(*) as total FROM solicitud_detalle WHERE codarea_nivel=:codarea_nivel AND codestado!=:codestado";
      $params = array(':codarea_nivel'=>$codarea_nivel, ':codestado'=>3);
      $res = $this->row($sql,$params);
      return $res;
    }

    public function cantSolicitudesxAreaxAdmin($codarea)
    {
      $sql="SELECT count(*) as total FROM solicitud_detalle sd INNER JOIN area_nivel an ON an.codigo=sd.codarea_nivel WHERE an.codarea=:codarea AND sd.codestado!=:codestado";
      $params = array(':codarea'=>$codarea, ':codestado'=>3);
      $res = $this->row($sql,$params);
      return $res;
    }

    public function buscarLinkEgresado($codestudiante, $codnivel, $codarea, $link)
    {
      $sql="SELECT 1 FROM estudiante_linkegresados WHERE codestudiante = :codestudiante AND codnivel=:codnivel AND link=:link AND codarea=:codarea";
      $params = array(':codestudiante'=>$codestudiante, ':codnivel' => $codnivel, ':codarea'=>$codarea, ':link'=>$link);
      $res = $this->row($sql,$params);
      return $res;
    }

    public function cargarLinkEgresadoSinLink($codestudiante, $codnivel, $codarea)
    {
      $sql="SELECT * FROM estudiante_linkegresados WHERE codestudiante = :codestudiante AND codnivel=:codnivel AND codarea=:codarea";
      $params = array(':codestudiante'=>$codestudiante, ':codnivel' => $codnivel, ':codarea'=>$codarea);
      $res = $this->table($sql,$params);
      return $res;
    }

    public function insertlinkegresados($codestudiante, $codnivel, $codarea, $link)
    {
      $insert="INSERT INTO estudiante_linkegresados (codestudiante, codnivel, link, codarea) VALUES (:codestudiante, :codnivel, :link, :codarea)";
      $params = array(':codestudiante'=>$codestudiante, ':codnivel' => $codnivel, ':codarea'=>$codarea, ':link'=>$link);

      if($this->query($insert,$params)){
        return true;
      }
      else{
        return false;
      } 
    }

    public function uploadEvidencia($file, $extension, $url, $codestudianteGet, $codnivelGet, $usuario, $mimetype)
    {
      $sql="INSERT INTO solicitud_archivo (fechacreado, codestudiante, codnivel, nombrearchivo, ext, url, inusuario, mimetype) VALUES ('" . $this->datetimeNow() . "', :codestudiante, :codnivel, :file, :extension, :url, :usuario, :mimetype)";
      $params = array(':file' => $file, ':extension' => $extension, ':url'=>$url, ':codestudiante'=>$codestudianteGet, ':codnivel' => $codnivelGet, ':usuario' => $usuario, 'mimetype'=>$mimetype);

      if($this->query($sql,$params)){
        return true;
      }
      else{
        return false;
      }
    }

    public function uploadEvidenciaNovedades($file, $extension, $url, $codsolicitud_novedad, $usuario, $mimetype)
    {
      $sql="INSERT INTO solicitud_novedad_archivo (fechacreado, codsolicitud_novedad, nombrearchivo, ext, url, inusuario, mimetype) VALUES ('" . $this->datetimeNow() . "', :codsolicitud_novedad, :file, :extension, :url, :usuario, :mimetype)";
      $params = array(':file' => $file, ':extension' => $extension, ':url'=>$url, ':codsolicitud_novedad'=>$codsolicitud_novedad, ':usuario' => $usuario, 'mimetype'=>$mimetype);

      if($this->query($sql,$params)){
        return true;
      }
      else{
        return false;
      }
    }

    public function floadSoporte($codestudiante, $codnivel)
    {
      $sql="SELECT * FROM solicitud_archivo WHERE codestudiante=:codestudiante AND codnivel=:codnivel AND estado=:estado ORDER BY fechacreado DESC";
      $params = array(':codestudiante'=>$codestudiante, ':codnivel'=>$codnivel, ':estado'=>1);
      $res = $this->table($sql,$params);
      return $res;
    }

    public function floadSoportesNovedades($codsolicitud_novedad)
    {
      $sql="SELECT * FROM solicitud_novedad_archivo WHERE codsolicitud_novedad=:codsolicitud_novedad AND estado=:estado ORDER BY fechacreado DESC";
      $params = array(':codsolicitud_novedad'=>$codsolicitud_novedad, ':estado'=>1);
      $res = $this->table($sql,$params);
      return $res;
    }

    public function buscarOKSolicitudes($identificacion, $codnivel)
    {
      $sql="SELECT s.* FROM solicitud s INNER JOIN estudiante e ON s.codestudiante=e.codigo INNER JOIN estudiante_nivelestudio ne ON ne.codestudiante=e.codigo WHERE e.identificacion=:identificacion AND ne.codnivel=:codnivel ORDER BY fechasolicitud DESC";
      $params = array(':identificacion'=>$identificacion, ':codnivel'=>$codnivel);
      $res = $this->row($sql,$params);
      return $res;
    }

    public function deleteSoporte($codigo, $estado, $upusuario)
    {
      $sql="UPDATE solicitud_archivo SET estado=:estado, upusuario=:upusuario, fechaactualizacion='". $this->datetimeNow() ."' WHERE codigo=:codigo";
      $params = array(':codigo' => $codigo, ':estado'=>$estado, ':upusuario'=>$upusuario);

      if($this->query($sql,$params)){
        return true;
      }
      else{
        return false;
      }
    }

    public function deleteSoporteNovedad($codigo, $estado, $upusuario)
    {
      $sql="UPDATE solicitud_novedad_archivo SET estado=:estado, upusuario=:upusuario, fechaactualizacion='". $this->datetimeNow() ."' WHERE codigo=:codigo";
      $params = array(':codigo' => $codigo, ':estado'=>$estado, ':upusuario'=>$upusuario);

      if($this->query($sql,$params)){
        return true;
      }
      else{
        return false;
      }
    }

    public function buscarEcaes($codestudiante, $codnivel)
    {
      $sql="SELECT 1 FROM estudiante_nivelestudio WHERE codestudiante = :codestudiante AND codnivel=:codnivel";
      $params = array(':codestudiante'=>$codestudiante, ':codnivel' => $codnivel);
      $res = $this->row($sql,$params);
      return $res;
    }

    public function actualizarEcaes($codestudiante, $codnivel, $ecaes)
    {
      $sql="UPDATE estudiante_nivelestudio SET ecaes=:ecaes WHERE codestudiante=:codestudiante AND codnivel=:codnivel";
      $params = array(':ecaes' => $ecaes, ':codnivel'=>$codnivel, ':codestudiante'=>$codestudiante);

      if($this->query($sql,$params)){
        return true;
      }
      else{
        return false;
      }
    }

    public function validarFormato($extension)
    {
      $validar = false;
      switch ($extension) {
                case 'bmp':
                  $validar = true;
                  break;
                case 'gif':
                  $validar = true;
                  break;
                case 'jpeg':
                  $validar = true;
                  break;
                case 'jpg':
                  $validar = true;
                  break;
                case 'pdf':
                  $validar = true;
                  break;
                case 'png':
                  $validar = true;
                  break;
              }

      if($validar){
        return true;
      }
      else{
        return false;
      }
    }

    public function validarMime_type($type)
    {
      $validar = false;
      switch ($type) {
                case 'image/bmp':
                  $validar = true;
                  break;
                case 'image/gif':
                  $validar = true;
                  break;
                case 'image/jpeg':
                  $validar = true;
                  break;
                case 'application/pdf':
                  $validar = true;
                  break;
                case 'image/png':
                  $validar = true;
                  break;
              }

      if($validar){
        return true;
      }
      else{
        return false;
      }
    }

}