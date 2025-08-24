<?php

namespace App\Models;
use CodeIgniter\Model;

class Mascota extends Model {

  protected $table = 'mascotas';
  protected $primaryKey = 'id';
  protected $allowedFields = ['nombre', 'especie', 'edad', 'sexo', 'imagen', 'dueno', 'fecha_registro'];

  // Si no quieres manejar created_at y updated_at
  protected $useTimestamps = false;
}
