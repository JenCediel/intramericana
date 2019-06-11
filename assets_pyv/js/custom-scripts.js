/*------------------------------------------------------
    Author : www.webthemez.com
    License: Commons Attribution 3.0
    http://creativecommons.org/licenses/by/3.0/
---------------------------------------------------------  */

(function ($) {
    "use strict";
    var mainApp = {

        initFunction: function () {
            /*MENU 
            ------------------------------------*/
            $('#main-menu').metisMenu();
			
            $(window).bind("load resize", function () {
                if ($(this).width() < 768) {
                    $('div.sidebar-collapse').addClass('collapse')
                } else {
                    $('div.sidebar-collapse').removeClass('collapse')
                }
            });     
        },

        initialization: function () {
            mainApp.initFunction();

        }

    }
    // Initializing ///

    $(document).ready(function () {
        $('[data-rel="tooltip"]').tooltip(); 
        mainApp.initFunction();
    });

}(jQuery));



function loadpag(data,id,codsup){
    // $( "#menuu" ).load('component/menu2.php', function() {
        localStorage.setItem('pagina',data);
        localStorage.setItem('idpagina',id);
        localStorage.setItem('codsuppag',codsup);

        
        $("#contenido").load(data);
        reloadmenu();
    // });
}

function reloadmenu(){
    $( "#menuu" ).load('component/Menu', function() {
        // $('#li').has('ul').children('ul').removeClass('in');
        $('#main-menu').metisMenu();
        $("#main-menu li a").removeClass("active-menu");
        $("#m"+localStorage.idpagina).addClass("active-menu");
        $('#li_'+localStorage.codsuppag).has('ul').children('ul').addClass('collapse in');
        $('#main-menu li').not('.active').has('ul').children('ul').addClass('collapse');
    });
}

/*//////////////////////////////////////////////////////////////////////////////*/
function combobox(id,url,inival,params){
 var localurl=url;
  $.ajax({
        url:localurl,
        type:"POST",
        data:{params:params},
        jsonpCallback:id,
        dataType:"JSON",
        success:function (json){
           var option="<option value=''>"+inival+"</option>";
           $.each(json,function(k,v){
            option+="<option value='"+v.cod+"'>"+v.nombre+"</option>";
           });
            // console.log(option);
           $("#"+id).html(option);
           
        }
  });
}

/*//////////////////////////////////////////////////////////////////////////////*/
 function doSearch(val,table) {
    /*var tableReg = document.getElementById('table');*/
    var tableReg=document.getElementById(""+table);
    var searchText =$("#"+val).val().toLowerCase();
    /*var searchText = document.getElementById('buscar').value.toLowerCase();*/
    for (var i = 1; i < tableReg.rows.length; i++) {
        var cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
        var found = false;
        for (var j = 0; j < cellsOfRow.length && !found; j++) {
            var compareWith = cellsOfRow[j].innerHTML.toLowerCase();
            if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1)) {
                found = true;
            }
        }
        if (found) {
            tableReg.rows[i].style.display = '';
        } else {
            tableReg.rows[i].style.display = 'none';
        }
    }
}
