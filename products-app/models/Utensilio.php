<?php
if (file_exists(__DIR__.DIRECTORY_SEPARATOR.'Producto.php'))
  require_once(__DIR__.DIRECTORY_SEPARATOR.'Producto.php');
else
  die('Falta el fichero Producto.php');

class Utensilio extends Producto {
 public string $tipo = 'Genérico'; 

 /**
  * Función que retorna el tipo de utensilio de un producto
  *
  * @param {string} 
  */
 function dimeTipo(): string {
  return 'Tipo de utensilio:'. $this->tipo;
 }


 function __toString(): string {
    return parent::__toString().join(' | ', [$this->tipo]);
 }

}
