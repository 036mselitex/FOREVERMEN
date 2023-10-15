<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas
$id_tipodeproducto = (isset($_POST['id_tipodeproducto'])) ? $_POST['id_tipodeproducto'] : "";
$nombre_tipodeproducto = (isset($_POST['nombre_tipodeproducto'])) ? $_POST['nombre_tipodeproducto'] : "";




$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':

                /* la variable sentencia recolecta la informacion del formulario y 
                la envia a la base de datos.
                La variable conn nos brinda la conexion a la base de datos.
                ->prepare nos prepara la sentencia SQL para que inyecte los valores a la BD.
                */

                $inserciontipo_producto = $conn->prepare(
                "INSERT INTO tipo_producto (id_tipodeproducto, nombre_tipodeproducto) 
                VALUES ('$id_tipodeproducto','$nombre_tipodeproducto')"
             );



        $inserciontipo_producto->execute();
        $conn->close();

        header('location: index.php');



        break;

    case 'btnModificar':

        $editartipo_producto = $conn->prepare(" UPDATE tipo_producto SET nombre_tipodeproducto = '$nombre_tipodeproducto' , 
        WHERE id_tipodeproducto = '$id_tipodeproducto' ");



        $editartipo_producto->execute();
        
        $conn->close();

        header('location: index.php');

        break;

    case 'btnEliminar':
        

        $eliminartipo_producto = $conn->prepare(" DELETE FROM tipo_producto
        WHERE id_tipodeproducto= '$id_tipodeproducto' ");

        // $consultaFoto->execute();
        $eliminartipo_producto->execute();
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
$consultatipo_producto = $conn->prepare("SELECT * FROM tipo_producto");
$consultatipo_producto->execute();
$listaTipo_producto = $consultatipo_producto->get_result();
$conn->close();


?>