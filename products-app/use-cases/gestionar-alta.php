<?php
declare(strict_types = 1);
require_once('../models/Compra.php');
session_start();


function dimeOrdenMasAlto ($productos): int {

   $orden = 0;

   foreach($productos as $producto) {
    if ($producto->getOrden() > $orden) {
      $orden = $producto->getOrden();
    } 
   }

   return $orden;


    // return array_reduce(
    //   $productos,
    //   function ($valorPrevio, $producto) {
    //     if ($producto->getOrden() > $valorPrevio) 
    //       return $producto->getOrden();
    //     else 
    //      return $valorPrevio;
    //   },
    //   0
    // );
}

// Validaciones
if (count($_GET) === 0) {
  die('Operación no válida');
}

$ultimoProductoOrden = 0;

if (!isset($_SESSION['productos']))
  $_SESSION['productos'] = [];
else {
  $ultimoIndice = count($_SESSION['productos']) - 1;
  $ultimoProductoOrden = dimeOrdenMasAlto($_SESSION['productos']);
}

// Cargar la propiedad de clase llamada serie
Producto::$serie = $ultimoProductoOrden;


//Gestión del formulario
$tipo = $_GET['tipo']??'no-existe';
$nombreProducto = htmlspecialchars($_GET['nombre-producto']);
$precioProducto = filter_var($_GET['precio-producto'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

switch ($tipo) {
  case 'alimento':
    $p = new Alimento($nombreProducto, floatval($precioProducto));
    array_push($_SESSION['productos'], $p);    
    break;
  case 'utensilio':
    $p = new Utensilio($nombreProducto, floatval($precioProducto));
    array_push($_SESSION['productos'] , $p);
    break;
  default:
    die('Tipo de producto no existente');
  break;
}

// print_r($_SESSION['productos']);


// Redirijo a algún sitio
header('Location: ../index.php?page=listado');