<?php
    session_start();
    require_once '../classes/Menu.php';
    $html = '';

    $codrol = $_SESSION["PYS_codrol"];

    $m = new Menu();

    $rowrolesmenu = $m->rolesMenu($codrol);

    if($rowrolesmenu != '')
    {
        $modulos = explode(',',$rowrolesmenu[0]["menus"]);
        

        $table = $m->listarMenuxNivelUno();

        if($table != ''){

            $i = 1;
            foreach ($table as $datarow => $data) {

                $submenu = $m->listarSubmenuxCodSuperior($data["codigo_menu"]);

                if(count($submenu) != 0){
                    $as = 0;
                    $html2 = '';
                    foreach ($submenu as $datarow1 => $data1) {
                        $pos = in_array($data1["codigo_menu"], $modulos);
                        if($pos === false){
                        }else{
                            $html2 .= '<li>';
                            $html2 .= '<a onclick="loadpag(\''.$data1["link"].'\',\''.$data1["codigo_menu"].'\',\''.$data["codigo_menu"].'\');" id="m'.$data1["codigo_menu"].'">'.$data1["nombre_menu"].'</a>';
                            $html2 .= '</li>';
                            $as++;
                        }
                    }
                    if($as > 0){
                        $html .= '<li id="li_'.$data["codigo_menu"].'">';
                        $html .= '<a><i class="fa '.$data["imagen"].'"></i> '.$data["nombre_menu"].'<span class="fa arrow"></span></a>';
                        $html .= '<ul class="nav nav-second-level collapse">';
                        $html .= $html2;
                        $html .= '</ul>';
                        $html .= '</li>';

                    }
                }else{
                    $pos = in_array($data["codigo_menu"], $modulos);
                    if($pos === false){
                    }else{
                        $html .= '<li>';
                        $html .= '<a onclick="loadpag(\''.$data["link"].'\',\''.$data["codigo_menu"].'\');" id="m'.$data["codigo_menu"].'"><i class="fa '.$data["imagen"].'"></i> '.$data["nombre_menu"].'</a>';
                        $html .= '</li>'; //class="active-menu" 
                    }
                }
                $i++;
            }

        }

        
        $imp = '<nav class="navbar-default navbar-side" role="navigation"><div class="sidebar-collapse" style="cursor:pointer"><ul class="nav" id="main-menu">'.$html.'</ul></div></nav>';
        echo trim($imp);
    }
?>