<?php 
require_once '../developer/PDOConn.php';

class Areas extends db
{

  public function loadAreas()
  {
    $sql="SELECT sa.*, pv.nombre as estado FROM area sa INNER JOIN parametro_valor pv ON sa.codestado=pv.codigo WHERE pv.codparametro=:codparametro ORDER BY sa.nombre ASC";
    $params = array(':codparametro'=>2);
    $res = $this->table($sql,$params);
    return $res;
  }

  public function floadEstado($codparametro)
  {
    $sql="SELECT pv.* FROM parametro p INNER JOIN parametro_valor pv ON p.codigo=pv.codparametro WHERE pv.codparametro=:codparametro ORDER BY pv.aux ASC ";
    $params = array(':codparametro'=>$codparametro);
    $res = $this->table($sql,$params);
    return $res;
  }

  public function floadEstadoSinEspecializacion($codparametro)
  {
    $sql="SELECT pv.* FROM parametro p INNER JOIN parametro_valor pv ON p.codigo=pv.codparametro WHERE pv.codparametro=:codparametro AND pv.codigo!=:codigo ORDER BY pv.aux ASC ";
    $params = array(':codparametro'=>$codparametro, ':codigo'=>11);
    $res = $this->table($sql,$params);
    return $res;
  }

  public function floadEstadoSinRechazado($codparametro)
  {
    $sql="SELECT pv.* FROM parametro p INNER JOIN parametro_valor pv ON p.codigo=pv.codparametro WHERE pv.codparametro=:codparametro AND PV.codigo!=:codigo AND PV.codigo!=:codigo2 ORDER BY pv.nombre ASC ";
    $params = array(':codparametro'=>$codparametro, ':codigo'=>2, ':codigo2'=>13);
    $res = $this->table($sql,$params);
    return $res;
  }

  public function insertarArea($nombre)
  {
    $sql="INSERT INTO area (nombre) VALUES (:nombre)";
     $params = array(':nombre' => $nombre);
    //$this->query($sql,$params);

    if($this->query($sql,$params)){
      return true;
    }
    else{
      return false;
    }
  }

   public function buscarAreaxNivel($nombre_area)
  {
    $sql="SELECT 1 FROM area WHERE nombre = :nombre_area";
    $params = array('nombre_area'=>$nombre_area);
    $res = $this->row($sql,$params);
    return $res;
  }

  public function editItemArea($nombre, $codestado, $codigo)
  {
    $sql="UPDATE area SET nombre=:nombre, codestado=:codestado WHERE codigo=:codigo";
     $params = array(':nombre' => $nombre, ':codestado' => $codestado, ':codigo' => $codigo);
    if($this->query($sql,$params)){
      return true;
    }
    else{
      return false;
    }
  }

  public function buscarArea($nombre_area, $where)
  {
    $sql="SELECT sa.*, pv.nombre as estado, (SELECT nombre FROM parametro_valor WHERE codigo=sa.codnivel) as nivel FROM area sa INNER JOIN parametro_valor pv ON sa.codestado=pv.codigo WHERE sa.nombre LIKE '%".$nombre_area."%' ".$where."";
    $res = $this->table($sql);
    return $res;
  }

  public function buscarAreasxUsuario($codusuario)
  {
    $sql="SELECT an.* FROM usuario_area ua INNER JOIN area_nivel an ON an.codigo=ua.codarea_nivel WHERE ua.codusuario = :codusuario";
    $params = array(':codusuario' => $codusuario);
    $res = $this->table($sql,$params);
    return $res;
  }

  //Consulta para cargar select  
  public function selectAreas()
  {
    $sql="SELECT * FROM area";
    $res = $this->table($sql);
    return $res;
  }
}