<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Ventas_cabecera_model;
use App\Models\Ventas_detalle_model;
use App\Models\producto_model;


class carrito_controller extends BaseController
{
    protected $cart;
    protected $session;

    public function __construct()
{
    helper(['form', 'url']);

    // Carga el carrito usando el servicio compartido de CodeIgniter
    $this->cart = \Config\Services::cart(); 

    $this->session = session();
}


    // Mostrar carrito
    public function index()
    {
        $carrito = $this->cart->contents();  // así se llama desde la librería
        $total = $this->cart->total();
       
        $data = [
        'carrito' => $carrito,
        'total'   => $total,
        'titulo'  => 'Mi Carrito'
        ];

        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('Back/carrito_view', $data);
        echo view('front/footer_view');

    }

    // Agregar producto al carrito
   public function agregar($id = null)
{
    $productoModel = new producto_model();
    $producto = $productoModel->find($id);

    if (!$producto) {
        return redirect()->to(base_url('carrito'))->with('mensaje', 'Producto no encontrado');
    }

    // Armar array para insertar en carrito
    $item = [
        'id'      => $producto['id'],
        'qty'     => 1,
        'price'   => $producto['precio_vta'],
        'name'    => $producto['nombre_prod'],
        'imagen'  => $producto['imagen'] ?? 'default.png', // opcional
    ];

    // Insertar en el carrito
    $this->cart->insert($item);

    // Mostrar contenido del carrito para prueba (luego quitar)
    // dd($this->cart->contents());

    return redirect()->to(base_url('carrito'))->with('mensaje', 'Producto agregado al carrito');
}


    // Eliminar un item
    public function elimina($rowid)
    {
        $this->cart->remove($rowid);
        return redirect()->back();
    }

    // Vaciar todo el carrito
    public function borrar()
    {
        $this->cart->destroy();
        return redirect()->back();
    }

    // Comprar (guardar en DB y vaciar carrito)
    public function comprar()
    {
        $cartItems = $this->cart->contents();

        if (empty($cartItems)) {
            return redirect()->back()->with('mensaje', 'El carrito está vacío.');
        }

        $cabeceraModel = new Ventas_cabecera_model();
        $detalleModel = new Ventas_detalle_model();

        $id_usuario = $this->session->get('id_usuario');
        $total = $this->cart->total();
        // Guardar cabecera
        $cabeceraModel->insert([
            'id_usuario' => $id_usuario,
            'fecha' => date('Y-m-d'),
            'total' => $total,
        ]);

        $id_venta = $cabeceraModel->insertID();

        // Guardar detalle
        foreach ($cartItems as $item) {
            $detalleModel->insert([
                'venta_id'    => $id_venta,
                'producto_id' => $item['id'],
                'cantidad'    => $item['qty'],
                'precio'      => $item['price'],
            ]);
        }

        $this->cart->destroy();
        return redirect()->to(base_url('/'))->with('mensaje', 'Compra realizada con éxito');
    }

     public function mis_compras()
    {

        $session = session();
        $id_usuario = $session->get('id_usuario');

        $ventasModel = new ventas_cabecera_model();
        $detallesModel = new ventas_detalle_model();
        $productoModel = new producto_model();

        // Trae todas las ventas del usuario
        $ventas = $ventasModel->where('id_usuario', $id_usuario)->findAll();

        $compras = [];

        foreach ($ventas as $venta) {
            $items = [];

            $detalles = $detallesModel->where('venta_id', $venta['venta_id'])->findAll();

            foreach ($detalles as $detalle) {
                $producto = $productoModel->find($detalle['id_producto']);

                if ($producto) {
                    $items[] = [
                        'nombre' => $producto['nombre'],
                        'imagen' => $producto['imagen'],
                        'precio_unitario' => $detalle['precio_unitario'],
                        'cantidad' => $detalle['cantidad'],
                        'subtotal' => $detalle['precio_unitario'] * $detalle['cantidad']
                    ];
                }
            }

            $compras[] = [
                'fecha' => $venta['fecha'],
                'items' => $items
            ];

        }

        $data['titulo'] = 'Mis Compras';
        
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('Back/mis_compras_view',  ['compras' => $compras]);
        echo view('front/footer_view');
    }


}


