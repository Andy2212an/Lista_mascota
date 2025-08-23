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
      //Redirección (cambiara la URL manualmente - NAVEGACIÓN)
      return $this->response->redirect(base_url('mascotas'));
    }else{
      //Agrego una nueva clave conteniendo los datos de la mascota
      $datos['mascota'] = $result;
      return view('mascotas/editar', $datos);
    }
  }

  //Recibe los datos desde la vista y los guarda en la BD
  public function guardar() {
    $mascota = new Mascota();

    $nombre = $this->request->getVar('nombre');
    $especie = $this->request->getVar('especie');
    $edad = $this->request->getVar('edad');
    $sexo = $this->request->getVar('sexo');
    
    //Subir archivo imagen
    if ($imagen = $this->request->getFile('imagen')){
      $nuevoNombre = $imagen->getRandomName();
      $imagen->move('../public/uploads/', $nuevoNombre);

      $registro = [
        'nombre'    => $nombre,
        'especie'   => $especie,
        'edad'      => $edad,
        'sexo'      => $sexo,
        'imagen'    => $nuevoNombre
      ];

      $mascota->insert($registro);
      return $this->response->redirect(base_url('mascotas'));
    }

    //$mascota->insert();
  }

  public function borrar($id = null){
    $mascota = new Mascota();

    //Eliminar el archivo físico (imagen)
    //Utilizar ID (PK) > obtener el nombre físico del archivo de imagen
    $datosMascota = $mascota->where('id', $id)->first();
    $rutaImagen = '../public/uploads/' . $datosMascota['imagen'];

    //Eliminarlo en caso exista...
    if (file_exists($rutaImagen)){ unlink($rutaImagen); }

    //Eliminar el registro de la tabla "mascotas"
    $mascota->where('id', $id)->delete($id);

    return $this->response->redirect(base_url('mascotas'));
  }

  public function actualizar(){
    $mascota = new Mascota();

    //Actualización requiere:
    //1. Campos a ser actualizados (arreglo asociativo)
    $datos = [
      'nombre'    => $this->request->getVar('nombre'),
      'especie'   => $this->request->getVar('especie'),
      'edad'      => $this->request->getVar('edad'),
      'sexo'      => $this->request->getVar('sexo')
    ];

    //2. Clave primaria
    $id = $this->request->getVar('id');

    //Actualizar el registro
    $mascota->update($id, $datos);

    //Validación del archivo binario (jpg, png, jpeg)
    $validacion = $this->validate([
      'imagen' => [
        'uploaded[imagen]',
        'mime_in[imagen,image/png,image/jpg,image/jpeg]',
        'max_size[imagen,1024]'
      ]
    ]);

    //¡La imagen es correcta!, podemos actualizarla...
    if ($validacion){
      if ($imagen = $this->request->getFile('imagen')){
        
        //1. Obtener el nombre de la imagen anterior
        $datosMascota = $mascota->where('id', $id)->first(); //Obtenemos los datos de la mascota
        $rutaImagen = '../public/uploads/' . $datosMascota['imagen'];
  
        //2. Eliminar la imagen anterior
        if (file_exists($rutaImagen)) { unlink($rutaImagen); }
  
        //3. Reemplazar por la nueva imagen
        $nuevoNombre = $imagen->getRandomName();
        $imagen->move('../public/uploads/', $nuevoNombre);
  
        //4. Actualizar la BD con el nuevo nombre aleatorio
        $datos = ["imagen" => $nuevoNombre];
        $mascota->update($id, $datos);  //Solo se actualizará el nombre de la imagen
      }
    }

    return $this->response->redirect(base_url('mascotas'));
  }

}
