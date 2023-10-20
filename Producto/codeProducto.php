<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas
$id_producto = (isset($_POST['id_producto'])) ? $_POST['id_producto'] : "";
$id_marca = (isset($_POST['id_marca'])) ? $_POST['id_marca'] : "";
$id_talla = (isset($_POST['id_talla'])) ? $_POST['id_talla'] : "";
$precio = (isset($_POST['precio'])) ? $_POST['precio'] : "";
$id_tipodeproducto = (isset($_POST['id_tipodeproducto'])) ? $_POST['id_tipodeproducto'] : "";
$id_proveedor = (isset($_POST['id_proveedor'])) ? $_POST['id_proveedor'] : "";



$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':

                /* la variable sentencia recolecta la informacion del formulario y 
                la envia a la base de datos.
                La variable conn nos brinda la conexion a la base de datos.
                ->prepare nos prepara la sentencia SQL para que inyecte los valores a la BD.
                */

                $insercionproducto = $conn->prepare(
                "INSERT INTO producto (id_producto,id_marca, id_talla, precio, id_tipodeproducto,id_proveedor) 
                VALUES ('$id_producto','$id_marca','$id_talla','$precio','$id_tipodeproducto','$id_proveedor')"
             );



        $insercionproducto->execute();
        $conn->close();

        header('location: index.php');



        break;

    case 'btnModificar':

        $editarproducto = $conn->prepare(" UPDATE producto SET id_marca = '$id_marca' , 
        id_talla = '$id_talla', precio = '$precio', id_tipodeproducto = '$id_tipodeproducto', id_proveedor = '$id_proveedor'
        WHERE id_producto = '$id_producto' ");



        $editarproducto->execute();
        
        $conn->close();

        header('location: index.php');

        break;

    case 'btnEliminar':
        

        $eliminarproducto = $conn->prepare(" DELETE FROM producto
        WHERE id_producto = '$id_producto' ");

        // $consultaFoto->execute();
        $eliminarproducto->execute();
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
$consultaproducto = $conn->prepare("SELECT * FROM producto");
$consultaproducto->execute();
$listaProducto = $consultaproducto->get_result();

$consultamarca = $conn->prepare("SELECT * FROM marca");
$consultamarca->execute();
$listaMarca = $consultamarca->get_result();

$consultatalla = $conn->prepare("SELECT * FROM talla");
$consultatalla->execute();
$listaTalla = $consultatalla->get_result();

$consultatipo_producto = $conn->prepare("SELECT * FROM tipo_producto");
$consultatipo_producto->execute();
$listaTipo_producto = $consultatipo_producto->get_result();

$consultaproveedor = $conn->prepare("SELECT * FROM proveedor");
$consultaproveedor->execute();
$listaProveedor = $consultaproveedor->get_result();

$conn->close();


?>