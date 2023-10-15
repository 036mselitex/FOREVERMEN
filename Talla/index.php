<?php include 'codeTalla.php'; ?>

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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Datos Del La Talla</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Cuerpo del modal -->
                        <div class="modal-body">

                            <div class="form-row">



                                <div class="form-group col-md-12">
                                    <label for="txtNombre">Numero de la talla</label>
                                    <input type="text" class="form-control" require name="id_talla" id="id_talla" placeholder="" value="<?php echo $id_talla ?>">
                                    <br>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="txtNombre">Nombre de la talla</label>
                                    <input type="text" class="form-control" require name="nombre_talla" id="nombre_talla" placeholder="" value="<?php echo $nombre_talla ?>">
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

                        <th scope="col">Numero de la talla</th>
                        <th scope="col">Nombre de la talla</th>
                

                        <th scope="col">Seleccionar</th>
                        <th scope="col">Eliminar</th>
                    </tr>

                </thead>
                <tbody>

                    <?php
                    /* Prefunto que si la variable listaClientes tiene algun contenido */
                    if ($listaTalla->num_rows > 0) {

                        foreach ($listaTalla as $talla) {

                    ?>

                            <tr>



                                <td> <?php echo $talla['id_talla']        ?> </td>
                                <td> <?php echo $talla['nombre_talla']    ?> </td>
                   

                                <!-- Este Formulario se utiliza para editar los registros -->
                                <form action="" method="post">

                                    <input type="hidden" name="id_talla" value="<?php echo $talla['id_talla'];  ?>">
                                    <input type="hidden" name="nombre_talla" value="<?php echo $talla['nombre_talla'];  ?>">
                                  


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