<?php
declare(strict_types = 1); // Si se utiliza la primera línea
session_start();


require_once('config.php');


$page = $_REQUEST['page']??'home';


require_once(VIEWS.'header.php');
require_once(VIEWS.'menu.php');

switch ($page) {
  case 'home':
    require_once(VIEWS.'form.php');
  break;
  case 'listado':
    require_once(VIEWS.'listado.php');
    if(isset($_SESSION['productos']))
      print_r($_SESSION['productos']);
    break;
  default:
  echo "Página no encontrada";
  break;
}

require_once(VIEWS.'footer.php');