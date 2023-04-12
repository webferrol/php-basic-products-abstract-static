<?php
abstract class Producto {
  protected string $nombreProducto;
  protected float $precio;
  private string $id;

  private int $orden;
  private static int $serie = 0;

  private DateTime $fechaAlta;

  function __construct (string $nombreProducto, float $precio) {
    $this->orden = ++Producto::$serie;
    $this->id = strlen($nombreProducto) > 1 
                ? strtoupper(substr($nombreProducto, 0, 2)).'-'.$this->orden
                : '##-'.$this->orden;
    $this->nombreProducto = $nombreProducto;
    $this->precio = $precio;
    $this->fechaAlta = new DateTime();
  }

  function getPrecio (): float {
    return $this->precio;
  }

  static function aplicarDescuento25 (float $precio): float {
    return $precio * 0.75;
  }

  public function __toString() :string {
    return join(' | ', [$this->id, $this->nombreProducto, $this->precio.' €']);
  }

  abstract function dimeTipo (): string;

}
