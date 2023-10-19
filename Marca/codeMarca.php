<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas
$id_marca = (isset($_POST['id_marca'])) ? $_POST['id_marca'] : "";
$nombre_marca = (isset($_POST['nombre_marca'])) ? $_POST['nombre_marca'] : "";



$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':

                /* la variable sentencia recolecta la informacion del formulario y 
                la envia a la base de datos.
                La variable conn nos brinda la conexion a la base de datos.
                ->prepare nos prepara la sentencia SQL para que inyecte los valores a la BD.
                */

                $insercionmarca = $conn->prepare(
                "INSERT INTO marca (id_marca, nombre_marca) 
                VALUES ('$id_marca','$nombre_marca')"
             );



        $insercionmarca->execute();
        $conn->close();

        header('location: index.php');



        break;

    case 'btnModificar':

        $editarmarca = $conn->prepare(" UPDATE marca SET nombre_marca = '$nombre_marca' 
        WHERE id_marca = '$id_marca' ");



        $editarmarca->execute();
        
        $conn->close();

        header('location: index.php');

        break;

    case 'btnEliminar':
        

        $eliminarmarca = $conn->prepare(" DELETE FROM marca
        WHERE id_marca = '$id_marca' ");

        // $consultaFoto->execute();
        $eliminarmarca->execute();
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
$consultamarca = $conn->prepare("SELECT * FROM marca");
$consultamarca->execute();
$listaMarca = $consultamarca->get_result();
$conn->close();


?>