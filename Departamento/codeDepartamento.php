<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas
$id_departamento = (isset($_POST['id_departamento'])) ? $_POST['id_departamento'] : "";
$nombre_departamento = (isset($_POST['nombre_departamento'])) ? $_POST['nombre_departamento'] : "";



$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':

                /* la variable sentencia recolecta la informacion del formulario y 
                la envia a la base de datos.
                La variable conn nos brinda la conexion a la base de datos.
                ->prepare nos prepara la sentencia SQL para que inyecte los valores a la BD.
                */

                $inserciondepartamento = $conn->prepare(
                "INSERT INTO departamento (id_departamento, nombre_departamento) 
                VALUES ('$id_departamento','$nombre_departamento')"
             );



        $inserciondepartamento->execute();
        $conn->close();

        header('location: index.php');



        break;

    case 'btnModificar':

        $editardepartamento = $conn->prepare(" UPDATE departamento SET nombre_departamento = '$nombre_departamento' 
        WHERE id_departamento = '$id_departamento' ");



        $editardepartamento->execute();
        
        $conn->close();

        header('location: index.php');

        break;

    case 'btnEliminar':
        

        $eliminardepartamento = $conn->prepare(" DELETE FROM departamento
        WHERE id_departamento = '$id_departamento' ");

        // $consultaFoto->execute();
        $eliminardepartamento->execute();
        $conn->close();

        header('location: index.php');

        break;

    case 'btnCancelar':
        header('location: index.php');
        break;

    default:
        # code...
        break;
}



/* Consultamos todos los Clientes  */
$consultadepartamento = $conn->prepare("SELECT * FROM departamento");
$consultadepartamento->execute();
$listaDepartamento = $consultadepartamento->get_result();
$conn->close();


?>