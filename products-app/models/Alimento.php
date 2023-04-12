<?php
if (file_exists(__DIR__.DIRECTORY_SEPARATOR.'Producto.php'))
  require_once(__DIR__.DIRECTORY_SEPARATOR.'Producto.php');
else
  die('Falta el fichero Producto.php');

class Alimento extends Producto {
  private bool $tieneCaducidad;
  private ?DateTime $fechaCaducidad;

  function __construct (string $nombre, float $precio, ?bool $caduca = null, ?DateTime $fechaCaducidad = null) {
    parent::__construct($nombre, $precio);
    $this->tieneCaducidad = $caduca??false;
    $this->fechaCaducidad = $fechaCaducidad;
  }

  public function setTieneCaducidad (bool $si) {
    $this->tieneCaducidad = $si;
  }

  public function getTieneCaducidad (): bool {
    return $this->tieneCaducidad;
  }

  public function dimeTieneCaducidad (): string {
    return $this->tieneCaducidad ? 'Tiene Caducidad' : 'No tiene caducidad';
  }

  /**
   * Función que indica si un producto caduca o no. En caso afirmativo también informa de la fecha
   * 
   * @param {string} Información de caducidad
   */
  function dimeTipo(): string {
    // https://www.php.net/manual/en/function.date-diff.php
    // https://www.php.net/manual/en/dateinterval.format.php 
    // https://carbon.nesbot.com/docs //Librería DateTime
    $intervalo = date_diff($this->fechaCaducidad??new DateTime(), new DateTime());
    return $this->tieneCaducidad 
            ? 'Caducidad ('.$intervalo->format('%r%a').')'
            : 'No caduca';
  }
}
