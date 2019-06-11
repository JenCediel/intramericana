<!--================Header Menu Area =================-->
<header class="main_menu_area">
  <nav
    class="navbar navbar-expand-lg navbar-light bg-light"
    style="margin-bottom: 10px; margin-top: -10px;"
  >
    <a class="navbar-brand" href="#"> 
    <img src="img/logo.png" alt="" style="margin-top: -10px;"/></a>
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span></span>
      <span></span>
      <span></span>
    </button>
    <div
      class="collapse navbar-collapse"
      id="navbarSupportedContent"
      style="margin-left: 425px; margin-top: 23px"
    >
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.html">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="directorio.html">Directorio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="procedimientos.html">Procedimientos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="portfolio.html">Portfolio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.html">Contact</a>
        </li>
      </ul>
    </div>
    <ul class="navbar-nav" style="margin-left: 5px">
      <li class="nav-item dropdown submenu" style="margin-top: 20px;">
        <img
          src="img/icon-user.png"
          style="width: 50px; height: 50px; border-radius: 50px; margin-right: 6px;"
        /><strong style="color: white; cursor: pointer;">Nombre Aquí</strong>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li class="nav-item">
            <a class="nav-link" href="#" style="color: black">Mi perfil</a>
          </li>
          <li class="nav-item">
            <a onclick="localStorage.clear();" href="developer/logout.php"
              ><i class="fa fa-sign-out fa-fw"></i> Cerrar sesión</a
            >
          </li>
        </ul>
      </li>
    </ul>
  </nav>
</header>
<!--================End Header Menu Area =================-->
