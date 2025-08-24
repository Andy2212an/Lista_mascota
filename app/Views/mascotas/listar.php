<?= $header; ?>

<div class="container mt-2">
  <div class="my-2">
    <h4>Lista de Mascotas</h4>
    <a href="<?= base_url("mascotas/crear"); ?>">Registrar</a>
  </div>

  <div class="table-responsive">
    <table class="table table-sm">
      <colgroup>
        <col width="5%">
        <col width="10%">
        <col width="10%">
        <col width="8%">
        <col width="10%">
        <col width="15%">
        <col width="10%">
        <col width="15%">
        <col width="10%">
      </colgroup>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Especie</th>
          <th>Edad</th>
          <th>Sexo</th>
          <th>Imagen</th>
          <th>Dueño</th>
          <th>Fecha Registro</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>

        <?php foreach($mascotas as $mascota): ?>

        <tr class="align-middle">
          <td><?= $mascota['id'] ?></td>
          <td><?= htmlspecialchars($mascota['nombre']) ?></td>
          <td><?= htmlspecialchars($mascota['especie']) ?></td>
          <td><?= htmlspecialchars($mascota['edad']) ?></td>
          <td><?= htmlspecialchars($mascota['sexo']) ?></td>
          <td>
            <img src="<?= base_url("uploads/") ?><?= $mascota['imagen'] ?>" 
                 alt="Imagen de <?= htmlspecialchars($mascota['nombre']) ?>" 
                 class="img-thumbnail" style="width: 120px">
          </td>
          <td><?= htmlspecialchars($mascota['dueno']) ?></td>
          <td><?= $mascota['fecha_registro'] ?></td>
          <td>
            <a href="<?= base_url('mascotas/borrar/') . $mascota['id'] ?>" class="btn btn-sm btn-danger">Eliminar</a>
            <a href="<?= base_url('mascotas/editar/') . $mascota['id'] ?>" class="btn btn-sm btn-info">Editar</a>
          </td>
        </tr>

        <?php endforeach; ?>

      </tbody>
    </table>
  </div>

</div>

<?= $footer; ?>


