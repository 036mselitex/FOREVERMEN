<?php include 'codeClientes.php'; ?>

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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Datos Del Cliente</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Cuerpo del modal -->
                        <div class="modal-body">

                            <div class="form-row">



                                <div class="form-group col-md-12">
                                    <label for="txtNombre">Numero Documento</label>
                                    <input type="text" class="form-control" require name="id_cliente" id="id_cliente" placeholder="" value="<?php echo $id_cliente ?>">
                                    <br>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="txtNombre">Nombre(s)</label>
                                    <input type="text" class="form-control" require name="nombre_cliente" id="nombre_cliente" placeholder="" value="<?php echo $nombre_cliente ?>">
                                    <br>
                                </div>


                                <div class="form-group col-md-12">
                                    <label for="txtApellidoP">Apellido(s) </label>
                                    <input type="text" class="form-control" require name="apellido_cliente" id="apellido_cliente" placeholder="" value="<?php echo $apellido_cliente ?>">

                                </div>

                                <div class="form-group col-md-12">
                                    <label for="txtApellidoM">Telefono </label>
                                    <input type="tel" class="form-control" require name="telefono_cliente" id="telefono_cliente" placeholder="" value="<?php echo $telefono_cliente ?>">

                                </div>

                                <div class="form-group col-md-12">
                                    <label for="txtCorreo">Direccion</label>
                                    <input type="text" class="form-control" require name="direccion_cliente" id="direccion_cliente" placeholder="" value="<?php echo $direccion_cliente ?>">
                                    <br>
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
                Agregar Cliente
            </button>





        </form>
        <!-- Final del Formulario -->


        <div class="row">


            <table class="table table-hover table-bordered">

                <thead class="thead-dark">

                    <tr>

                        <th scope="col">Identificacion</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Direccion</th>

                        <th scope="col">Seleccionar</th>
                        <th scope="col">Eliminar</th>
                    </tr>

                </thead>
                <tbody>

                    <?php
                    /* Prefunto que si la variable listaClientes tiene algun contenido */
                    if ($listaClientes->num_rows > 0) {

                        foreach ($listaClientes as $cliente) {

                    ?>

                            <tr>



                                <td> <?php echo $cliente['id_cliente']        ?> </td>
                                <td> <?php echo $cliente['nombre_cliente']    ?> </td>
                                <td> <?php echo $cliente['apellido_cliente'] ?> </td>
                                <td> <?php echo $cliente['telefono_cliente'] ?> </td>
                                <td> <?php echo $cliente['direccion_cliente']    ?> </td>


                                <!-- Este Formulario se utiliza para editar los registros -->
                                <form action="" method="post">

                                    <input type="hidden" name="id_cliente" value="<?php echo $cliente['id_cliente'];  ?>">
                                    <input type="hidden" name="nombre_cliente" value="<?php echo $cliente['nombre_cliente'];  ?>">
                                    <input type="hidden" name="apellido_cliente" value="<?php echo $cliente['apellido_cliente'];  ?>">
                                    <input type="hidden" name="telefono_cliente" value="<?php echo $cliente['telefono_cliente'];  ?>">
                                    <input type="hidden" name="direccion_cliente" value="<?php echo $cliente['direccion_cliente'];  ?>">


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