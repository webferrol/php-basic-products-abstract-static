<?php
require_once(__DIR__ . DIRECTORY_SEPARATOR . 'Alimento.php');
require_once(__DIR__ . DIRECTORY_SEPARATOR . 'Utensilio.php');

class Compra
{
  private array $productos;
  function __construct(Alimento|Utensilio ...$productos)
  {
    $this->productos = $productos;
  }
  
  
  function dimeTotalCompra(): float {
    // https://www.php.net/manual/en/function.array-reduce.php
    //  $ac = 0;
    //  foreach ($this->productos as $producto) {
      //   $ac += $producto->getPrecio();
      //  }
      //  return $ac;  
      
      return array_reduce(
        $this->productos,
        function ($acumulador, $producto) {
          return $acumulador + $producto->getPrecio();
        },
        0
      );
    }
  }
