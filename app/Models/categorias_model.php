<?php
namespace App\Models;
use CodeIgniter\Model;

class Usuario_model extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'id';
    protected $allowedFields = ['descripcion', 'activo'];
}