<?php include 'codeDepartamento.php'; ?>

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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Departamento</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Cuerpo del modal -->
                        <div class="modal-body">

                            <div class="form-row">



                                <div class="form-group col-md-12">
                                    <label for="txtNombre">Numero de departamento</label>
                                    <input type="text" class="form-control" require name="id_departamento" id="id_departamento" placeholder="" value="<?php echo $id_departamento ?>">
                                    <br>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="txtNombre">Nombre del departamento</label>
                                    <input type="text" class="form-control" require name="nombre_departamento" id="nombre_departamento" placeholder="" value="<?php echo $nombre_departamento ?>">
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
                Agregar Departamento
            </button>





        </form>
        <!-- Final del Formulario -->


        <div class="row">


            <table class="table table-hover table-bordered">

                <thead class="thead-dark">

                    <tr>

                        <th scope="col">Numero del departamento</th>
                        <th scope="col">Nombre del departamento</th>

                        <th scope="col">Seleccionar</th>
                        <th scope="col">Eliminar</th>
                    </tr>

                </thead>
                <tbody>

                    <?php
                    /* Prefunto que si la variable listaClientes tiene algun contenido */
                    if ($listaDepartamento->num_rows > 0) {

                        foreach ($listaDepartamento as $departamento) {

                    ?>

                            <tr>



                                <td> <?php echo $departamento['id_departamento']        ?> </td>
                                <td> <?php echo $departamento['nombre_departamento']    ?> </td>


                                <!-- Este Formulario se utiliza para editar los registros -->
                                <form action="" method="post">

                                    <input type="hidden" name="id_departamento" value="<?php echo $departamento['id_departamento'];  ?>">
                                    <input type="hidden" name="nombre_departamento" value="<?php echo $departamento['nombre_departamento'];  ?>">


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