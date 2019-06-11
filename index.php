<?php
  include 'developer/security.php';
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="img/favicon.ico" type="image/x-icon" />
    <title>Intramerica | Corporación Universitaria Americana</title>
    <?php include("partials/styles.php"); ?>
  </head>

  <body>
    <?php include("partials/header.php"); ?>
    <!--================Slider Area =================-->
    <div
      id="carousel-example-generic"
      class="carousel slide"
      data-ride="carousel"
      style="margin-bottom: 4px;"
    >
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li
          data-target="#carousel-example-generic"
          data-slide-to="0"
          class="active"
        ></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>
      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="img/home-slider/slider-m-1.jpg " alt="" />
          <div class="carousel-caption">
            <h1>Texto Bonito 2.</h1>
          </div>
        </div>
        <div class="item">
          <img src="img/home-slider/slider-m-2.png" alt="" />
          <div class="carousel-caption">
            <h1>Feliz Cumpleaños.</h1>
          </div>
        </div>
        <div class="item">
          <img src="img/home-slider/slider-m-1.jpg" alt="" />
          <div class="carousel-caption">
            <h1>Texto bonito</h1>
          </div>
        </div>
      </div>
      <!-- Controls -->
      <a
        class="left carousel-control"
        href="#carousel-example-generic"
        role="button"
        data-slide="prev"
      >
        <span
          class="glyphicon glyphicon-chevron-left"
          aria-hidden="true"
        ></span>
        <span class="sr-only">Previous</span>
      </a>
      <a
        class="right carousel-control"
        href="#carousel-example-generic"
        role="button"
        data-slide="next"
      >
        <span
          class="glyphicon glyphicon-chevron-right"
          aria-hidden="true"
        ></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <section
      class="feature_area"
      style="background-color: #0053A0; background: url('img/back.jpg'); background-size:cover; background-position: center;"
    >
      <div class="container">
        <div class="row feature_inner">
          <div class="col">
            <div class="feature_item edit">
              <div class="f_icon">
                <img src="img/icon/reloj.png" alt="" />
              </div>
              <h4 style="font-size: 17px;">NOVEDADES</h4>
              <p>Máximo 2 líneas</p>
              <a class="more_btnb possbtn" href="#">Ver</a>
            </div>
          </div>
          <div class="col">
            <div class="feature_item edit">
              <div class="f_icon">
                <img src="img/icon/directorio.png" alt="" />
              </div>
              <h4 style="font-size: 17px;">DIRECTORIO</h4>
              <p>Máximo 2 líneas</p>
              <a class="more_btnb possbtn" href="directorio.html">Ver</a>
            </div>
          </div>
          <div class="col">
            <div class="feature_item edit">
              <div class="f_icon">
                <img src="img/icon/procedimientos.png" alt="" />
              </div>
              <h4 style="font-size: 17px;">PROCEDIMIENTOS</h4>
              <p>Máximo 2 líneas</p>
              <a class="more_btnb possbtn" href="#">Ver</a>
            </div>
          </div>
          <div class="col">
            <div class="feature_item edit">
              <div class="f_icon">
                <img src="img/icon/convenios.png" alt="" />
              </div>
              <h4 style="font-size: 17px">CONVENIOS EMPRESARIALES</h4>
              <p>Máximo 2 líneas</p>
              <a class="more_btnb possbtn" href="#">Ver</a>
            </div>
          </div>
        </div>
        <div class="row feature_inner" style="margin-top: -32px">
          <div class="col">
            <div class="feature_item edit">
              <div class="f_icon">
                <img src="img/icon/cumpleaños.png" alt="" />
              </div>
              <h4 style="font-size: 17px;">CUMPLEAÑOS</h4>
              <p>Máximo 2 líneas</p>
              <a class="more_btnb possbtn" href="#">Ver</a>
            </div>
          </div>
          <div class="col">
            <div class="feature_item edit">
              <div class="f_icon">
                <img src="img/icon/libretos.png" alt="" />
              </div>
              <h4 style="font-size: 17px;">LIBRETOS</h4>
              <p>Máximo 2 líneas</p>
              <a class="more_btnb possbtn" href="#">Ver</a>
            </div>
          </div>
          <div class="col">
            <div class="feature_item edit">
              <div class="f_icon">
                <img src="img/icon/requerimientos.png" alt="" />
              </div>
              <h4 style="font-size: 17px;">REQUERIMIENTOS</h4>
              <p>Máximo 2 líneas</p>
              <a class="more_btnb possbtn" href="#">Ver</a>
            </div>
          </div>
          <div class="col">
            <div class="feature_item edit">
              <div class="f_icon">
                <img src="img/icon/beneficios.png" alt="" />
              </div>
              <h4 style="font-size: 17px;">BENEFICIOS EMPLEADOS</h4>
              <p>Máximo 2 líneas</p>
              <a class="more_btnb possbtn" href="#" style="margin-bottom: 10px;"
                >Ver</a
              >
            </div>
          </div>
        </div>
        <br />
      </div>
    </section>
    <!--================End Feature Area =================-->

    <?php include("partials/footer.php")?>
    <?php include("partials/scripts.php"); ?>
  </body>
</html>
