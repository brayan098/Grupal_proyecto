
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuarios</title>
    <link rel="stylesheet" href="/css/estilos.css">
</head>
<body>
    
    
    <p>¿Desea confirmar la eliminacion del registro?</p>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <form action="../includes/funciones.php" method="POST">
                <input type="hidden" name="accion" value="eliminar_empleado">
                <input type="hidden" name="id" value="<?php echo $_GET['id_empleado']; ?>">
                <input type="submit" name="" value="Eliminar" class= " btn btn-danger">
                <a href="../administrador.php" class="btn btn-success">Cancelar</a>

                               
        </div>
    </div>



</body>
</html>