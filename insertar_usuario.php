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


    <form action="/includes/validar.php" method="POST">
        <div class="container">
            <br>
            <br>
            <h3 class="text-center">Registro de nuevo usuario</h3>
            <div class="form-group">
                <label for="nombre_empleado" class="form-label">Nombre</label>
                <input type="text" id="nombre_empleado" name="nombre_empleado" class="form-control" required autofocus> 
            </div>
            <div class="form-group">
                <label for="apellido_empleado">Apellido</label><br>
                <input type="text" name="apellido_empleado" id="apellido_empleado" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="documento_empleado">Documento</label><br>
                <input type="text" name="documento_empleado" id="documento_empleado" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="correo_empleado">Correo</label><br>
                <input type="email" name="correo_empleado" id="correo_empleado" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="telefono_empleado" class="form-label">Telefono</label>
                <input type="text" id="telefono_empleado" name="telefono_empleado" class="form-control" required>

            <input type="hidden" name="accion" value="editar_empleado">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        </div>


        <br>

        <div class="mb-3">

            <input type="submit" value="Guardar" class="btn btn-success" name="registrar">
            <a href="administrador.php" class="btn btn-danger">Cancelar</a>

        </div>
        </div>
        </div>

    </form>
    </div>
    </div>

    </form>
</body>

</html>