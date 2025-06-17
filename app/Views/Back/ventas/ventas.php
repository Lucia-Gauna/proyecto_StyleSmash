<?php
  $session=session();
  if(empty($venta)) {?>
    <div class="container">
        <div class="alert alet-dark text-center" role="alert">
            <h4 class="alert-heading"> No posee ventas registradas</h4>
            <p></p>
            <hr>
            <a class="btn btn-warning my-2 w-10" href="<?php echo base_url('catalogo') ?>">Catalogo</a>
        </div>
        <?php }?>
     </div>
  <div class="row container-fluid">
    <div class="table-responsive-sm text center">
        <h1 class="text-center display-4">DETALLE DE VENTAS</h1>
            <table class="table table-secondary table-striped rounded" id="user-list">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th>N° orden</th>
                        <th>Usuario</th>
                        <th>nombre producto</th>
                        <th>imagen</th>
                        <th>cantidad</th>
                        <th>costo</th>
                        <th>subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i =0; $total =0; ?>
                    <?php if (!empty($venta) && is_array($venta)) {
    foreach ($venta as $row) {
        $imagen = $row['imagen'];
        $i++;
        $subtotal = $row['precio_vta'] * $row['cantidad'];
        $total += $subtotal;
?>
        <tr class="text-center">
            <th><?= $i ?></th>
            <td><?= $row['nombre'] ?></td>
            <td><?= $row['nombre_prod'] ?></td>
            <td><img width="100" height="55" src="<?= base_url('assets/uploads/' . $imagen) ?>"></td>
            <td><?= number_format($row["cantidad"]) ?></td>
            <td>$<?= number_format($row['precio_vta'], 2) ?></td>
            <td>$<?= number_format($subtotal, 2) ?></td>
        </tr>
<?php
    } // fin foreach
} // fin if
?>
                    
                </tbody>
            </table>
            <tfoot>
                <tr>
                    <td colspan="5" class="text-right"> <h4>Total Ventas</h4></td>
                    <td colspan="6" class="text-right"><h4>$<?php echo number_format($total, 2) ?></h4></td>
                </tr>
            </tfoot>
            <?php}?>
    </div>
  </div>

  <script> src="https://code.jquery.com/jquery-3.5.3.slim.min.js"</script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function(){
        $('#user-list').DataTable();
    });
  </script>