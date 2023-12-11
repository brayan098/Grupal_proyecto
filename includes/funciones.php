<?php
require_once("../conexionbd.php");

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        case 'editar_registro':
            editar_empleado();
            break;

        case 'eliminar_empleado':
            eliminar_empleado();
            break;
    }
}

function editar_empleado()
{
    require_once("../conexionbd.php");

    $conexion = mysqli_connect("localhost", "root", "", "empleado_rol");

    if (!$conexion) {
        die("Error en la conexión: " . mysqli_connect_error());
    }

    extract($_POST);

    $id_empleado = mysqli_real_escape_string($conexion, $id_empleado);
    $nombre_empleado = mysqli_real_escape_string($conexion, $nombre_empleado);
    $apellido_empleado = mysqli_real_escape_string($conexion, $apellido_empleado);
    $documento_empleado = mysqli_real_escape_string($conexion, $documento_empleado);
    $correo_empleado = mysqli_real_escape_string($conexion, $correo_empleado);
    $telefono_empleado = mysqli_real_escape_string($conexion, $telefono_empleado);

    $consulta = "UPDATE empleado SET nombre_empleado = '$nombre_empleado', apellido_empleado = '$apellido_empleado', documento_empleado = '$documento_empleado', 
        correo_empleado = '$correo_empleado', telefono_empleado = '$telefono_empleado' WHERE id_empleado = '$id_empleado'";

    if (mysqli_query($conexion, $consulta)) {
        header('Location: ../administrador.php');
    } else {
        echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
    }

    mysqli_close($conexion);
}

function eliminar_empleado()
{
    require_once("../conexionbd.php");

    $conexion = mysqli_connect("localhost", "root", "", "empleado_rol");

    if (!$conexion) {
        die("Error en la conexión: " . mysqli_connect_error());
    }

    extract($_POST);

    $id = mysqli_real_escape_string($conexion, $id);

    $consulta = "DELETE FROM empleado WHERE id_empleado = '$id'";

    if (mysqli_query($conexion, $consulta)) {
        header('Location: ../administrador.php');
    } else {
        echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
    }

    mysqli_close($conexion);
}
?>
