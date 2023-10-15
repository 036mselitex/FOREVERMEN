<?php include 'codeDetalle_factura.php'; ?>

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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Detalle de la factura</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Cuerpo del modal -->
                        <div class="modal-body">

                            <div class="form-row">



                                <div class="form-group col-md-12">
                                    <label for="txtNombre">Numero del detalle</label>
                                    <input type="text" class="form-control" require name="id_detalle" id="id_detalle" placeholder="" value="<?php echo $id_detalle ?>">
                                    <br>
                                </div>

                                    <div class="form-group col-md-12">

                                    <label for="id_factura">Numero de la factura</label>


                                    <select name="id_factura" id="id_factura" class="form-control">

                                        <?php

                                        if ($listaFacturas->num_rows > 0) {
                                            foreach ($listaFacturas as $factura) {
                                                echo " <option value='' hidden > Seleccione el Numero</option> ";
                                                echo " <option value='{$factura['id_factura']}'> {$factura['id_factura']} </option> ";
                                            }
                                        } else {

                                            echo "<h2> No tenemos resultados </h2>";
                                        }
                                        ?>
                                    </select>


                                </div>


                                    <div class="form-group col-md-12">

                                    <label for="id_producto">Numero del producto</label>


                                    <select name="id_producto" id="id_producto" class="form-control">

                                        <?php

                                        if ($listaProducto->num_rows > 0) {
                                            foreach ($listaProducto as $producto) {
                                                echo " <option value='' hidden > Seleccione el Numero</option> ";
                                                echo " <option value='{$producto['id_producto']}'> {$producto['id_producto']} </option> ";
                                            }
                                        } else {

                                            echo "<h2> No tenemos resultados </h2>";
                                        }
                                        ?>
                                    </select>


                                </div>


                                <div class="form-group col-md-12">
                                    <label for="txtApellidoM">Cantidad </label>
                                    <input type="tel" class="form-control" require name="cantidad" id="cantidad" placeholder="" value="<?php echo $cantidad ?>">

                                </div>

                               





                            </div>
                        </div>

                        <!-- Pie/Footer del modal -->
                        <div class="modal-footer">

                            <button value="btnAgregar" class="btn btn-success" type="submit" name="accion">Agregar</button>
                            <button value="btnModificar" class="btn btn-warning" type="submit" name="accion">Modificar</button>
                            <button value="btnEliminar" class="btn btn-danger" type="submit" name="accion">Eliminar</button>
                            <button value="btnCancelar" class="btn btn-primary" type="submit" name="accion">Cancelar</button>

                        </div>

                    </div>
                </div>
            </div>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Agregar Detalle de la factura
            </button>





        </form>
        <!-- Final del Formulario -->


        <div class="row">


            <table class="table table-hover table-bordered">

                <thead class="thead-dark">

                    <tr>

                        <th scope="col">Numero del detalle </th>
                        <th scope="col">Numero de la factura</th>
                        <th scope="col">Numero del producto</th>
                        <th scope="col">Cantidad</th>


                        <th scope="col">Seleccionar</th>
                        <th scope="col">Eliminar</th>
                    </tr>

                </thead>
                <tbody>

                    <?php
                    /* Prefunto que si la variable listaClientes tiene algun contenido */
                    if ($listaDetalle_factura->num_rows > 0) {

                        foreach ($listaDetalle_factura as $detalle_factura) {

                    ?>

                            <tr>



                                <td> <?php echo $detalle_factura['id_detalle'] ?> </td>
                                <td> <?php echo $detalle_factura['id_factura']    ?> </td>
                                <td> <?php echo $detalle_factura['id_producto'] ?> </td>
                                <td> <?php echo $detalle_factura['cantidad'] ?> </td>


                                <!-- Este Formulario se utiliza para editar los registros -->
                                <form action="" method="post">

                                    <input type="hidden" name="id_detalle" value="<?php echo $detalle_factura['id_detalle'];  ?>">
                                    <input type="hidden" name="id_factura" value="<?php echo $detalle_factura['id_factura'];  ?>">
                                    <input type="hidden" name="id_producto" value="<?php echo $detalle_factura['id_producto'];  ?>">
                                    <input type="hidden" name="cantidad" value="<?php echo $detalle_factura['cantidad'];  ?>">
  


                                    <td><input type="submit" class="btn btn-info" value="Seleccionar"></td>
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