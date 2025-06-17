<?php

namespace App\Controllers;

use App\Models\ventas_cabecera_model;
use App\Models\ventas_detalle_model;
use CodeIgniter\Controller;

class VentasController extends Controller
{
    public function __construct()
    {
        helper(['url', 'form']);
        session();
    }

    public function index()
    {
        // Obtener las cabeceras de todas las ventas
        $ventasCabecera = new ventas_cabecera_model();
        $data['ventas'] = $ventasCabecera->findAll();

        $data['titulo'] = 'Listado de Ventas';

        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('back/ventas/ventas', $data);
        echo view('front/footer_view');
    }

    public function detalle($id)
    {
        // Obtener el detalle de una venta por ID
        $detalleModel = new ventas_detalle_model();
        $data['detalle'] = $detalleModel->where('venta_id', $id)->findAll();

        $data['titulo'] = 'Detalle de Venta';

        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('back/ventas/detalle_venta', $data);
        echo view('front/footer_view');
    }
}
