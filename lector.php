<?php
session_start();

        if(!isset($_SESSION['rol'])){
            header('location: login.php');
        }else{
            if($_SESSION['rol'] != 2){
                header('location: login.php');
     }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lector</title>
</head>
<body>


<div class="container is-fluid">
    <br>
    <div class="col-xs-12">
        <h1>Lista de usuarios</h1>
        <br>
        
        <br>

        <br>

        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Documento</th>
                    <th>Correo</th>
                    <th>Telefono</th>
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
        </table>
    </div>
</div>
</body>

</html>
