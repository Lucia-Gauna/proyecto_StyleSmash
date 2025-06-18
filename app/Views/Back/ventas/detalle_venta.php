<style>
    nav{
        background-color:rgb(39, 39, 38);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    body{
    background-color:rgb(223, 215, 197);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
</style>
<main class="container my-4">
    <h2><?= $titulo ?> - ID #<?= $venta_id ?></h2>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Producto</th>
                <th>Precio Unitario</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $total = 0;
            foreach ($detalles as $item): 
                $subtotal = $item['cantidad'] * $item['precio'];
                $total += $subtotal;
            ?>
                <tr>
                    <td><?= $item['producto_nombre'] ?></td>
                    <td>$<?= number_format($item['precio'], 2) ?></td>
                    <td><?= $item['cantidad'] ?></td>
                    <td>$<?= number_format($subtotal, 2) ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <div class="text-end">
        <h4>Total de la Venta: <strong>$<?= number_format($total, 2) ?></strong></h4>
    </div>
</main>
