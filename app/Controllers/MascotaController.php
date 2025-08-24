<?php 

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Mascota;

class MascotaController extends BaseController
{

  public function listar(): string
  {
    $mascota = new Mascota();

    $datos['mascotas'] = $mascota->orderBy('id', 'ASC')->findAll();

    // Solicitar las secciones: HEADER + FOOTER
    $datos['header'] = view('Layouts/header');
    $datos['footer'] = view('Layouts/footer');

    return view('mascotas/listar', $datos);
  }


  public function crear(): string
  {
    $datos['header'] = view('Layouts/header');
    $datos['footer'] = view('Layouts/footer');

    return view('mascotas/crear', $datos);
  }

  public function editar($id = null)
  {
    $mascota = new Mascota();

    $datos['header'] = view('Layouts/header');
    $datos['footer'] = view('Layouts/footer');
    $result = $mascota->where('id', $id)->first();

    if (!$result){ 
      return $this->response->redirect(base_url('mascotas'));
    }else{
      $datos['mascota'] = $result;
      return view('mascotas/editar', $datos);
    }
  }

  //Recibe los datos desde la vista y los guarda en la BD
  public function guardar() {
    $mascota = new Mascota();

    $nombre   = $this->request->getVar('nombre');
    $dueno    = $this->request->getVar('dueno');   // 👈 agregado
    $especie  = $this->request->getVar('especie');
    $edad     = $this->request->getVar('edad');
    $sexo     = $this->request->getVar('sexo');
    
    if ($imagen = $this->request->getFile('imagen')){
      $nuevoNombre = $imagen->getRandomName();
      $imagen->move('../public/uploads/', $nuevoNombre);

      $registro = [
        'nombre'    => $nombre,
        'dueno'     => $dueno,   // 👈 agregado
        'especie'   => $especie,
        'edad'      => $edad,
        'sexo'      => $sexo,
        'imagen'    => $nuevoNombre
      ];

      $mascota->insert($registro);
      return $this->response->redirect(base_url('mascotas'));
    }
  }

  public function borrar($id = null){
    $mascota = new Mascota();

    $datosMascota = $mascota->where('id', $id)->first();
    $rutaImagen = '../public/uploads/' . $datosMascota['imagen'];

    if (file_exists($rutaImagen)){ unlink($rutaImagen); }

    $mascota->where('id', $id)->delete($id);

    return $this->response->redirect(base_url('mascotas'));
  }

  public function actualizar(){
    $mascota = new Mascota();

    $datos = [
      'nombre'    => $this->request->getVar('nombre'),
      'dueno'     => $this->request->getVar('dueno'),  // 👈 agregado
      'especie'   => $this->request->getVar('especie'),
      'edad'      => $this->request->getVar('edad'),
      'sexo'      => $this->request->getVar('sexo')
    ];

    $id = $this->request->getVar('id');

    $mascota->update($id, $datos);

    $validacion = $this->validate([
      'imagen' => [
        'uploaded[imagen]',
        'mime_in[imagen,image/png,image/jpg,image/jpeg]',
        'max_size[imagen,1024]'
      ]
    ]);

    if ($validacion){
      if ($imagen = $this->request->getFile('imagen')){
        $datosMascota = $mascota->where('id', $id)->first();
        $rutaImagen = '../public/uploads/' . $datosMascota['imagen'];
  
        if (file_exists($rutaImagen)) { unlink($rutaImagen); }
  
        $nuevoNombre = $imagen->getRandomName();
        $imagen->move('../public/uploads/', $nuevoNombre);
  
        $datos = ["imagen" => $nuevoNombre];
        $mascota->update($id, $datos);
      }
    }

    return $this->response->redirect(base_url('mascotas'));
  }

  public function perfil()
  {
    $mascotaModel = new \App\Models\Mascota();
    $data['mascotas'] = $mascotaModel->findAll();

    return view('mascotas/perfil', $data);
  }

}

