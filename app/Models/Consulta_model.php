<?php
namespace App\Models;

use CodeIgniter\Model;

class Consulta_model extends Model
{
    protected $table = 'consulta';
    protected $primaryKey = 'id_consulta';

    protected $allowedFields = [
        'nombre', 'apellido', 'email', 'telefono', 'mensaje', 'respuesta'
    ];

    public function getConsultas()
    {
        return $this->orderBy('id_consulta', 'DESC')->findAll();
    }

    public function atender($id)
    {
        return $this->update($id, ['respuesta' => 'SI']);
    }
}
