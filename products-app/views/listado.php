<?php
require(USE_CASES . 'listar-productos.php');
?>
<main class="content">
  <h1>Listado</h1>
  <?php
  $compra = listarProductos($_SESSION['productos'] ?? null);
  if ($compra === null) :
  ?>
    <mark>No hay nada en el carrito</mark>
  <?php
  else :
    extract($compra);
  ?>
    <table role="grid">
      <thead>
        <tr>
          <th scope="col"></th>
          <th>Código</th>
          <th scope="col">Nombre</th>
          <th scope="col">Precio</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($productos as $key => $producto) :
        ?>
          <tr>
            <th scope="row"><?= $key + 1 ?> (<?=get_class($producto)?>)</th>
            <td>
              <?=$producto->getId()?>
              <a href="./use-cases/gestionar-baja.php?option=delete&id=<?=$producto->getId()?>">
                <img width="16" src="./assets/trash.svg" alt="Quitar">
              </a>
              <a href="../products-app/index.php?page=editar&id=<?=$producto->getId()?>">
                <img width="16" src="./assets/pencil-square.svg" alt="Editar">
              </a>
            </td>
            <td><?= $producto->getNombreProducto() ?></td>
            <td><?= $producto->getPrecio() ?></td>
          </tr>
        <?php
        endforeach;
        ?>
      </tbody>
      <tfoot>
        <tr>
          <th colspan="4" scope="col"> Total <?= $compra['total'] ?> €</th>
        </tr>
      </tfoot>
    </table>
  <?php
  endif;
  ?>
</main>