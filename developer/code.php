<?php
session_start();
date_default_timezone_set("America/Bogota");
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

$mail->Username = "perezcamilo@americana.edu.co";
$mail->Password = "1001912880";
$mail->SetFrom('admisiones@coruniamericana.edu.co', utf8_decode('Solicitud cambio de contraseña.'));

$mail->AltBody = "";


if(isset($_GET['case'])){
    $case = $_GET['case'];
}

if(isset($_POST['emailRecuperar'])){
    $EmailRecuperar = strtolower($_POST['emailRecuperar']);
}

$createtable = array(
  'data' => array()
);

//Llamados de clases
require_once '../classes/Usuarios.php';

//Creación de objetos
$u = new Usuarios();


switch ($case) {
   /************************ procesos para recuperar correo **************************/
    case 'recuperarUsuario':
      $mail->Subject = utf8_decode("Recuperación de contraseña.");

      $query = $u->validarCorreoRecuperacion($EmailRecuperar);
      if($query){ 
        $token = $u->generatecod();
        $query2 = $u->insertarToken($EmailRecuperar, $token);
        
          if($query2){
           
            $urlconfirmar = $u->urlServer()."ForgotPassword/".$u->base64url_encode($EmailRecuperar.','.$token);

            $html = "<!DOCTYPE html>";
            $html .= "<html>";
            $html .= "<head>";
            $html .= "<title>Correo de confirmacion | Correo de confirmacion</title>";
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
                  background: #1b3357 !important;
                  border: 1px solid #1b3357;
                }
            </style>";
            $html .="</head>";
            $html .="<body>";
            $html .= '<table style="width:100%;max-width:600px" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">';
            $html .= '<tbody>';
            $html .= '<tr>';
            $html .= '<td role="modules-container" style="padding:0px 0px 0px 0px;color:#000000;text-align:left" width="100%" bgcolor="#ffffff" align="left">';
            $html .= '<table style="table-layout:fixed" width="100%" cellspacing="0" cellpadding="0" border="0">';
            $html .= '<tbody>';
            $html .= '<tr>';
            $html .= '<td style="font-size:6px;line-height:10px;padding:0px 0px 0px 0px" valign="top" align="center">';
            // $html .= '<img style="display:block;max-width:100%!important;width:100%;height:auto!important" src="../assets/img/header-email.jpg" width="600" border="0">';
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
            $html .= '<tbody>';
            $html .= '<tr>';
            $html .= '<td style="padding:18px 0px 10px 0px;line-height:22px;text-align:inherit" valign="top" height="100%">';
            $html .= '<div style="text-align:center">';
            $html .= '<span style="font-size:22px";font-family:arial,helvetica,sans-serif">';
            $html .= '<strong>Hola, '.$query['nombre_usu'].'</strong>';
            $html .= '</span></div>';
            $html .= '</td>';
            $html .= '</tr>';

            $html .= '<tr>';
            $html .= '<td style="padding:0px 0px 0px 0px;line-height:22px;text-align:inherit" valign="top" height="100%">';
            $html .= '<p font-style:normal;font-variant-ligatures:normal;font-variant-caps:normal;font-weight:400;font-family:Georgia,"Times New Roman","Bitstream Charter",Times,serif;font-size:16px;text-align:justify;color:rgb(51,51,51)>';
            $html .= '<span style="font-family:arial,helvetica,sans-serif;font-size:16px">';    
            $html .= 'Recibimos una solicitud para acceder a tu cuenta<br>';
            $html .= '<b>'.$EmailRecuperar.'</b><br>';
            $html .= '<i>Si no solicitaste restablecer tu contraseña, es posible que otra persona esté intentando acceder a tu cuenta de <b>Intramericana</b>, haz caso omiso a este correo.</i>';

            $html .= '</span></p>';
            $html .= '</td>';
            $html .= '</tr>';

            $html .= '<tr>';
            $html .= '<td valign="top" height="100%">';
            $html .= '<p style="text-align: center;">';
            $html .= '<a class="button primary-button" style="text-align:center" href="'.$urlconfirmar.'">CAMBIAR CONTRASEÑA</a>';
            $html .= '</span></p>';
            $html .= '</td>';
            $html .= '</tr>';

            $html .= '</tbody>';
            $html .= '</table>';
      
            $html .= '<table style="table-layout:fixed" width="100%" cellspacing="0" cellpadding="0" border="0">';
            $html .= '<tbody>';
            $html .= '<tr>';
            $html .= '<td style="font-size:6px;line-height:10px;padding:0px 0px 0px 0px" valign="top" align="center">';
            // $html .= '<img style="display:block;max-width:100%!important;width:100%;height:auto!important" src="../assets/img/footer-email.jpg" alt="" tabindex="0" width="600" border="0">';
            $html .= '</td>';
            $html .= '</tr>';
            $html .= '</tbody></table>';
            $html .= '</td>';
            $html .= '</tr>';
            $html .= '</tbody>';
            $html .= '</table>';
            $html .= '</body>';
            $html .= '</html>';
            $mail->MsgHTML($html);
            $mail->AddAddress($EmailRecuperar,"");

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
              $json = json_encode(array("success" => true, "mensaje"=>"Correo enviado exitosamente.")); 
            }else{
              $json=json_encode(array("success"=>true,"mensaje"=>$mail->ErrorInfo));
            }  
          }else{
            $json = json_encode(array("success" =>false,"mensaje"=>"No se insertó el Usuario"));
          }
      }else{
        $json = json_encode(array("success"=>false,"mensaje" => "Correo electrónico invalido."));
      }
    break;

    case 'changePass':
      $row = $u->BuscarCorreo($EmailRecuperar);

      if($row != ''){
        if($row['password']!=sha1($Pass)){
          $query = $u->EditarContraseña(sha1($Pass), $row['codigo_usu']);
          if($query){
            $json = json_encode(array("success"=>true));
          }else{
            $json = json_encode(array("success"=>false,"mensaje" => "No se Actualizó la información. Por favor, intentelo de nuevo"));
          }
        }else{
          $json = json_encode(array("success"=>false,"mensaje" => "Su nueva contraseña coincide con la anterior"));
        }
      }else{
          $json = json_encode(array("success"=>false,"mensaje" => "Error"));
      }
    break;

}
echo $json;

?>

