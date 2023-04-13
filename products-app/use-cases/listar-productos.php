<?php
/**
 * función para gestionar la compra de los pedidos del formulario
 * 
 * @param {Alimento | Utensilio [] } - Array de objetos de la compra de la tienda
 * @return {array | null} - Retorna el array de objetos de la compra o nulo si no hay compra
 */
function listarProductos ($compra): array|null {
  if (!isset($compra)) return null;
  
  $carrito = new Compra(...$compra);
  return [
   'productos' => $carrito->getProductos(), 
   'total' => $carrito->dimeTotalCompra()
  ];  
}
