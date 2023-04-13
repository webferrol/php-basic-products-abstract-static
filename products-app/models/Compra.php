<?php
require_once(__DIR__ . DIRECTORY_SEPARATOR . 'Alimento.php');
require_once(__DIR__ . DIRECTORY_SEPARATOR . 'Utensilio.php');

class Compra {
private array $productos;

function __construct(Alimento | Utensilio ...$productos) {
  $this->productos = $productos;
}

function getProductos () : array {
  return $this->productos;
}

function dimeTotalCompra(): float {    
    return array_reduce(
      $this->productos,
      function ($acumulador, $producto) {
        return $acumulador + $producto->getPrecio();
      },
      0
    );
  }
}
