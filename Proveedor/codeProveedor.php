<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas
$id_proveedor = (isset($_POST['id_proveedor'])) ? $_POST['id_proveedor'] : "";
$nombre_proveedor = (isset($_POST['nombre_proveedor'])) ? $_POST['nombre_proveedor'] : "";
$id_departamento = (isset($_POST['id_departamento'])) ? $_POST['id_departamento'] : "";




$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':

                /* la variable sentencia recolecta la informacion del formulario y 
                la envia a la base de datos.
                La variable conn nos brinda la conexion a la base de datos.
                ->prepare nos prepara la sentencia SQL para que inyecte los valores a la BD.
                */

                $insercionproveedor = $conn->prepare(
                "INSERT INTO proveedor (id_proveedor, nombre_proveedor, id_departamento) 
                VALUES ('$id_proveedor','$nombre_proveedor','$id_departamento')"
             );



        $insercionproveedor->execute();
        $conn->close();

        header('location: index.php');



        break;

    case 'btnModificar':

        $editarproveedor = $conn->prepare(" UPDATE proveedor SET nombre_proveedor = '$nombre_proveedor' , 
        id_departamento = '$id_departamento'
        WHERE id_proveedor = '$id_proveedor' ");



        $editarproveedor->execute();
        
        $conn->close();

        header('location: index.php');

        break;

    case 'btnEliminar':
        

        $eliminarproveedor = $conn->prepare(" DELETE FROM proveedor
        WHERE id_proveedor = '$id_proveedor' ");

        // $consultaFoto->execute();
        $eliminarproveedor->execute();
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
$consultaproveedor = $conn->prepare("SELECT * FROM proveedor");
$consultaproveedor->execute();
$listaProveedor = $consultaproveedor->get_result();



$consultadepartamento = $conn->prepare("SELECT * FROM departamento");
$consultadepartamento->execute();
$listaDepartamento = $consultadepartamento->get_result();

$conn->close();
?>