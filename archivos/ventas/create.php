<?php
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');
include ('../app/controllers/ventas/listado_de_ventas.php');

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
                            <!-- modal para visualizar datos de los proveedor -->
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
                                                    $contador = 0;
                                                    foreach ($productos_datos as $productos_dato){
                                                        $id_producto = $productos_dato['id_producto']; ?>
                                                        <tr>
                                                            <td><?php echo $contador = $contador + 1; ?></td>
                                                            <td>
                                                                <button class="btn btn-info" id="btn_selecionar<?php echo $id_producto;?>">
                                                                    Selecionar
                                                                </button>
                                                                <script>
                                                                    $('#btn_selecionar<?php echo $id_producto;?>').click(function () {


                                                                        var id_producto = "<?php echo $productos_dato['id_producto'];?>";
                                                                        $('#id_producto').val(id_producto);

                                                                        var codigo = "<?php echo $productos_dato['codigo'];?>";
                                                                        $('#codigo').val(codigo);

                                                                        var categoria = "<?php echo $productos_dato['categoria'];?>";
                                                                        $('#categoria').val(categoria);

                                                                        var nombre = "<?php echo $productos_dato['nombre'];?>";
                                                                        $('#nombre_producto').val(nombre);

                                                                        var email = "<?php echo $productos_dato['email'];?>";
                                                                        $('#usuario_producto').val(email);

                                                                        var descripcion = "<?php echo $productos_dato['descripcion'];?>";
                                                                        $('#descripcio_producto').val(descripcion);

                                                                        var stock = "<?php echo $productos_dato['stock'];?>";
                                                                        $('#stock').val(stock);
                                                                        $('#stock_actual').val(stock);

                                                                        var stock_minimo = "<?php echo $productos_dato['stock_minimo'];?>";
                                                                        $('#stock_minimo').val(stock_minimo);

                                                                        var stock_maximo = "<?php echo $productos_dato['stock_maximo'];?>";
                                                                        $('#stock_maximo').val(stock_maximo);

                                                                        var precio_compra = "<?php echo $productos_dato['precio_compra'];?>";
                                                                        $('#precio_compra').val(precio_compra);

                                                                        var precio_venta = "<?php echo $productos_dato['precio_venta'];?>";
                                                                        $('#precio_venta').val(precio_venta);

                                                                        var fecha_ingreso = "<?php echo $productos_dato['fecha_ingreso'];?>";
                                                                        $('#fecha_ingreso').val(fecha_ingreso);

                                                                        var ruta_img = "<?php echo $URL.'/almacen/img_productos/'.$productos_dato['imagen'];?>";
                                                                        $('#img_producto').attr({src: ruta_img });

                                                                        $('#modal-buscar_producto').modal('toggle');

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
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>

                            <br>

                            Aquí debe ir la tabla
                            <div class="table-responsive">
                                <table class="table table-bordered">

                                </table>
                            </div>


                        </div>

                    </div>

                </div>

                <div id="respuesta_create"></div>

            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fa fa-user-check"></i> Datos del Cliente
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body">
                            Hello
                        </div>

                    </div>

                </div>

                <div id="respuesta_create"></div>

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

