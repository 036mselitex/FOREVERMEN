<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas
$txtId = (isset($_POST['txtId'])) ? $_POST['txtId'] : "";
$txtNombre = (isset($_POST['txtNombre'])) ? $_POST['txtNombre'] : "";
$txtApellidoP = (isset($_POST['txtApellidoP'])) ? $_POST['txtApellidoP'] : "";
$txtApellidoM = (isset($_POST['txtApellidoM'])) ? $_POST['txtApellidoM'] : "";
$txtCorreo = (isset($_POST['txtCorreo'])) ? $_POST['txtCorreo'] : "";

$foto = (isset($_FILES['foto']["name"])) ? $_FILES['foto']["name"] : "";

$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':



        $fecha = new DateTime();
        //Se crea el nombre de la imagen.... si no tenemos fotos por defecto toma imagen.jpg
        $nombreFoto = ($foto != "") ? $fecha->getTimestamp() . "_" . $_FILES["foto"]["name"] : "imagen.jpg";

        $nombreFoto = $foto;

        //nombre que devuelve PHP de la imagen
        $tmpFoto = $_FILES["foto"]["tmp_name"];

        if ($_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            // Continuar con el proceso de carga y almacenamiento de la imagen.


            if ($tmpFoto != "") {
                /* Movemos el archivo a la carpeta imagenes  */
                move_uploaded_file($tmpFoto, "../Imagenes/Empleados/" . $nombreFoto);


                /* la variable sentencia recolecta la informacion del formulario y 
                la envia a la base de datos.
                La variable conn nos brinda la conexion a la base de datos.
                ->prepare nos prepara la sentencia SQL para que inyecte los valores a la BD.
                */
                $insercionEmpleados = $conn->prepare(
                    "INSERT INTO empleados(nombre, apellidoP, 
                apellidoM, correo, foto) 
                VALUES ('$txtNombre','$txtApellidoP','$txtApellidoM','$txtCorreo','$foto')"
                );



                $insercionEmpleados->execute();
                $conn->close();
               
               echo" <script>
                    swal('Mensaje Principal!', 'Mensaje segundario!', 'success');
                    </script>";
                

                header('location: index.php');
            } else {
                echo "Problemas";
            }
        } else {
            // Manejar el error de carga de la imagen.
            echo "Error al cargar la imagen: " . $_FILES['foto']['error'];
        }




        break;

    case 'btnModificar':

        $editarEmpleados = $conn->prepare(" UPDATE empleados SET nombre = '$txtNombre' , 
        apellidoP = '$txtApellidoP', apellidoM = '$txtApellidoM', correo = '$txtCorreo'
        WHERE id = '$txtId' ");

        /* Aca solo esta actualizando la fotografia */
        $editarEmpleadosFoto = $conn->prepare(" UPDATE empleados SET  foto = '$foto'
        WHERE id = '$txtId' ");


        $fecha = new DateTime();
        //Se crea el nombre de la imagen.... si no tenemos fotos por defecto toma imagen.jpg
        $nombreFoto = ($foto != "") ? $fecha->getTimestamp() . "_" . $_FILES["foto"]["name"] : "imagen.jpg";

        $nombreFoto = $foto;

        //nombre que devuelve PHP de la imagen
        $tmpFoto = $_FILES["foto"]["tmp_name"];



        if ($tmpFoto != "") {
            /* Movemos el archivo a la carpeta imagenes  */
            move_uploaded_file($tmpFoto, "../Imagenes/Empleados/" . $nombreFoto);

            header('location: index.php');
        } else {
            echo "Problemas con la Foto";
        }

        $editarEmpleados->execute();
        $editarEmpleadosFoto->execute();
        $conn->close();

        header('location: index.php');

        break;

    case 'btnEliminar':
        /* 
        $consultaFoto = $conn->prepare(" SELECT foto FROM empleados
        WHERE id = '$txtId' "); */

        $eliminarEmpleado = $conn->prepare(" DELETE FROM empleados
        WHERE id = '$txtId' ");

        // $consultaFoto->execute();
        $eliminarEmpleado->execute();
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



/* Consultamos todos los empleados  */
$consultaEmpleados = $conn->prepare("SELECT * FROM empleados");
$consultaEmpleados->execute();
$listaEmpleados = $consultaEmpleados->get_result();
$conn->close();
