<?php

namespace App\Models;
use CodeIgniter\Model;

class Mascota extends Model {

  protected $table = 'mascotas';
  protected $primaryKey = 'id';
  protected $allowedFields = ['nombre', 'especie', 'edad', 'sexo', 'imagen', 'fecha_registro'];

  // Opcional: si quieres que 'fecha_registro' se maneje automáticamente
  protected $useTimestamps = false; // como es TIMESTAMP con default CURRENT_TIMESTAMP en BD no es obligatorio
}
