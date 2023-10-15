<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas
$id_cliente = (isset($_POST['id_cliente'])) ? $_POST['id_cliente'] : "";
$nombre_cliente = (isset($_POST['nombre_cliente'])) ? $_POST['nombre_cliente'] : "";
$apellido_cliente = (isset($_POST['apellido_cliente'])) ? $_POST['apellido_cliente'] : "";
$telefono_cliente = (isset($_POST['telefono_cliente'])) ? $_POST['telefono_cliente'] : "";
$direccion_cliente = (isset($_POST['direccion_cliente'])) ? $_POST['direccion_cliente'] : "";



$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':

                /* la variable sentencia recolecta la informacion del formulario y 
                la envia a la base de datos.
                La variable conn nos brinda la conexion a la base de datos.
                ->prepare nos prepara la sentencia SQL para que inyecte los valores a la BD.
                */

                $insercionClientes = $conn->prepare(
                "INSERT INTO clientes (id_cliente, nombre_cliente, apellido_cliente, telefono_cliente,direccion_cliente) 
                VALUES ('$id_cliente','$nombre_cliente','$apellido_cliente','$telefono_cliente','$direccion_cliente')"
             );



        $insercionClientes->execute();
        $conn->close();

        header('location: index.php');



        break;

    case 'btnModificar':

        $editarClientes = $conn->prepare(" UPDATE clientes SET nombre_cliente = '$nombre_cliente' , 
        apellido_cliente = '$apellido_cliente', telefono_cliente = '$telefono_cliente', direccion_cliente = '$direccion_cliente'
        WHERE id_cliente = '$id_cliente' ");



        $editarClientes->execute();
        
        $conn->close();

        header('location: index.php');

        break;

    case 'btnEliminar':
        

        $eliminarCliente = $conn->prepare(" DELETE FROM clientes
        WHERE id_cliente = '$id_cliente' ");

        // $consultaFoto->execute();
        $eliminarCliente->execute();
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
$consultaClientes = $conn->prepare("SELECT * FROM clientes");
$consultaClientes->execute();
$listaClientes = $consultaClientes->get_result();
$conn->close();


?>