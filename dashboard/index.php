<?php

  session_start();

  if(isset($_SESSION["PYS_session"])){
    header('Location: dashboard.php');
  } else {
    header('Location: login.php');
  }
  