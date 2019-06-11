<?php

    include 'developer/security.php';
?>
<div class="row" >
    <div class="col-md-12">
        <h1 class="page-header">
            Asignar menú > perfiles <small></small>
        </h1>
    </div>

    <style>
        .azul, .azul:hover{
            background: #225081;
            border: medium none;
            color: #fff;
        }

        .rojo, .rojo:hover{
            background: rgb(217, 83, 79);
            border: medium none;
            color: #fff;
        }
    </style>

    <!-- comienza contenido -->
    <div class="col-md-12">

        <form role="form">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Seleccione Rol
                </div>
                <div class="panel-body" >
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Rol: </label>
                            <select id="bRol" name="bRol" class="form-control">
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="panel panel-default">
            <div class="panel-heading">
                Listado de Accesos
            </div>
            <div class="panel-body">
                <div style=" float: left;overflow:hidden;">
                    <b>Módulos habilitados: </b><br><br>
                    <div style="overflow-y: scroll;max-height: 400px;">
                        <table id="tbl_moduloshabilitados" class="table table-bordered table-hover" style="width:450px;">
                            <thead>
                                    <th class="ocultarcell" scope="col">Cod Menú</th>
                                    <th scope="col">Modulo</th>
                                    <th scope="col">Seleccionar</th>
                            </thead>
                            </tbody>
                                <tr>
                                    <tr><td colspan="3" class="center">Sin resultados</td></tr>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div style="float: left;overflow:hidden;">
                    <b>Módulos Asigandos/Seleccionados al Perfil</b>
                    <br><br>
                    <div style="overflow-y: scroll;max-height: 400px;">
                        <table id="tbl_modulosasignados" style="width:450px;" class="table table-bordered table-hover">
                            <thead>
                                <th scope="col">Cod Menú</th>
                                <th scope="col">Modulo</th>
                                <th scope="col">Seleccionar</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <tr><td colspan="3" class="center">Sin resultados</td></tr>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="ro">
                    <div class="col-md-12" style="text-align:center">
                        <br>
                        <button type="button" id="btn-guardar" class="btn btn-primary" onclick="fGuardarConfig();">Guardar configuración</button>
                        <button type="button" class="btn btn-default" onclick="loadmenus();">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
  
</div>



<script>
    var modu = [];
    $(document).ready(function () {
        $('[data-rel="tooltip"]').tooltip(); 
        $("#btn-guardar").attr('disabled',true);
        combobox('bRol','developer/Lopersa/loadRol','Seleccione...');

        /*////////////////////////////////////////////////////////////////*/
        $("#bRol").change(function(){
          modu=[];
          if($("#bRol").val()!=''){
            loadmenus();
          }else{
            $("#tbl_moduloshabilitados tbody").html('<tr><td colspan="3" class="center">Sin resultados</td></tr>');
            $("#tbl_modulosasignados tbody").html('<tr><td colspan="3" class="center">Sin resultados</td></tr>');
            $("#btn-guardar").attr('disabled',true);
          }
        });

    });


    function loadmenus(){
        $("#tbl_moduloshabilitados tbody").html('<tr><td colspan="3" class="center">Cargado...</td></tr>');
        $("#tbl_modulosasignados tbody").html('<tr><td colspan="3" class="center">Cargado...</td></tr>');
        $.ajax({
            url : "developer/Lopersa/loadmodulos",
            type : "POST",
            data : {'codrol':$("#bRol").val()},
            dataType : "JSON",
            success : function (json){
                if(json.success == true){
                    asignados = '';
                    var i=0;
                    if(json.asignados.length != 0){
                        $.each(json.asignados, function (key, data) {
                            asignados += '<tr id="'+data.codmenu+'" name="'+data.codmenu+'">';
                            asignados += '<td align="center">'+data.codmenu+'</td>';
                            asignados += '<td align="center">'+data.nombre_menu+'</td>';
                            asignados += '<td style="width:50px;" align="center">';
                            asignados += '    <input name="menu" value="'+data.codmenu+'" type="checkbox" checked>';
                            asignados += '</td>';
                            asignados += '</tr>';
                            i++;
                            modu.push(data.codmenu);
                            console.log(modu);
                        });
                    }else{
                        // asignados = '<tr><td colspan="3" class="center">Sin resultados</td></tr>';
                    }
                    $("#tbl_modulosasignados tbody").html(asignados);

                    noasignados = '';
                    var j=0;
                    if(json.noasignados.length != 0){
                        $.each(json.noasignados, function (key, data) {
                            noasignados += '<tr id="'+data.codmenu+'" name="'+data.codmenu+'">';
                            noasignados += '<td align="center">'+data.codmenu+'</td>';
                            noasignados += '<td align="center">'+(data.nivel==1 ? '<b>'+data.nombre_menu+'</b>' : data.nombre_menu)+'</td>';
                            noasignados += '<td style="width:50px;" align="center">';
                            noasignados += '    <input name="menu" value="'+data.codmenu+'" type="checkbox">';
                            noasignados += '</td>';
                            noasignados += '</tr>';
                            j++;
                        });
                    }else{
                        // noasignados = '<tr><td colspan="3" class="center">Sin resultados</td></tr>';
                    }
                    $("#tbl_moduloshabilitados tbody").html(noasignados);
                }
            }, complete: function(){

                $('input[name=menu]').click(function() {    
                  if($(this).is(":checked"))
                  {        
                    var tr = $(this).parents("tr").appendTo("#tbl_modulosasignados tbody");
                    modu.push($(this).val());
                    console.log(modu);
                  }else{
                    var index = modu.indexOf($(this).val());        
                    modu.splice(index, 1);        
                    var tr=$(this).parents("tr").appendTo("#tbl_moduloshabilitados tbody"); 
                  }
                });
                $("#btn-guardar").attr('disabled',false);
            }
        });
    }
    

    function fGuardarConfig(){

        $.ajax({
            url : "developer/Lopersa/updateConfigRolmenu",
            type : "POST",
            data : "codrol="+$("#bRol").val()+"&menus="+modu,
            dataType : "JSON",
            success : function (json){
                if(json.success == true){
                    modu=[];
                    toastr.success("Información guardada exitosamente");
                    loadmenus();
                    reloadmenu();
                }else{
                    toastr.error(json.mensaje);
                }
            }
        });

    }




</script>

