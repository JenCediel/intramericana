<?php 
require_once '../developer/PDOConn.php';

class Procesos extends db
{

  public function loadProcesos()
  {    
    $sql="SELECT p.*, pv.nombre as nivel, u.usuario FROM proceso p INNER JOIN parametro_valor pv ON p.codnivel=pv.codigo INNER JOIN usuarios u ON u.codigo_usu=p.codusuario ORDER BY p.fecharegistro DESC";
    $res = $this->table($sql);
    return $res;

  }

  public function floadProcesos()
  {    
    $sql="SELECT CONCAT_WS(' ', p.nombre,', ',to_char(p.fechainicio, 'DD/MM/YYYY'),' - ',to_char(p.fechafin, 'DD/MM/YYYY'),', ',pv.nombre) as nombre, p.codigo FROM proceso p INNER JOIN parametro_valor pv ON p.codnivel=pv.codigo ORDER BY p.fecharegistro DESC";
    $res = $this->table($sql);
    return $res;

  }
  
  public function editItemProceso($codusuario, $nombre_proceso, $fechainicio, $fechafin, $codigo, $codnivel)
  {
      $update = "UPDATE proceso SET codusuario = :codusuario, nombre = :nombre, fechainicio = :fechainicio, fechafin = :fechafin, codnivel = :codnivel, fechaactualizacion=:fechaactualizacion WHERE codigo = :codigo";   
      $params = array(':codusuario' => $codusuario, ':nombre' => $nombre_proceso,':fechainicio' => $fechainicio, ':fechafin' => $fechafin, ':codigo' => $codigo, ':codnivel' => $codnivel, ':fechaactualizacion' => $this->datetimeNow(),);
      $res = $this->query($update, $params);
      return $res;
  }


  public function insertItemProceso($codusuario, $nombre, $fechainicio, $fechafin, $codnivel)
  {

    $dateinicio = str_replace('/', '-', $fechainicio);
    $fechainicio =  date('Y-m-d', strtotime($dateinicio));

    $datefin = str_replace('/', '-', $fechafin);
    $fechafin =  date('Y-m-d', strtotime($datefin));

    $insert = "INSERT INTO proceso (codusuario, nombre, fechainicio, fechafin, fecharegistro ,codnivel) VALUES (:codusuario, :nombre, :fechainicio, :fechafin, :fecharegistro, :codnivel)";
    $paramsInsert = array(
        ':codusuario' => $codusuario,
        ':nombre' => $nombre,
        ':fechainicio' => $fechainicio,
        ':fechafin' => $fechafin,
        ':fecharegistro' => $this->datetimeNow(),
        ':codnivel' => $codnivel
        );
      $res = $this->table($insert, $paramsInsert);
      return $res;
  }


  public function buscarProceso($nombre_proceso, $where)
  {
    $sql="SELECT codigo, nombre, fechainicio, fechafin, codnivel, fecharegistro, nivel, usuario, target FROM proceso WHERE nombre LIKE '%".$nombre_proceso."%' ".$where." ORDER BY codigo ASC";
    $res = $this->table($sql);
    return $res;
  }

}