<?php
require_once '../developer/PDOConn.php';

class Funcionario extends db
{


    public function insertarFuncionario($ntxtNombre, $ntxtCargo, $ntxtExtension, $nTxtArea, $nTxtCorreo, $contra)
    {
        $sql = "INSERT INTO funcionario (nombre, area, extension, correo, cargo, contraseña) VALUES (:nombre, :area, :extension, :correo, :cargo, :contra)";
        $params = array(':nombre' => $ntxtNombre, ':area' => $nTxtArea, ':extension' => $ntxtExtension, ':correo' => $nTxtCorreo, ':cargo' => $ntxtCargo, ':contra' => $contra);

        $res = $this->query($sql, $params);

        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    public function loadFuncionario($whe)
    {

        $sql = "SELECT fu.codigo_funcionario, fu.estado, fu.nombre, fu.area, fu.extension, fu.correo, ar.nombre as nombrearea, fu.cargo
      FROM funcionario fu
      INNER JOIN area ar ON ar.codigo = fu.area ORDER BY codigo_funcionario ASC";
        $res = $this->table($sql);
        return $res;
    }

    public function editEstadoFuncionario($codusuario, $estado)
    {
        $update = "UPDATE funcionario SET estado = :estado WHERE codigo_funcionario = :codusuario";
        $params = array(':codusuario' => $codusuario, ':estado' => $estado);
        $res = $this->table($update, $params);
        return $res;
    }

    
    public function editModalFuncionario($usuario, $cargo, $extension, $area, $Correo ,$codigo)
    {
        $update = "UPDATE funcionario SET nombre = :usuario, area = :area, extension = :extension, correo = :Correo, cargo = :cargo WHERE codigo_funcionario = :codigo";
        $params = array(':codigo' => $codigo, ':usuario' => $usuario, ':cargo' => $cargo, ':extension' => $extension, ':area' => $area, ':Correo' => $Correo);
        $res = $this->table($update, $params);
        return $res;
    }
}
