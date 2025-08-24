<?= $this->include('Layouts/header'); ?> 

<div class="container mt-4">
  <h2>Listado de Mascotas</h2>
  <div class="row">
    <?php if(!empty($mascotas)): ?>
      <?php foreach($mascotas as $mascota): ?>
        <div class="col-md-4 mb-3">
          <div class="card">
            <img src="<?= base_url('uploads/'.$mascota['imagen']); ?>" class="card-img-top" alt="Imagen de <?= $mascota['nombre']; ?>">
            <div class="card-body">
              <h5 class="card-title"><?= $mascota['nombre']; ?></h5>
              <p class="card-text">
                <strong>Especie:</strong> <?= $mascota['especie']; ?><br>
                <strong>Edad:</strong> <?= $mascota['edad']; ?> años<br>
                <strong>Sexo:</strong> <?= $mascota['sexo']; ?><br>
                <strong>Dueño:</strong> <?= $mascota['dueno']; ?>
              </p>
              <p class="text-muted">Registrado el <?= $mascota['fecha_registro']; ?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p>No hay mascotas registradas.</p>
    <?php endif; ?>
  </div>
</div>

<?= $this->include('Layouts/footer'); ?> 

