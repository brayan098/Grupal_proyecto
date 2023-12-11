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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilos.css">
    <title>Administrador</title>
    <script>
        function confirmarEliminar(id) {
            var respuesta = confirm("¿Estás seguro de que deseas eliminar este usuario?");
            if (respuesta) {
                window.location.href = "./views/eliminar_usuario.php?id=" + id;
            }
        }
    </script>
</head>

<body>

    <div class="container">
        <br>

        <div class="col">
            <h1>Lista de usuarios</h1>
            <table class="tabla">
                <thead>
                    <div class="buscador">
                        <input type="text" id="searchInput" placeholder="Buscar por nombres o apellidos" autofocus>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Documento</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th>Acciones</th>

                        </tr>
                </thead>

                <tbody>
                    <?php
                    $conexion = mysqli_connect("localhost", "root", "", "empleado_rol");
                    $SQL = "SELECT * FROM empleado ";
                    $dato = mysqli_query($conexion, $SQL);

                    if ($dato->num_rows > 0) {
                        while ($fila = mysqli_fetch_array($dato)) {
                    ?>
                            <tr>
                                <td><?php echo $fila['nombre_empleado']; ?></td>
                                <td><?php echo $fila['apellido_empleado']; ?></td>
                                <td><?php echo $fila['documento_empleado']; ?></td>
                                <td><?php echo $fila['correo_empleado']; ?></td>
                                <td><?php echo $fila['telefono_empleado']; ?></td>
                                <td>
                                    <a class="boton-editar" href="./views/editar_usuario.php?id=<?php echo $fila['id_empleado'] ?>">Editar</a>
                                    <a class="boton-eliminar" href="javascript:void(0);" onclick="confirmarEliminar(<?php echo $fila['id_empleado']; ?>)">Eliminar</a>

                                </td>

                            </tr>

                        <?php
                        }
                    } else {
                        ?>
                        <tr class="text-center">
                            <td colspan="6">No existen registros</td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        const searchInput = document.getElementById("searchInput");
                        const tableRows = document.querySelectorAll("table tbody tr");

                        searchInput.addEventListener("input", function() {
                            const searchTerm = searchInput.value.trim().toLowerCase();

                            tableRows.forEach(row => {
                                const columns = row.querySelectorAll("td");
                                let shouldDisplay = false;

                                columns.forEach(column => {
                                    const cellText = column.textContent.toLowerCase();
                                    if (cellText.includes(searchTerm)) {
                                        shouldDisplay = true;
                                    }
                                });

                                row.style.display = shouldDisplay ? "" : "none";
                            });
                        });
                    });
                </script>
 
            </table>
        </div>
        <div>
            <a class="boton-insertar" href="insertar_usuario.php">Nuevo usuario</a>
            <a href="cerrar_sesion.php" class="boton-cerrar-sesion">Cerrar Sesión</a>
        </div>
    </div>
    </div>
</body>

</html>