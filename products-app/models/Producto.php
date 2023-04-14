<?php
abstract class Producto {
  protected string $nombreProducto;
  protected float $precio;
  private string $id;

  private int $orden;
  public static int $serie = 0;

  private DateTime $fechaAlta;

  function __construct (string $nombreProducto, float $precio) {
    $this->orden = ++Producto::$serie;
    echo $this->orden;
    $this->id = strlen($nombreProducto) > 1 
                ? strtoupper(substr($nombreProducto, 0, 2)).'-'.$this->orden
                : '##-'.$this->orden;
    $this->nombreProducto = $nombreProducto;
    $this->precio = $precio;
    $this->fechaAlta = new DateTime();
  }

  function getId (): string {
    return $this->id;
  }

  function getOrden (): int {
    return $this->orden;
  }

  function getPrecio (): float {
    return $this->precio;
  }

  function getNombreProducto (): string {
    return $this->nombreProducto;
  }

  function setPrecio (float $precio): void {
    $this->precio = $precio;
  }

  function setNombreProducto (string $nombreProducto): void {
    $this->nombreProducto = $nombreProducto;
  }

  static function aplicarDescuento25 (float $precio): float {
    return $precio * 0.75;
  }

  public function __toString() :string {
    return join(' | ', [$this->id, $this->nombreProducto, $this->precio.' €']);
  }

  abstract function dimeTipo (): string;

}
