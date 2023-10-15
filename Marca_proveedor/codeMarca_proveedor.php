<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas
$id_marca_proveedor = (isset($_POST['id_marca_proveedor'])) ? $_POST['id_marca_proveedor'] : "";
$id_marca = (isset($_POST['id_marca'])) ? $_POST['id_marca'] : "";
$id_talla = (isset($_POST['id_talla'])) ? $_POST['id_talla'] : "";




$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':

                /* la variable sentencia recolecta la informacion del formulario y 
                la envia a la base de datos.
                La variable conn nos brinda la conexion a la base de datos.
                ->prepare nos prepara la sentencia SQL para que inyecte los valores a la BD.
                */

                $insercionmarca_proveedor = $conn->prepare(
                "INSERT INTO marca_proveedor (id_marca_proveedor, id_marca, id_talla) 
                VALUES ('$id_marca_proveedor','$id_marca_proveedor','$id_marca_proveedor')"
             );



        $insercionmarca_proveedor->execute();
        $conn->close();

        header('location: index.php');



        break;

    case 'btnModificar':

        $editarmarca_proveedor = $conn->prepare(" UPDATE marca_proveedor SET id_marca = '$id_marca' , 
        id_talla = '$id_talla',
        WHERE id_marca_proveedor = '$id_marca_proveedor' ");



        $editarmarca_proveedor->execute();
        
        $conn->close();

        header('location: index.php');

        break;

    case 'btnEliminar':
        

        $eliminarmarca_proveedor = $conn->prepare(" DELETE FROM marca_proveedor
        WHERE id_marca_proveedor = '$id_marca_proveedor' ");

        // $consultaFoto->execute();
        $eliminarmarca_proveedor->execute();
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
$consultamarca_proveedor = $conn->prepare("SELECT * FROM marca_proveedor");
$consultamarca_proveedor->execute();
$listaMarca_proveedor = $consultamarca_proveedor->get_result();

$consultamarca = $conn->prepare("SELECT * FROM marca");
$consultamarca->execute();
$listaMarca = $consultamarca->get_result();

$consultaTalla = $conn->prepare("SELECT * FROM talla");
$consultaTalla->execute();
$listaTalla = $consultaTalla->get_result();

$conn->close();


?>