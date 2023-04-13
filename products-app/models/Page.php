<?php

class Page {
  /**
   * Función que retorna la ruta de una petición GET/POST. Ej: Ruta de contacto, home, listado ...
   */
  static function pageRequest (string $request, string $route) {
    return "$route$request.php";
  }
}
