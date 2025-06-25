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

        $dato['titulo'] = 'Lista de Productos | StyleSmash';
        echo view('front/head_view', $dato);
        echo view('front/nav_view');
        echo view('back/productos/productos', $data);
        echo view('front/footer_view');
    }

    // funciones de alta
    public function creaproducto(){
        $categoriasmodel = new categorias_model();
        $data['categorias'] = $categoriasmodel->getCategorias();

        $productoModel = new producto_model();
        $data['producto'] = $productoModel->getProductoAll();

        $dato['titulo'] = 'Alta producto | StyleSmash';
        echo view('front/head_view', $dato);
        echo view('front/nav_view');
        echo view('back/productos/alta_productos', $data);
        echo view('front/footer_view');
    }

    public function store(){
        $input = $this->validate([
            'nombre_prod' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'El nombre es obligatorio.',
                    'min_length' => 'El nombre debe tener al menos 3 caracteres.'
                ]
            ],
            'categoria' => [
                'rules' => 'is_not_unique[categorias.id]',
                'errors' => [
                    'is_not_unique' => 'Debe seleccionar una categoría válida.'
                ]
            ],
            'precio' => [
                'rules' => 'required|numeric|greater_than_equal_to[0]',
                'errors' => [
                    'greater_than_equal_to' => 'El precio de costo no puede ser negativo!.'
                ]
            ],
            'precio_vta' => [
                'rules' => 'required|numeric|greater_than_equal_to[0]',
                'errors' => [
                    'greater_than_equal_to' => 'El precio de venta no puede ser negativo!.'
                ]
            ],
            'stock' => [
                'rules' => 'required|integer|greater_than_equal_to[0]',
                'errors' => [
                    'greater_than_equal_to' => 'El stock no puede ser negativo!.'
                ]
            ],
            'stock_min' => [
                'rules' => 'required|integer|greater_than_equal_to[0]',
                'errors' => [
                    'greater_than_equal_to' => 'El stock mínimo no puede ser negativo!.'
                ]
            ],
            'imagen' => [
                'rules' => 'uploaded[imagen]',
                'errors' => [
                    'uploaded' => 'Debe subir una imagen del producto.'
                ]
            ]
        ]);

        $productoModel = new producto_model();

        if (!$input) {
            $categorias_model = new categorias_model();
            $data['categorias'] = $categorias_model->getCategorias();
            $data['validation'] = $this->validator;

            $dato['titulo'] = 'Alta producto | StyleSmash';
            echo view('front/head_view', $dato);
            echo view('front/nav_view');
            echo view('back/productos/alta_productos', $data);
            echo view('front/footer_view');
        } else {
            $img = $this->request->getFile('imagen');
            $nombre_original = $img->getClientName(); 
            $img->move(ROOTPATH . 'public/assets/img', $nombre_original);

            $data = [
                'nombre_prod'   => $this->request->getVar('nombre_prod'),
                'imagen'        => $nombre_original,
                'categoria_id'  => $this->request->getVar('categoria'),
                 'precio' => 'required|numeric|greater_than_equal_to[0]',
                'precio_vta' => 'required|numeric|greater_than_equal_to[0]',
                'stock' => 'required|integer|greater_than_equal_to[0]',
                'stock_min' => 'required|integer|greater_than_equal_to[0]',
                'eliminado'     => 'NO'
            ];

            $productoModel->insert($data);
            session()->setFlashdata('success', 'Alta Exitosa...');
            return redirect()->to('crear');
        }
    }

    // funciones de edición
    public function singleproducto($id = null){
        $productoModel = new producto_model();
        $data['producto'] = $productoModel->where('id', $id)->first();
        if (empty($data['producto'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('No se encontró el producto');
        }

        $categoriasM = new categorias_model();
        $data['categorias'] = $categoriasM->getCategorias();

        $dato['titulo'] = 'Editar Producto | StyleSmash';
        echo view('front/head_view', $dato);
        echo view('front/nav_view');
        echo view('back/productos/editar_producto', $data);
        echo view('front/footer_view');
    }

 public function modifica($id){
    $productoModel = new producto_model();
    $img = $this->request->getFile('imagen');

    $validationRules = [
        'nombre_prod' => [
            'rules' => 'required|min_length[3]',
            'errors' => [
                'required' => 'El nombre del producto es obligatorio.',
                'min_length' => 'El nombre debe tener al menos 3 caracteres.',
            ]
        ],
        'categoria' => [
            'rules' => 'required|is_not_unique[categorias.id]',
            'errors' => [
                'required' => 'Debés seleccionar una categoría.',
                'is_not_unique' => 'Debés seleccionar una categoría válida.'
            ]
        ],
        'precio' => [
            'rules' => 'required|numeric|greater_than_equal_to[0]',
            'errors' => [
                'required' => 'El precio es obligatorio.',
                'numeric' => 'El precio debe ser un número.',
                'greater_than_equal_to' => 'El precio no puede ser negativo.'
            ]
        ],
        'precio_vta' => [
            'rules' => 'required|numeric|greater_than_equal_to[0]',
            'errors' => [
                'required' => 'El precio de venta es obligatorio.',
                'numeric' => 'El precio de venta debe ser un número.',
                'greater_than_equal_to' => 'El precio de venta no puede ser negativo.'
            ]
        ],
        'stock' => [
            'rules' => 'required|integer|greater_than_equal_to[0]',
            'errors' => [
                'required' => 'El stock es obligatorio.',
                'integer' => 'El stock debe ser un número entero.',
                'greater_than_equal_to' => 'El stock no puede ser negativo.'
            ]
        ],
        'stock_min' => [
            'rules' => 'required|integer|greater_than_equal_to[0]',
            'errors' => [
                'required' => 'El stock mínimo es obligatorio.',
                'integer' => 'El stock mínimo debe ser un número entero.',
                'greater_than_equal_to' => 'El stock mínimo no puede ser negativo.'
            ]
        ],
        'imagen' => [
            'rules' => 'permit_empty|is_image[imagen]|mime_in[imagen,image/jpg,image/jpeg,image/png]',
            'errors' => [
                'is_image' => 'El archivo debe ser una imagen válida.',
                'mime_in' => 'La imagen debe ser JPG o PNG.'
            ]
        ]
    ];

    if (!$this->validate($validationRules)) {
        $data['producto'] = $productoModel->find($id);
        $categoriasModel = new \App\Models\categorias_model();
        $data['categorias'] = $categoriasModel->getCategorias();
        $data['validation'] = $this->validator;

        $dato['titulo'] = 'Editar Producto | StyleSmash';
        echo view('front/head_view', $dato);
        echo view('front/nav_view');
        echo view('back/productos/editar_producto', $data);
        echo view('front/footer_view');
        return;
    }

    if ($img && $img->isValid() && !$img->hasMoved()) {
        $nombre_original = $img->getClientName();
        $img->move(ROOTPATH . 'public/assets/img', $nombre_original);

        $data = [
            'nombre_prod'   => $this->request->getVar('nombre_prod'),
            'imagen'        => $nombre_original,
            'categoria_id'  => $this->request->getVar('categoria'),
            'precio'        => $this->request->getVar('precio'),
            'precio_vta'    => $this->request->getVar('precio_vta'),
            'stock'         => $this->request->getVar('stock'),
            'stock_min'     => $this->request->getVar('stock_min'),
        ];
    } else {
        $data = [
            'nombre_prod'   => $this->request->getVar('nombre_prod'),
            'categoria_id'  => $this->request->getVar('categoria'),
            'precio'        => $this->request->getVar('precio'),
            'precio_vta'    => $this->request->getVar('precio_vta'),
            'stock'         => $this->request->getVar('stock'),
            'stock_min'     => $this->request->getVar('stock_min'),
        ];
    }

    $productoModel->update($id, $data);
    session()->setFlashdata('success', 'Modificación Exitosa...');
    return redirect()->to('producto');
}

    public function deleteproducto($id){
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

        $dato['titulo'] = 'Productos Eliminados | StyleSmash';
        echo view('front/head_view', $dato);
        echo view('front/nav_view');
        echo view('back/productos/productos_eliminados', $data);
        echo view('front/footer_view');
    }

    public function activarproducto($id){
        $productoModel = new producto_model();
        $productoModel->update($id, ['eliminado' => 'NO']);
        session()->setFlashdata('success', 'Activación Exitosa...');
        return redirect()->to('producto');
    }
}
