<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas
$id_talla = (isset($_POST['id_talla'])) ? $_POST['id_talla'] : "";
$nombre_talla = (isset($_POST['nombre_talla'])) ? $_POST['nombre_talla'] : "";




$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':

                /* la variable sentencia recolecta la informacion del formulario y 
                la envia a la base de datos.
                La variable conn nos brinda la conexion a la base de datos.
                ->prepare nos prepara la sentencia SQL para que inyecte los valores a la BD.
                */

                $inserciontalla = $conn->prepare(
                "INSERT INTO talla (id_talla, nombre_talla) 
                VALUES ('$id_talla','$nombre_talla')"
             );



        $inserciontalla->execute();
        $conn->close();

        header('location: index.php');



        break;

    case 'btnModificar':

        $editartalla = $conn->prepare(" UPDATE talla SET nombre_talla = '$nombre_talla' , 
        WHERE id_talla = '$id_talla' ");



        $editartalla->execute();
        
        $conn->close();

        header('location: index.php');

        break;

    case 'btnEliminar':
        

        $eliminartalla = $conn->prepare(" DELETE FROM talla
        WHERE id_talla = '$id_talla' ");

        // $consultaFoto->execute();
        $eliminartalla->execute();
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
$consultatalla = $conn->prepare("SELECT * FROM talla");
$consultatalla->execute();
$listaTalla = $consultatalla->get_result();
$conn->close();


?>