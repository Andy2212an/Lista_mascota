<?= $header; ?>

<div class="container mt-2">
  <h4>Registrar Mascota</h4>
  <form action="<?= base_url('mascotas/guardar') ?>" method="post" enctype="multipart/form-data">
    
    <div class="mb-3">
      <label for="nombre" class="form-label">Nombre</label>
      <input type="text" class="form-control" name="nombre" id="nombre" required>
    </div>

    <div class="mb-3">
      <label for="especie" class="form-label">Especie</label>
      <select class="form-control" name="especie" id="especie" required>
        <option value="">Seleccione especie</option>
        <option value="Perro">Perro</option>
        <option value="Gato">Gato</option>
        <option value="Ave">Ave</option>
        <option value="Conejo">Conejo</option>
        <option value="Otro">Otro</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="edad" class="form-label">Edad</label>
      <input type="number" class="form-control" name="edad" id="edad" required>
    </div>

    <div class="mb-3">
      <label for="sexo" class="form-label">Sexo</label>
      <select class="form-control" name="sexo" id="sexo" required>
        <option value="Macho">Macho</option>
        <option value="Hembra">Hembra</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="dueno" class="form-label">Dueño</label>
      <input type="text" class="form-control" name="dueno" id="dueno" required>
    </div>

    <div class="mb-3">
      <label for="imagen" class="form-label">Imagen</label>
      <input type="file" class="form-control" name="imagen" id="imagen">
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="<?= base_url('mascotas'); ?>" class="btn btn-secondary">Cancelar</a>
  </form>
  
</div>

<?= $footer; ?>







