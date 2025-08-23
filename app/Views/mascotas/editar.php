<?= $header; ?>

<div class="container mt-2">
  <div class="my-2">
    <h4>Edición de Mascotas</h4>
    <a href="<?= base_url("mascotas"); ?>">Volver</a>
  </div>

  <form method="POST" action="<?= base_url('mascotas/actualizar') ?>" enctype="multipart/form-data">
  
    <!-- Esta caja actua como contenedor para la PK -->
    <input type="hidden" name="id" value="<?= $mascota['id'] ?>">

    <div class="card">
      <div class="card-body">
        <div class="mb-3">
          <label for="nombre">Nombre de la mascota</label>
          <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $mascota['nombre'] ?>" autofocus required>
        </div>
        
        <div class="mb-3">
          <label for="especie">Especie</label>
          <select name="especie" id="especie" class="form-control" required>
            <option value="Perro" <?= $mascota['especie'] == 'Perro' ? 'selected' : '' ?>>Perro</option>
            <option value="Gato" <?= $mascota['especie'] == 'Gato' ? 'selected' : '' ?>>Gato</option>
            <option value="Pez" <?= $mascota['especie'] == 'Pez' ? 'selected' : '' ?>>Pez</option>
            <option value="Hámster" <?= $mascota['especie'] == 'Hámster' ? 'selected' : '' ?>>Hámster</option>
            <option value="Pájaro" <?= $mascota['especie'] == 'Pájaro' ? 'selected' : '' ?>>Pájaro</option>
            <option value="Hurón" <?= $mascota['especie'] == 'Hurón' ? 'selected' : '' ?>>Hurón</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="edad">Edad</label>
          <input type="number" class="form-control" name="edad" id="edad" value="<?= $mascota['edad'] ?>" required>
        </div>

        <div class="mb-3">
          <label for="sexo">Sexo</label>
          <select name="sexo" id="sexo" class="form-control" required>
            <option value="M" <?= $mascota['sexo'] == 'M' ? 'selected' : '' ?>>Masculino (M)</option>
            <option value="F" <?= $mascota['sexo'] == 'F' ? 'selected' : '' ?>>Femenino (F)</option>
          </select>
        </div>

        <div class="my-3">
          <label for="">Imagen actual</label>
          <img src="<?= base_url("uploads/") . $mascota['imagen'] ?>" alt="Imagen de mascota" class="img-fluid" style="max-width: 480px">
        </div>

        <div>
          <label for="imagen">Adjuntar nueva imagen</label>
          <input type="file" class="form-control" name="imagen" id="imagen" accept="image/png,image/jpeg,image/jpg">
        </div>
      </div>
      <div class="card-footer text-end">
        <a href="<?= base_url('mascotas') ?>" class="btn btn-sm btn-outline-secondary">Cancelar</a>
        <button type="submit" class="btn btn-sm btn-primary">Actualizar</button>
      </div>
    </div>
  </form>

</div>

<?= $footer; ?>
