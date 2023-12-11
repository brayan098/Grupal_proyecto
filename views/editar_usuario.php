<?php

$id = $_GET['id'];
$conexion = mysqli_connect("localhost", "root", "", "empleado_rol");
$consulta = "SELECT * FROM empleado WHERE id_empleado = $id";
$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
    <link rel="stylesheet" href="/css/estilos.css">
</head>

<body>


    <form action="../includes/funciones.php" method="POST">
            <div class="container">
                <br>
                <br>
                <h3 class="text-center">Editar usuario</h3>
                <div class="form-group">
                    <label for="nombre_empleado" class="form-label">Nombre </label>
                    <input type="text" id="nombre_empleado" name="nombre_empleado" class="form-control" value="<?php echo $usuario['nombre_empleado']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="apellido_empleado" class="form-label">Apellido </label>
                    <input type="text" id="apellido_empleado" name="apellido_empleado" class="form-control" value="<?php echo $usuario['apellido_empleado']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="documento_empleado" class="form-label">Documento </label>
                    <input type="text" id="documento_empleado" name="documento_empleado" class="form-control" value="<?php echo $usuario['documento_empleado']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="correo_empleado">Correo</label>
                    <input type="email" name="correo_empleado" id="correo_empleado" class="form-control" placeholder="" value="<?php echo $usuario['correo_empleado']; ?>">
                </div>
                <div class="form-group">
                    <label for="telefono_empleado" class="form-label">Telefono </label>
                    <input type="tel" id="telefono_empleado" name="telefono_empleado" class="form-control" value="<?php echo $usuario['telefono_empleado']; ?>" required>

                </div>
                
                <input type="hidden" name="accion" value="editar_empleado">

                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                </div>


                <br>

                <div class="mb-3">

                    <button type="submit" class="btn btn-success">Editar</button>
                    <a href="../administrador.php" class="btn btn-danger">Cancelar</a>

                </div>
            </div>
        </div>

    </form>
    </div>
    </div>
    
    </form>
</body>

</html>