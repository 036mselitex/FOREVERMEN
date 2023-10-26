<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas
$id_factura = (isset($_POST['id_factura'])) ? $_POST['id_factura'] : "";
$id_empleado = (isset($_POST['id_empleado'])) ? $_POST['id_empleado'] : "";
$id_cliente = (isset($_POST['id_cliente'])) ? $_POST['id_cliente'] : "";
$id_producto = (isset($_POST['id_producto'])) ? $_POST['id_producto'] : "";
$cantidad = (isset($_POST['cantidad'])) ? $_POST['cantidad'] : "";
$detalle = (isset($_POST['detalle'])) ? $_POST['detalle'] : "";




$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':

                /* la variable sentencia recolecta la informacion del formulario y 
                la envia a la base de datos.
                La variable conn nos brinda la conexion a la base de datos.
                ->prepare nos prepara la sentencia SQL para que inyecte los valores a la BD.
                */

                $insercionFacturas = $conn->prepare(
                "INSERT INTO factura ( id_empleado, id_cliente, id_producto, cantidad, detalle) 
                VALUES ('$id_empleado','$id_cliente','$id_producto','$cantidad','$detalle')"
             );



        $insercionFacturas->execute();
        $conn->close();

        header('location: index.php');



        break;


    case 'btnEliminar':
        

        $eliminarFacturas = $conn->prepare(" DELETE FROM factura
        WHERE id_factura = '$id_factura' ");

        // $consultaFoto->execute();
        $eliminarFacturas->execute();
        $conn->close();

        header('location: index.php');

        break;

    case 'btnCancelar':
        header('location: index.php');
        break;

    
}



/* Consultamos todas las Facturas  */
$consultaFacturas = $conn->prepare("SELECT * FROM factura
INNER JOIN empleados
on factura.id_empleado = empleados.id
INNER JOIN clientes
ON factura.id_cliente = clientes.id_cliente
INNER JOIN producto
on factura.id_producto = producto.id_producto
");
$consultaFacturas->execute();
$listaFacturas = $consultaFacturas->get_result();




/* Consultamos todos los Clientes  */
$consultaClientes = $conn->prepare("SELECT * FROM clientes");
$consultaClientes->execute();
$listaClientes = $consultaClientes->get_result();



/* Consultamos todos los Empleados  */
$consultaEmpleados = $conn->prepare("SELECT * FROM empleados");
$consultaEmpleados->execute();
$listaEmpleados = $consultaEmpleados->get_result();


$consultaproducto = $conn->prepare("SELECT * FROM producto");
$consultaproducto->execute();
$listaProducto = $consultaproducto->get_result();

//Al final de todas las consultas se cierra la conexion
$conn->close();

?>