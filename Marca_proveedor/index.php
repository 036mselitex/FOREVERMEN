<?php include 'codeMarca_proveedor.php'; ?>

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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Datos</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Cuerpo del modal -->
                        <div class="modal-body">

                            <div class="form-row">



                                <div class="form-group col-md-12">
                                    <label for="txtNombre">Numero de la marca del proveedor</label>
                                    <input type="text" class="form-control" require name="id_marca_proveedor" id="id_marca_proveedor" placeholder="" value="<?php echo $id_marca_proveedor ?>">
                                    
                                </div>

                                 <div class="form-group col-md-12">

                                    <label for="id_marca">Numero de la marca</label>


                                    <select name="id_marca" id="id_marca" class="form-control">

                                        <?php

                                        if ($listaMarca->num_rows > 0) {
                                            foreach ($listaMarca as $marca) {
                                                echo " <option value='' hidden > Seleccione el Numero</option> ";
                                                echo " <option value='{$marca['id_marca']}'> {$marca['id_marca']}</option> ";
                                            }
                                        } else {

                                            echo "<h2> No tenemos resultados </h2>";
                                        }
                                        ?>
                                    </select>


                                </div>



                               <div class="form-group col-md-12">

                                    <label for="id_talla">Numero de la talla</label>


                                    <select name="id_talla" id="id_talla" class="form-control">

                                        <?php

                                        if ($listaTalla->num_rows > 0) {
                                            foreach ($listaTalla as $talla) {
                                                echo " <option value='' hidden > Seleccione el Numero</option> ";
                                                echo " <option value='{$talla['id_talla']}'> {$talla['id_talla']}</option> ";
                                            }
                                        } else {

                                            echo "<h2> No tenemos resultados </h2>";
                                        }
                                        ?>
                                    </select>


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
                Agregar 
            </button>





        </form>
        <!-- Final del Formulario -->


        <div class="row">


            <table class="table table-hover table-bordered">

                <thead class="thead-dark">

                    <tr>

                        <th scope="col">Numero de la marca del proveedor</th>
                        <th scope="col">Numero de la marca</th>
                        <th scope="col">Numero de la talla</th>

                        <th scope="col">Seleccionar</th>
                        <th scope="col">Eliminar</th>
                    </tr>

                </thead>
                <tbody>

                    <?php
                    /* Prefunto que si la variable listaClientes tiene algun contenido */
                    if ($listaMarca_proveedor->num_rows > 0) {

                        foreach ($listaMarca_proveedor as $marca_proveedor) {

                    ?>

                            <tr>



                                <td> <?php echo $marca_proveedor['id_marca_proveedor']        ?> </td>
                                <td> <?php echo $marca_proveedor['id_marca']    ?> </td>
                                <td> <?php echo $marca_proveedor['id_talla'] ?> </td>



                                <!-- Este Formulario se utiliza para editar los registros -->
                                <form action="" method="post">

                                    <input type="hidden" name="id_marca_proveedor" value="<?php echo $marca_proveedor['id_marca_proveedor'];  ?>">
                                    <input type="hidden" name="id_marca" value="<?php echo $marca_proveedor['id_marca'];  ?>">
                                    <input type="hidden" name="id_talla" value="<?php echo $marca_proveedor['id_talla'];  ?>">


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