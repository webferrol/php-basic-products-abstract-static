<?php
declare(strict_types = 1);
session_start();

require_once('../models/Compra.php');
// Validaciones
if (count($_GET) === 0) {
  die('Operación no válida');
}

if (!isset($_SESSION['productos']))
  $_SESSION['productos'] = [];


//Gestión del formulario
$tipo = $_GET['tipo']??'no-existe';

switch ($tipo) {
  case 'alimento':
    $p = new Alimento($_GET['nombre-producto'], floatval($_GET['precio-producto']));
    array_push($_SESSION['productos'], $p);    
    break;
  case 'utensilio':
    $p = new Utensilio($_GET['nombre-producto'], floatval($_GET['precio-producto']));
    array_push($_SESSION['productos'] , $p);
    break;
  default:
    die('Tipo de producto no existente');
  break;
}

// print_r($_SESSION['productos']);


// Redirijo a algún sitio
header('Location: ../index.php?page=listado');