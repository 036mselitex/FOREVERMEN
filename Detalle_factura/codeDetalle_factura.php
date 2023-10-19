<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas
$id_detalle = (isset($_POST['id_detalle'])) ? $_POST['id_detalle'] : "";
$id_factura = (isset($_POST['id_factura'])) ? $_POST['id_factura'] : "";
$id_producto = (isset($_POST['id_producto'])) ? $_POST['id_producto'] : "";
$cantidad = (isset($_POST['cantidad'])) ? $_POST['cantidad'] : "";




$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':

                /* la variable sentencia recolecta la informacion del formulario y 
                la envia a la base de datos.
                La variable conn nos brinda la conexion a la base de datos.
                ->prepare nos prepara la sentencia SQL para que inyecte los valores a la BD.
                */

                $inserciondetalle_factura = $conn->prepare(
                "INSERT INTO detalle_factura (id_detalle, id_factura, id_producto, cantidad) 
                VALUES ('$id_detalle','$id_factura','$id_producto','$cantidad')"
             );



        $inserciondetalle_factura->execute();
        $conn->close();

        header('location: index.php');



        break;

    case 'btnModificar':

        $editardetalle_factura = $conn->prepare(" UPDATE detalle_factura SET id_factura = '$id_factura'
        id_producto = '$id_producto', cantidad = '$cantidad',
        WHERE id_cliente = '$id_cliente' ");



        $editardetalle_factura->execute();
        
        $conn->close();

        header('location: index.php');

        break;

    case 'btnEliminar':
        

        $eliminardetalle_factura = $conn->prepare(" DELETE FROM detalle_factura
        WHERE id_detalle = '$id_detalle' ");

        // $consultaFoto->execute();
        $eliminardetalle_factura->execute();
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
$consultadetalle_fatura = $conn->prepare("SELECT * FROM detalle_factura");
$consultadetalle_fatura->execute();
$listaDetalle_factura = $consultadetalle_fatura->get_result();

$consultaFacturas = $conn->prepare("SELECT * FROM factura");
$consultaFacturas->execute();
$listaFacturas = $consultaFacturas->get_result();

$consultaproducto = $conn->prepare("SELECT * FROM producto");
$consultaproducto->execute();
$listaProducto = $consultaproducto->get_result();

$conn->close();


?>