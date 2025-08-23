<?= $header; ?>

<div class="container mt-2">
  <div class="my-2">
    <h4>Registro de Mascotas</h4>
    <a href="<?= base_url("mascotas/listar"); ?>">Volver</a>
  </div>

  <form method="POST" action="<?= base_url('mascotas/guardar') ?>" enctype="multipart/form-data">
    <div class="card">
      <div class="card-body">
        <div class="mb-3">
          <label for="nombre">Nombre de la mascota</label>
          <input type="text" class="form-control" name="nombre" id="nombre" autofocus required>
        </div>
        <div class="mb-3">
          <label for="especie">Especie</label>
          <select name="especie" id="especie" class="form-control" required>
            <option value="" disabled selected>Seleccione la especie</option>
            <option value="Perro">Perro</option>
            <option value="Gato">Gato</option>
            <option value="Pez">Pez</option>
            <option value="Hámster">Hámster</option>
            <option value="Pájaro">Pájaro</option>
            <option value="Hurón">Hurón</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="edad">Edad</label>
          <input type="number" class="form-control" name="edad" id="edad" min="0" required>
        </div>
        <div class="mb-3">
          <label for="sexo">Sexo</label>
          <select name="sexo" id="sexo" class="form-control" required>
            <option value="" disabled selected>Seleccione el sexo</option>
            <option value="M">Masculino (M)</option>
            <option value="F">Femenino (F)</option>
          </select>
        </div>
        <div>
          <label for="imagen">Adjuntar imagen</label>
          <input type="file" class="form-control" name="imagen" id="imagen" accept="image/png,image/jpeg,image/jpg">
        </div>
      </div>
      <div class="card-footer text-end">
        <a href="<?= base_url('mascotas') ?>" class="btn btn-sm btn-outline-secondary">Cancelar</a>
        <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
      </div>
    </div>
  </form>

</div>

<?= $footer; ?>


