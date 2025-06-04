<?php
namespace App\Controllers;
Use app\Models\producto_model;
Use app\Models\Usuario_model;
Use app\Models\ventas_cabecera_model;
Use app\Models\ventas_detalle_model;
Use app\Models\categoria_model;
Use CodeIgniter\Controller;

class Productocontroller extends Controller
{
    public function __construct(){
        helper(['url', 'form']);
        $session=session();
    }

    public function index(){
        $productoModel = new producto_model();
        $data['producto'] = $productoModel->getProductoAll();

        $dato['titulo'] = 'Crud_productos';
        echo view('front/head_view_crud', $dato);
        echo view('front/nav_view');
        echo view('back/productos/producto_nuevo_view', $data);
        echo view('front/footer_view');
    }

    public function creaproducto(){
        $categoriasmodel = nre cstegorias_model();
        $data['categorias'] = $categoriasmodel->getCategorias();

        $productoModel = new producto_model();
        $data['producto'] = $productoModel->getProductoAll();

        $dato['titulo'] = 'Alta producto'
        echo view('front/head_view', $dato);
        echo view('front/nav_view');
        echo view('back/productos/alta_producto_view', $data);
        echo view('front/footer_view');
    }

    public function store(){
        $input = $this->validate([
            'nombre_prod' => 'required|min_length[3]',
            'categoria' => 'is_not_unique[categorias.id]',
            'precio' => 'required|numeric',
            'precio_vta' => 'required|numeric',
            'stock' => 'required',
            'stock_min' => 'required',
            'imagen' => 'uploaded[imagen]',

        ]);

        $productoModel = new producto_model();

        if($input){
            
            $categorias_model = new categorias_model();
            $data['categorias'] = $categoria_moodel->getCategorias();
            $data['validation'] = $this->validator;


            $dato['titulo'] = 'Alta';
            echo view('front/head_view', $dato);
            echo view('front/nav_view');
            echo view('back/productos/alta_producto_view', $data);
        } else {
            $img = $this->request->getFile('imagen');
            $nombre_aleatorio = $img->getRandomName();
            $img->move(ROOTPATH. 'assets/uploads', $nombre_aleatorio);

            $data = [
                'nombre_prod' => $this->request->getVar('nombre_prod'),
                'imagen' => $img->getName(),
                'categoria_id' => $this->request->getVar('categoria'),
                'precio' => $this->request->getVar('precio'),
                'precio_vta' => $this->request->getVar('precio_vta'),
                'stock' => $this->request->getVar('stock'),
                'stock_min' => $this->request->getVar('stock_min'),
            ];

            $productoModel = new producto_model();
            $productoModel = insert($data);
            session()->setFlashdata('success', 'Alta Exitosa...');

            return $this->response->redirect(site_url('crear'));
        }
       
    }

}
