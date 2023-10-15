<?php include 'codeProveedor.php'; ?>

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
                    
                                <div class="form-group col-md-12">
                                    <label for="txtNombre">Numero  del proveedor</label>
                                    <input type="text" class="form-control" require name="id_proveedor" id="id_proveedor" placeholder="" value="<?php echo $id_proveedor ?>">
                                    
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="txtNombre">Nombre del proveedor</label>
                                    <input type="text" class="form-control" require name="nombre_proveedor" id="nombre_proveedor" placeholder="" value="<?php echo $nombre_proveedor ?>">
                                    
                                </div>


                                 <div class="modal-body">

                            <div class="form-row">

                            <div class="form-group col-md-12">

                                    <label for="id_departamento">Numero del departamento</label>


                                    <select name="id_departamento" id="id_departamento" class="form-control">

                                        <?php

                                        if ($listaDepartamento->num_rows > 0) {
                                            foreach ($listaDepartamento as $departamento) {
                                                echo " <option value='' hidden > Seleccione el Numero</option> ";
                                                echo " <option value='{$departamento['id_departamento']}'> {$departamento['id_departamento']} </option> ";
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

                        <th scope="col">Numero del proveedor</th>
                        <th scope="col">Nombre del proveedor</th>
                        <th scope="col">Numero del departamento</th>

                        <th scope="col">Seleccionar</th>
                        <th scope="col">Eliminar</th>
                    </tr>

                </thead>
                <tbody>

                    <?php
                    /* Prefunto que si la variable listaClientes tiene algun contenido */
                    if ($listaProveedor->num_rows > 0) {

                        foreach ($listaProveedor as $proveedor) {

                    ?>

                            <tr>



                                <td> <?php echo $proveedor['id_proveedor']        ?> </td>
                                <td> <?php echo $proveedor['nombre_proveedor']    ?> </td>
                                <td> <?php echo $proveedor['id_departamento'] ?> </td>



                                <!-- Este Formulario se utiliza para editar los registros -->
                                <form action="" method="post">

                                    <input type="hidden" name="id_proveedor" value="<?php echo $proveedor['id_proveedor'];  ?>">
                                    <input type="hidden" name="nombre_proveedor" value="<?php echo $proveedor['nombre_proveedor'];  ?>">
                                    <input type="hidden" name="id_departamento" value="<?php echo $proveedor['id_departamento'];  ?>">


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