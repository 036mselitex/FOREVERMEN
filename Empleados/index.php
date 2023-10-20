<?php include 'codeEmpleados.php'; ?>

<?php include("../paginas/head.php") ?>

<div class="container">
    <div class="row">



        <!-- enctype="multipart/form-data" se utiliza para tratar la fotografia -->
        <form action="" method="post" enctype="multipart/form-data">



            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- cabecera del modal -->
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Datos Del Empleado</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Cuerpo del modal -->
                        <div class="modal-body">

                            <div class="form-row">

                            <div class="form-group col-md-12">
                                    <label for="nombre">Identificación</label>
                                    <input type="text" class="form-control" require name="id" id="id" placeholder="" value="<?php echo $id ?>">
                                    <br>
                                </div>        

                            
                                <div class="form-group col-md-12">
                                    <label for="nombre">Nombre(s)</label>
                                    <input type="text" class="form-control" require name="nombre" id="nombre" placeholder="" value="<?php echo $nombre ?>">
                                    <br>
                                </div>                               


                                <div class="form-group col-md-12">
                                    <label for="apellidoP">Primer Apellido </label>
                                    <input type="text" class="form-control" require name="apellidoP" id="apellidoP" placeholder="" value="<?php echo $apellidoP ?>">

                                </div>

                                <div class="form-group col-md-12">
                                    <label for="apellidoM">Segundo Apellido </label>
                                    <input type="text" class="form-control" require name="apellidoM" id="apellidoM" placeholder="" value="<?php echo $apellidoM ?>">

                                </div>

                                <div class="form-group col-md-12">
                                    <label for="correo">Correo</label>
                                    <input type="email" class="form-control" require name="correo" id="correo" placeholder="" value="<?php echo $correo ?>">
                                    <br>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="foto">foto</label>
                                    <!-- El atributo accept image .... solo acepta formatos de imagen -->
                                    <input type="file" class="form-control" require accept="image/*" name="foto" id="foto" placeholder="" value="<?php echo $foto ?>">
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
                Agregar Empleado
            </button>





        </form>
        <!-- Final del Formulario -->


        <div class="row">


            <table class="table table-hover table-bordered">

                <thead class="thead-dark">

                    <tr>
                        <th scope="col">Foto</th>
                        <th scope="col">Identificación</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Primer Apellido</th>
                        <th scope="col">Segundo Apellido</th>
                        <th scope="col">Correo</th>

                        <th scope="col">Seleccionar</th>
                        <th scope="col">Eliminar</th>
                    </tr>

                </thead>
                <tbody>

                    <?php
                    /* Prefunto que si la variable listaEmpleados tiene algun contenido */
                    if ($listaEmpleados->num_rows > 0) {

                        foreach ($listaEmpleados as $empleado) {

                    ?>

                            <tr>

                                <td>
                                    <img class="img-thumbnail" width="100px" src="../Imagenes/Empleados/<?php echo $empleado['foto']; ?>" />

                                </td>

                                <td> <?php echo $empleado['id']        ?> </td>
                                <td> <?php echo $empleado['nombre']    ?> </td>
                                <td> <?php echo $empleado['apellidoP'] ?> </td>
                                <td> <?php echo $empleado['apellidoM'] ?> </td>
                                <td> <?php echo $empleado['correo']    ?> </td>



                                <form action="" method="post">

                                    <input type="hidden" name="id" value="<?php echo $empleado['id'];  ?>">
                                    <input type="hidden" name="nombre" value="<?php echo $empleado['nombre'];  ?>">
                                    <input type="hidden" name="apellidoP" value="<?php echo $empleado['apellidoP'];  ?>">
                                    <input type="hidden" name="apellidoM" value="<?php echo $empleado['apellidoM'];  ?>">
                                    <input type="hidden" name="correo" value="<?php echo $empleado['correo'];  ?>">
                                    <input type="hidden" name="foto" value="<?php echo $empleado['foto'];  ?>">

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