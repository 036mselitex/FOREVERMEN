<?php include 'codeFacturas.php'; ?>

<?php include("../paginas/head.php") ?>

<div class="container">
    <div class="row">




        <form action="" method="post">



            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- cabecera del modal -->
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Factura</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Cuerpo del modal -->
                        <div class="modal-body">

                            <div class="form-row">





                                <!-- Selector de EMPLEADOS -->
                                <div class="form-group col-md-12">

                                    <label for="id_empleado">Empleado</label>


                                    <select name="id_empleado" id="id_empleado" class="form-control">

                                        <?php

                                        if ($listaEmpleados->num_rows > 0) {
                                            foreach ($listaEmpleados as $empleado) {
                                                echo " <option value='' hidden > Seleccione el Empleado</option> ";
                                                echo " <option value='{$empleado['id']}'> {$empleado['id']} {$empleado['nombre']} {$empleado['apellidoP']} </option> ";
                                            }
                                        } else {

                                            echo "<h2> No tenemos resultados </h2>";
                                        }
                                        ?>
                                    </select>


                                </div>

                                <!-- FIN SELECTOR EMPLEADO -->



                                <!-- INICIO SELECTOR CLIENTE -->

                                <div class="form-group col-md-12">

                                    <label for="id_cliente">Cliente</label>


                                    <select name="id_cliente" id="id_cliente" class="form-control">

                                        <?php

                                        if ($listaClientes->num_rows > 0) {
                                            foreach ($listaClientes as $cliente) {
                                                echo " <option value='' hidden > Seleccione el Cliente</option> ";
                                                echo " <option value='{$cliente['id_cliente']}'> {$cliente['id_cliente']} {$cliente['nombre_cliente']} {$cliente['apellido_cliente']} </option> ";
                                            }
                                        } else {

                                            echo "<h2> No tenemos resultados </h2>";
                                        }
                                        ?>
                                    </select>


                                </div>

                                <div class="form-group col-md-12">

                                    <label for="id_empleado">Producto</label>


                                    <select name="id_producto" id="id_producto" class="form-control">

                                        <?php

                                        if ($listaProducto->num_rows > 0) {
                                            foreach ($listaProducto as $producto) {
                                                echo " <option value='' hidden > Seleccione el Producto</option> ";
                                                echo " <option value='{$producto['id_producto']}'> {$producto['id_producto']} </option> ";
                                            }
                                        } else {

                                            echo "<h2> No tenemos resultados </h2>";
                                        }
                                        ?>
                                    </select>


                                </div>
                                <!-- FIN SELECTOR CLIENTE -->

                                <div class="form-group col-md-12">
                                    <label for="cantidad">Cantidad</label>
                                    <input type="text" class="form-control" require name="cantidad" id="cantidad" placeholder="" value="<?php echo $cantidad ?>">
                                    <br>
                                </div>


                                <div class="form-group col-md-12">
                                    <label for="detalle">Detalle</label>
                                    <input type="text" class="form-control" require name="detalle" id="detalle" placeholder="Detalle de la factura" value="<?php echo $detalle ?>">
                                    <br>
                                </div>



                            </div>
                        </div>

                        <!-- Pie/Footer del modal -->
                        <div class="modal-footer btn-group">
                            <div class="btn-group col-md-12">
                                <button value="btnAgregar" class="btn btn-success col-md-6 " type="submit" name="accion">Agregar</button>
                                <button value="btnCancelar" class="btn btn-primary col-md-6 " type="submit" name="accion">Cancelar</button>
                            </div>
                        </div>



                    </div>
                </div>
            </div>

            <!-- Boton del modal -->
            <button type="button" class="btn btn-primary col-md-12" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Agregar Factura
            </button>





        </form>
        <!-- Final del Formulario -->


        <div class="row">


            <table class="table table-hover table-bordered">

                <thead class="thead-dark">

                    <tr>

                        <th scope="col">Numero de Factura</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Empleado</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Numero del Producto</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Detalle</th>


                        <th scope="col">Eliminar</th>
                    </tr>

                </thead>
                <tbody>

                    <?php
                    /* Prefunto que si la variable listaClientes tiene algun contenido */
                    if ($listaFacturas->num_rows > 0) {

                        foreach ($listaFacturas as $factura) {

                    ?>

                            <tr>



                                <td> <?php echo $factura['id_factura']  ?> </td>
                                <td> <?php echo $factura['fecha']       ?> </td>
                                <td> <?php echo $factura['id_empleado']," ",$factura['nombre'], " ", $factura['apellidoP'], " ",$factura['apellidoM']          ?> </td>
                                <td> <?php echo $factura['id_cliente'], " ", $factura['nombre_cliente'], " ", $factura['apellido_cliente']         ?> </td>
                                <td> <?php echo $factura['id_producto']," ", $factura['nombre_producto']    ?> </td>
                                <td> <?php echo $factura['cantidad']  ?> </td>
                                <td> <?php echo $factura['detalle']     ?> </td>


                                <!-- Este Formulario se utiliza para editar los registros -->
                                <form action="" method="post">

                                    <input type="hidden" name="id_factura" value="<?php echo $factura['id_factura'];  ?>">
                                    <input type="hidden" name="fecha" value="<?php echo $factura['fecha'];  ?>">
                                    <input type="hidden" name="nombre_cliente" value="<?php echo $factura['id_empleado'];  ?>">
                                    <input type="hidden" name="apellido_cliente" value="<?php echo $factura['id_cliente'];  ?>">
                                    <input type="hidden" name="id_producto" value="<?php echo $factura['id_producto'];  ?>">
                                    <input type="hidden" name="cantidad" value="<?php echo $factura['cantidad'];  ?>">
                                    <input type="hidden" name="telefono_cliente" value="<?php echo $factura['detalle'];  ?>">




                                    <td><button value="btnEliminar" class="btn btn-danger" type="submit" name="accion">Eliminar</button></td>

                                </form>


                            </tr>


                    <?php

                        }
                    } else {

                        echo "<h2> No tenemos resultados </h2>";
                    }

                    ?>


                </tbody>
            </table>

        </div>


    </div>
</div>

<?php include("../paginas/footer.php") ?>