<?php
session_start();

if (!isset($_SESSION['rol'])) {
    header('location: login.php');
} else {
    if ($_SESSION['rol'] != 1) {
        header('location: login.php');
    }
}
?>
<?php
require_once("../conexionbd.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conexion = mysqli_connect("localhost", "root", "", "empleado_rol");
    $id = mysqli_real_escape_string($conexion, $id);
    $consulta = "DELETE FROM empleado WHERE id_empleado = '$id'";
    if (mysqli_query($conexion, $consulta)) {
        header('Location: ../administrador.php');
    } else {
        echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
    }
    mysqli_close($conexion);
} else {
    echo "ID de usuario no proporcionado";
}
?>
