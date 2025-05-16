<?php
namespace App\Models;
use CodeIgniter\Model;

class Usuario_model extends Model
{
    protected $table = 'perfiles';
    protected $primaryKey = 'id_perfil';
    protected $allowedFields = ['id_perfil', 'descripcion', 'baja'];
}