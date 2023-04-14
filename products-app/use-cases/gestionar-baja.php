<?php
require_once('../config.php');
require_once(MODELS . 'Alimento.php');
require_once(MODELS . 'Utensilio.php');
session_start();

if (!isset($_SESSION['productos']))
  die('Error grave consulte con su administrador');

if (
  isset($_GET['id'])
  && !empty($_GET['id'])
  && isset($_GET['option'])
  && $_GET['option'] === 'delete'
) {
  //Eliminar
  $indice = false;
  foreach ($_SESSION['productos'] as $key => $producto) {
    if ($producto->getId() === $_GET['id']) {
      $indice = $key;
      break;
    }
  }

  if ($indice !== false) {
    unset($_SESSION['productos'][$indice]);
  }

 
  // unset es para eliminar una variable
  // array_search

} else {
  die('Producto inexistente en la BBDD');
}


// Redirijo a home si no queda productos de compra y al listado si los hay
if (!isset($_SESSION['productos']) || count($_SESSION['productos']) < 1) {
  unset($_SESSION['productos']);
  header('Location: ../index.php?page=home');
}else
  header('Location: ../index.php?page=listado');
