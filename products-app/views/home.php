<main class="container">
  <h1>Nuevo producto</h1>
 <form action="./use-cases/gestionar-alta.php">
  <fieldset class="campo">
    <label>Alimento <input checked name="tipo" type="radio" value="alimento"></label>
    <label>Utensilio <input name="tipo" type="radio" value="utensilio"></label>

  </fieldset> 
  <div class="campo">
    <label for="nombre">Nombre del producto</label>
    <input minlength="2" required id="nombre" type="text" name="nombre-producto" placeholder="tomates">
  </div>
  <div class="campo">
    <label for="precio">Precio del producto</label>
    <input required type="number" step="any" name="precio-producto" placeholder="13.5">
  </div>
  <button>Alta de producto</button>
</form>
</main>