<?php
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');
include ('../app/controllers/almacen/listado_de_productos.php');
include ('../app/controllers/ventas/listado_de_ventas.php');
include ('../app/controllers/clientes/listado_de_clientes.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Ventas</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <?php
                            $contador_de_ventas = 0;
                            foreach ($ventas_datos as $venta_dato)
                            {
                                $contador_de_ventas++;
                            }
                            ?>
                            <h3 class="card-title"><i class="fa fa-shopping-bag"></i> Venta Nro.
                                <input class="text-center" type="text" value="<?php echo $contador_de_ventas + 1; ?>" disabled>
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                            <div class="card-body">
                                <b>carrito</b>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#modal-buscar_producto">
                                    <i class="fa fa-search"></i>
                                    Buscar producto
                                </button>
                                <div class="modal fade" id="modal-buscar_producto">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color: #1d36b6;color: white">
                                                <h4 class="modal-title">Busqueda del producto</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="table table-responsive">
                                                    <table id="example1" class="table table-bordered table-striped table-sm">
                                                        <thead>
                                                        <tr>
                                                            <th><center>Nro</center></th>
                                                            <th><center>Selecionar</center></th>
                                                            <th><center>Código</center></th>
                                                            <th><center>Categoría</center></th>
                                                            <th><center>Imagen</center></th>
                                                            <th><center>Nombre</center></th>
                                                            <th><center>Descripción</center></th>
                                                            <th><center>Stock</center></th>
                                                            <th><center>Precio compra</center></th>
                                                            <th><center>Precio venta</center></th>
                                                            <th><center>Fecha compra</center></th>
                                                            <th><center>Usuario</center></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        $contador_de_ventas = 0;
                                                        foreach ($productos_datos as $productos_dato){
                                                            $id_producto = $productos_dato['id_producto']; ?>
                                                            <tr>
                                                                <td><?php echo $contador_de_ventas = $contador_de_ventas + 1; ?></td>
                                                                <td>
                                                                    <button class="btn btn-info" id="btn_seleccionar_<?php echo $id_producto;?>">
                                                                        Selecionar
                                                                    </button>
                                                                    <script>
                                                                        $('#btn_seleccionar_<?php echo $id_producto;?>').click(function () {

                                                                            var id_producto = "<?php echo $id_producto?>";
                                                                            $('#id_producto').val(id_producto);
                                                                            var producto = "<?php echo $productos_dato['nombre'];?>";
                                                                            $('#producto').val(producto);
                                                                            var descripcion = "<?php echo $productos_dato['descripcion'];?>";
                                                                            $('#detalle').val(descripcion);
                                                                            var precio_venta = "<?php echo $productos_dato['precio_venta'];?>";
                                                                            $('#precioUnitario').val(precio_venta);
                                                                            $('#cantidad').focus();

                                                                        });
                                                                    </script>
                                                                </td>
                                                                <td><?php echo $productos_dato['codigo'];?></td>
                                                                <td><?php echo $productos_dato['categoria'];?></td>
                                                                <td>
                                                                    <img src="<?php echo $URL."/almacen/img_productos/".$productos_dato['imagen'];?>" width="50px" alt="asdf">
                                                                </td>
                                                                <td><?php echo $productos_dato['nombre'];?></td>
                                                                <td><?php echo $productos_dato['descripcion'];?></td>
                                                                <td><?php echo $productos_dato['stock'];?></td>
                                                                <td><?php echo $productos_dato['precio_compra'];?></td>
                                                                <td><?php echo $productos_dato['precio_venta'];?></td>
                                                                <td><?php echo $productos_dato['fecha_ingreso'];?></td>
                                                                <td><?php echo $productos_dato['email'];?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                        </tbody>
                                                        </tfoot>
                                                    </table>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <input type="text" id="id_producto" hidden>
                                                                <label for="">Producto</label>
                                                                <input type="text" id="producto" class="form-control" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="">Detalle</label>
                                                                <input type="text" id="detalle" class="form-control" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="">Cantidad</label>
                                                                <input type="number" id="cantidad" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="">Precio Unitario</label>
                                                                <input type="text" id="precioUnitario" class="form-control" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button style="float:right" id="btn_registrar_carrito" class="btn btn-primary">Registrar</button>
                                                    <div id="respuesta_carrito" >

                                                    </div>
                                                    <script>
                                                        $('#btn_registrar_carrito').click(function() {
                                                           console.log("Funciona");
                                                                var nro_venta = '<?php echo $contador_de_ventas + 1 ;?>';
                                                                var id_producto = $('#id_producto').val();
                                                                var cantidad = $('#cantidad').val();

                                                                if(id_producto == ""){
                                                                    alert("Debe de llenar los campos ...");
                                                                }else if(cantidad == ""){
                                                                    alert("Debe de llenar todos los campos ...");
                                                                }else{
                                                                    var url = "../app/controllers/ventas/registrar_carrito.php";
                                                                    $.get(url,{nro_venta:nro_venta,id_producto:id_producto,cantidad:cantidad}, function(datos){
                                                                            $('#respuesta_carrito').html(datos);
                                                                        }
                                                                    );

                                                                }
                                                            }
                                                        );
                                                    </script>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered table-sm table-hover table-stripped">
                                        <thead>
                                        <tr>
                                            <th style="background-color: #e7e7e7; text-align: center">Nro</th>
                                            <th style="background-color: #e7e7e7; text-align: center">Producto</th>
                                            <th style="background-color: #e7e7e7; text-align: center">Descripcion</th>
                                            <th style="background-color: #e7e7e7; text-align: center">Cantidad</th>
                                            <th style="background-color: #e7e7e7; text-align: center">Precio Unitario</th>
                                            <th style="background-color: #e7e7e7; text-align: center">Precio SubTotal</th>
                                            <th style="background-color: #e7e7e7; text-align: center">Acción</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $contador_de_carrito = 0;
                                        $cantidad_total = 0;
                                        $precio_unitario_total = 0;
                                        $nro_venta = $contador_de_ventas + 1;
                                        $sql_carrito = "SELECT *,pro.nombre as nombre_producto, pro.descripcion as descripcion, pro.precio_venta as precio_venta FROM tb_carrito AS carr INNER JOIN tb_almacen as pro ON carr.id_producto=pro.id_producto WHERE nro_venta = '$nro_venta' ORDER BY id_carrito DESC";
                                        $query_carrito = $pdo->prepare($sql_carrito);
                                        $query_carrito->execute();
                                        $carrito_datos = $query_carrito->fetchAll(PDO::FETCH_ASSOC);

                                        foreach($carrito_datos as $carrito_dato)
                                        {
                                            $id_carrito = $carrito_dato['id_carrito'];
                                            $contador_de_carrito = $contador_de_carrito + 1;
                                            $cantidad_total = $cantidad_total + $carrito_dato['cantidad'];
                                            $precio_unitario_total = $precio_unitario_total + floatval($carrito_dato['precio_venta']);
                                            //$precio_total = 0;
                                            ?>
                                            <tr>
                                                <td><center><?php echo $contador_de_carrito; ?> </center></td>
                                                <td><?php echo $carrito_dato['nombre_producto']; ?> </td>
                                                <td><?php echo $carrito_dato['descripcion']; ?> </td>
                                                <td><center><?php echo $carrito_dato['cantidad']; ?> </center></td>
                                                <td><?php echo $carrito_dato['precio_venta']; ?> </td>
                                                <td>
                                                    <center>
                                                        <?php
                                                        $cantidad = floatval($carrito_dato['cantidad']);
                                                        $precio_venta= floatval($carrito_dato['precio_venta']);
                                                        echo $subtotal = $cantidad * $precio_venta;
                                                        //$precio_total = $precio_total + $subtotal;

                                                        ?>
                                                    </center>
                                                </td>
                                                <td>
                                                    <center>
                                                        <form action="../app/controllers/ventas/borrar_carrito.php" method="POST">
                                                            <input type="text" class="form-control" value="<?php echo $id_carrito ;?>">
                                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Borrar</button>
                                                        </form>
                                                    </center>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        <tr>
                                            <th colspan="3" style="background-color: #e7e7e7; text-align: right" >Total</th>
                                            <th>
                                                <center>
                                                    <?php echo $cantidad_total; ?>
                                                </center>
                                            </th>
                                            <th><center>
                                                    <?php echo $precio_unitario_total;?>
                                                </center></th>
                                            <th><center>
                                                    <?php // echo $precio_total; ?>
                                                </center></th>
                                        </tr>

                                        </tbody>
                                    </table>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fa fa-user-check"></i> Datos del cliente.</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <b>Cliente</b>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modal-buscar_cliente">
                                <i class="fa fa-search"></i>
                                Buscar cliente
                            </button>
                            <div class="modal fade" id="modal-buscar_cliente">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #1d36b6;color: white">
                                            <h4 class="modal-title">Busqueda del cliente</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table table-responsive">
                                                <table id="example1" class="table table-bordered table-striped table-sm">
                                                    <thead>
                                                    <tr>
                                                        <th><center>Nro</center></th>
                                                        <th><center>Selecionar</center></th>
                                                        <th><center>Nombre del Cliente</center></th>
                                                        <th><center>NIT/CT</center></th>
                                                        <th><center>Celular</center></th>
                                                        <th><center>Correo</center></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $contador_de_clientes = 0;
                                                    foreach ($clientes_datos as $clientes_dato){
                                                        $id_cliente= $clientes_dato['id_cliente'];
                                                        $contador_de_clientes = $contador_de_clientes + 1;
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $contador_de_clientes; ?></td>
                                                            <td>
                                                                <button class="btn btn-info" id="btn_selecionar<?php echo $id_producto;?>">
                                                                    Selecionar
                                                                </button>
                                                            </td>
                                                            <td>
                                                                <?php echo $clientes_dato['nombre_cliente'] ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $clientes_dato['nit_ci_cliente'] ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $clientes_dato['celular_cliente'] ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $clientes_dato['email_cliente'] ?>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    </tbody>
                                                    </tfoot>
                                                </table>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">

                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">

                                                    </div>
                                                    <div class="col-md-3">

                                                    </div>
                                                    <div class="col-md-3">

                                                    </div>
                                                </div>
                                                <button style="float:right" id="" class="btn btn-primary">Registrar</button>
                                                <div id="respuesta_carrito" >

                                                </div>
                                                <script>

                                                </script>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        </div>
                    </div>


                </div>

            </div>


        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include ('../layout/mensajes.php'); ?>
<?php include ('../layout/parte2.php'); ?>



<script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Productos",
                "infoEmpty": "Mostrando 0 a 0 de 0 Productos",
                "infoFiltered": "(Filtrado de _MAX_ total Productos)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Productos",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true, "lengthChange": true, "autoWidth": false,

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });


    $(function () {
        $("#example2").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Proveedores",
                "infoEmpty": "Mostrando 0 a 0 de 0 Proveedores",
                "infoFiltered": "(Filtrado de _MAX_ total Proveedores)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Proveedores",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true, "lengthChange": true, "autoWidth": false,

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>

