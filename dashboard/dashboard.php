<?php
    include 'developer/security.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Intranet | Corporación Universitaria Americana</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- TOAST STYLE -->
    <link href="assets/css/toastr.min.css" rel="stylesheet" />


    <!-- JS Scripts-->
    <!-- jQuery Js -->
    
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootbox.min.js"></script>
    <script>
       
    </script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <!-- TOAST SCRIPTS -->
    <script src="assets/js/toastr.min.js"></script>
    <!-- JS Scripts-->

    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function () {
            if(localStorage.pagina){
                loadpag(localStorage.pagina,localStorage.idpagina,localStorage.codsuppag);
                var algo = $('#'+localStorage.idpagina).parents('ul');
                console.log(algo[0]);
                if(algo.hasClass('nav-second-level')){
                    algo.addClass("collapse in");
                }
            }else{
                reloadmenu();
            }
            cantSolicitudesxArea();
        });

    </script>
    <!-- jQuery Js -->
    <style>
    body, html {
    height: 100%;
    background: url(assets/img/intranet.png) no-repeat center center fixed; 
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}
</style>
</head>


<body onload="">
    <div class="desactivarC" style="height: 100%;width: 100%;position: fixed;top: 0;left: 0; z-index: 999999;display:none;"><img src="assets/img/loading.gif" style="margin-left:50%; margin-top:300px;width: 60px;"></div>
    <div id="wrapper">
        
        <!--/. header -->
            <?php include 'component/header.php' ?>
            
        <!-- fin header -->
        
        <div id="menuu">
        <!--/. Menú principal  -->
            <?php
             // include 'component/menu.php' 
             ?>
        <!-- fin Menú principal -->
        </div>

        <!-- /. Pagina  -->
        <div id="page-wrapper">
            <div id="page-inner">

             <div id="contenido">
                    
                   
                </div>
                <!-- /. footer  -->
                <?php include 'component/footer.php' ?>
                <!-- /. footer  -->

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. Fin Pagina  -->
    </div>
    <!-- /. WRAPPER  -->

<div class="loading">
    
</div>
    
</body>

</html>

