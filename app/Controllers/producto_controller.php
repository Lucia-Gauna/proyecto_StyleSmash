<?php
namespace App\Controllers;
use App\Models\producto_model;
use App\Models\categorias_model;
use CodeIgniter\Controller;

class producto_controller extends Controller
{
    public function __construct(){
        helper(['url', 'form']);
        session();
    }

    public function index(){
        $productoModel = new producto_model();
        $data['producto'] = $productoModel->getProductoAll();

        $dato['titulo'] = 'Crud_productos';
        echo view('front/head_view', $dato);
        echo view('front/nav_view');
        echo view('back/productos/productos', $data);
        echo view('front/footer_view');
    }

//funciones de alta
    public function creaproducto(){
        $categoriasmodel = new categorias_model();
        $data['categorias'] = $categoriasmodel->getCategorias();

        $dato['titulo'] = 'Alta producto';
        echo view('front/head_view', $dato);
        echo view('front/nav_view');
        echo view('back/productos/alta_productos', $data);
        echo view('front/footer_view');
    }

    public function store(){
        $input = $this->validate([
            'nombre_prod' => 'required|min_length[3]',
            'categoria' => 'is_not_unique[categorias.id]',
            'precio' => 'required|numeric',
            'precio_vta' => 'required|numeric',
            'stock' => 'required|integer',
            'stock_min' => 'required|integer',
            'imagen' => 'uploaded[imagen]',
        ]);

        $productoModel = new producto_model();

        if(!$input){
            $categorias_model = new categorias_model();
            $data['categorias'] = $categorias_model->getCategorias();
            $data['validation'] = $this->validator;

            $dato['titulo'] = 'Alta';
            echo view('front/head_view', $dato);
            echo view('front/nav_view');
            echo view('back/productos/alta_productos', $data);
            echo view('front/footer_view');
        } else {
            $img = $this->request->getFile('imagen');
            $nombre_aleatorio = $img->getRandomName();
            $img->move(ROOTPATH.'assets/uploads', $nombre_aleatorio);

            $data = [
                'nombre_prod' => $this->request->getVar('nombre_prod'),
                'imagen' => $nombre_aleatorio,
                'categoria_id' => $this->request->getVar('categoria'),
                'precio' => $this->request->getVar('precio'),
                'precio_vta' => $this->request->getVar('precio_vta'),
                'stock' => $this->request->getVar('stock'),
                'stock_min' => $this->request->getVar('stock_min'),
                'eliminado' => 'NO'
            ];

            $productoModel->insert($data);
            session()->setFlashdata('success', 'Alta Exitosa...');
            return redirect()->to('crear');
        }
    }

    //funciones de edicion

    public function singleproducto($id = null){
        $productoModel = new producto_model();
        $data['producto'] = $productoModel->where('id', $id)->first();
        if (empty($data['producto'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('No se encontró el producto');
        }
        $categoriasM = new categorias_model();
        $data['categorias'] = $categoriasM->getCategorias();

        $dato['titulo'] = 'Crud_productos';
        echo view('front/head_view', $dato);
        echo view('front/nav_view');
        echo view('back/productos/editar_producto', $data);
        echo view('front/footer_view');
    }

    public function modifica($id){
        $productoModel = new producto_model();
        $img = $this->request->getFile('imagen');
        
        if ($img && $img->isValid()) {
            $nombre_aleatorio = $img->getRandomName();
            $img->move(ROOTPATH.'assets/uploads', $nombre_aleatorio);
            $data = [
                'nombre_prod' => $this->request->getVar('nombre_prod'),
                'imagen' => $nombre_aleatorio,
                'categoria_id' => $this->request->getVar('categoria'),
                'precio' => $this->request->getVar('precio'),
                'precio_vta' => $this->request->getVar('precio_vta'),
                'stock' => $this->request->getVar('stock'),
                'stock_min' => $this->request->getVar('stock_min'),
            ];
        } else {
            $data = [
                'nombre_prod' => $this->request->getVar('nombre_prod'),
                'categoria_id' => $this->request->getVar('categoria'),
                'precio' => $this->request->getVar('precio'),
                'precio_vta' => $this->request->getVar('precio_vta'),
                'stock' => $this->request->getVar('stock'),
                'stock_min' => $this->request->getVar('stock_min'),
            ];
        }

        $productoModel->update($id, $data);
        session()->setFlashdata('success', 'Modificación Exitosa...');
        return redirect()->to('crear');
    }

    public function deleteproducto($id)
    {
        $productoModel = new producto_model();
        $producto = $productoModel->find($id);

        if (!$producto) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('No se encontró el producto.');
        }

        $productoModel->update($id, ['eliminado' => 'SI']);
        return redirect()->to('/crear')->with('success', 'Producto eliminado correctamente');
    }

    public function eliminados(){
        $productoModel = new producto_model();
        $data['producto'] = $productoModel->getProductoAllEliminados();

        $dato['titulo'] = 'Crud_productos';
        echo view('front/head_view', $dato);
        echo view('front/nav_view');
        echo view('back/productos/productos_eliminados', $data);
        echo view('front/footer_view');
    }

    public function activarproducto($id){
        $productoModel = new producto_model();
        $data['eliminado'] = 'NO';
        $productoModel->update($id, $data);
        session()->setFlashdata('success', 'Activación Exitosa...');
        return redirect()->to('crear');
    }
}
