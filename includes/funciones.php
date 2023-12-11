<?php  
require_once ("../conexionbd.php");

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

function editar_empleado() {
    $conexion = mysqli_connect("localhost", "root", "", "empleado_rol");
    extract($_POST);
    $consulta = "UPDATE empleado SET nombre_empleado = '$nombre_empleado', apellido_empleado = '$apellido_empleado', documento_empleado = '$documento_empleado', 
        correo_empleado = '$correo_empleado', telefono_empleado = '$telefono_empleado' WHERE id_empleado = '$id_empleado'";

    mysqli_query($conexion, $consulta);

    header('Location: ../administrador.php');
    

}

function eliminar_empleado() {
    $conexion = mysqli_connect("localhost", "root", "", "empleado_rol");
    extract($_POST);
    $id = $_POST['id'];
    $consulta = "DELETE FROM empleado WHERE id_empleado = '$id'";

    mysqli_query($conexion, $consulta);

    header('Location: ../administrador.php');
}
?>
