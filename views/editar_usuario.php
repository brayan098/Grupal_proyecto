<?php
session_start();

if (!isset($_SESSION['rol'])) {
    header('location: login.php');
} else {
    if ($_SESSION['rol'] != 1) {
        header('location: login.php');
    }
}

if (isset($_GET['id'])) {
    $id_empleado = $_GET['id'];

    $conexion = mysqli_connect("localhost", "root", "", "empleado_rol");

    if (!$conexion) {
        die("Error en la conexión: " . mysqli_connect_error());
    }

    $consulta = "SELECT * FROM empleado WHERE id_empleado = '$id_empleado'";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado->num_rows > 0) {
        $fila = mysqli_fetch_assoc($resultado);
        $nombre_empleado = $fila['nombre_empleado'];
        $apellido_empleado = $fila['apellido_empleado'];
        $documento_empleado = $fila['documento_empleado'];
        $correo_empleado = $fila['correo_empleado'];
        $telefono_empleado = $fila['telefono_empleado'];
    } else {
        echo "No se encontró el empleado con ID: $id_empleado";
        exit();
    }

    mysqli_close($conexion);
} else {
    echo "No se proporcionó un ID de empleado válido";
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css?ver=1.1">
    <title>Editar Usuario</title>
</head>

<body>
    <div class="container-in">
        <h1 class="titulo">Editar Usuario</h1>
        <form action="../includes/funciones.php" method="post" class="edit-form">
            <input type="hidden" name="accion" value="editar_registro">
            <input type="hidden" name="id_empleado" value="<?php echo $id_empleado; ?>">
            <div class="form-group">
                <label for="nombre_empleado" class="form-label">Nombre:</label>
                <input type="text" name="nombre_empleado" value="<?php echo $nombre_empleado; ?>" required autofocus class="form-input">
            </div>
            <div class="form-group">
                <label for="apellido_empleado" class="form-label">Apellido:</label>
                <input type="text" name="apellido_empleado" value="<?php echo $apellido_empleado; ?>" required class="form-input">
            </div>
            <div class="form-group">
                <label for="documento_empleado" class="form-label">Documento:</label>
                <input type="text" name="documento_empleado" value="<?php echo $documento_empleado; ?>" required class="form-input">
            </div>
            <div class="form-group">
                <label for="correo_empleado" class="form-label">Correo:</label>
                <input type="email" name="correo_empleado" value="<?php echo $correo_empleado; ?>" required class="form-input">
            </div>
            <div class="form-group">
                <label for="telefono_empleado" class="form-label">Teléfono:</label>
                <input type="tel" name="telefono_empleado" value="<?php echo $telefono_empleado; ?>" required class="form-input">
            </div>
            <div class="form-buttons">
                <input type="submit" value="Guardar cambios" class="btn btn-success">
                <a href="../administrador.php" class="btn btn-cancel">Cancelar</a>
            </div>
        </form>
    </div>
</body>

</html>
