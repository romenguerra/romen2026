<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand">Catalogo</a>
    <form class="d-flex" role="search" method="GET" action="../catalogo.php">
      <select class="form-select" aria-label="Default select example">
        <option selected>Buscar por categorias</option>  
        <?php foreach ($generos as $genero): ?>
          <option value="<?php echo $genero; ?>" name="genero"><?php echo $genero; ?></option>
        <?php endforeach; ?>
      </select>
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav>
