<?php

namespace App\Models;

use CodeIgniter\Model;

class ventas_cabecera_model extends Model
{
    protected $table = 'ventas_cabecera';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id_usuario',
        'fecha',
        'total'
    ];

    public function insertarCabecera($id_usuario, $total)
    {
        $data = [
            'id_usuario' => $id_usuario,
            'fecha'      => date('Y-m-d H:i:s'),
            'total'      => $total
        ];

        $this->insert($data);
        return $this->getInsertID();
    }
}
