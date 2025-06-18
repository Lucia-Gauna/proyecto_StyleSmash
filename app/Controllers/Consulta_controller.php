<?php

namespace App\Controllers;

use App\Models\Consulta_model;
use CodeIgniter\Controller;

class Consulta_controller extends Controller
{
    public function __construct()
    {
        helper(['form', 'url']);
        session();
    }
    public function contacto()
    {
        $data['titulo'] = 'Contacto';
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('front/contacto');
        echo view('front/footer_view');
    }
    // Cliente: enviar consulta
    public function nueva()
    {
        $data['titulo'] = 'Enviar Consulta';
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('front/contacto');
        echo view('front/footer_view');
    }

    // Guardar consulta
    public function guardar()
    {
        $model = new Consulta_model();
        $id_usuario = session()->get('id_usuario');
        $mensaje = $this->request->getPost('mensaje');

        
    $data = [
        'nombre'    => $this->request->getPost('nombre'),
        'apellido'  => $this->request->getPost('apellido'),
        'email'     => $this->request->getPost('email'),
        'telefono'  => $this->request->getPost('telefono'),
        'mensaje'   => $this->request->getPost('mensaje'),
        'respuesta' => 'NO'
    ];

    $model->insert($data);

    return redirect()->to('/contacto')->with('mensaje', 'Consulta enviada con éxito.');
}
    // Admin: listar consultas
    public function listar()
    {
        $model = new Consulta_model();
        $data['consultas'] = $model->getConsultas();
        $data['titulo'] = 'Consultas recibidas';

        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('back/listar_consultas', $data);
        echo view('front/footer_view');
    }

    // Admin: atender consulta
    public function atender($id)
    {
        $model = new Consulta_model();
        $model->atender($id);

        return redirect()->to('/consulta/listar')->with('mensaje', 'Consulta atendida.');
    }


    // Admin: eliminar consulta
    public function eliminar($id)
    {
        $model = new Consulta_model();
        $model->delete($id);

        return redirect()->to('/consulta/listar')->with('mensaje', 'Consulta eliminada.');
    }
}
