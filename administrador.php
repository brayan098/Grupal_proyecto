<?php
    session_start();

        if(!isset($_SESSION['rol'])){
            header('location: login.php');
        }else{
            if($_SESSION['rol'] != 1){
                header('location: login.php');
     }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="estilos/estilos.css">
</head>
<body>
    <header>
        <nav>
            <p>Tabla de Usuarios</p>
            <center>
    <div class="buscador">
        <input type="text" id="searchInput" placeholder="Buscar por nombres o apellidos" autofocus>
        </center>
        </nav>
        <br><br>
    </header>
    <section>
       
        <div class="contenedor">
            <div class="tabla">
                <table width="80%" align="center" border="1">
                    <tr>
                        <th>ID empleado</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Documento</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        
                     
                    </tr>
                    <?php
                    for ($i = 0; $i < sizeof($cls2); $i++) {
                    ?>
                    <tr>
                        <td><?php echo $cls2[$i]["id_empleado"];?></td>
                        <td><?php echo $cls2[$i]["documento_empleado"];?></td>
                        <td><?php echo $cls2[$i]["nombre_empleado"];?></td>
                        <td><?php echo $cls2[$i]["apellido_empleado"];?></td>
                        <td><?php echo $cls2[$i]["telefono_empleado"];?></td>
                        <td><?php echo $cls2[$i]["correo_empleado"];?></td>
                        <td>
                            <a href="editar_usuario.php?id=<?php echo $cls2[$i]["id_empleado"]; ?>" class="edit-button">Editar</a>
                        
                            <form action="borrar_usuario.php" method="POST" onsubmit="return confirm('¿Está seguro que quiere borrar este registro?');">
                                <input type="hidden" name="id" value="<?php echo $cls2[$i]["id_empleado"]; ?>">
                                <button type="submit" class="delete-button">Borrar</button>
                            </form>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
        <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById("searchInput");
            const tableRows = document.querySelectorAll("table tr:not(:first-child)");

            searchInput.addEventListener("input", function() {
                const searchTerm = searchInput.value.trim().toLowerCase();

                tableRows.forEach(row => {
                    const names = row.querySelector("td:nth-child(4)").textContent.toLowerCase();
                    const lastNames = row.querySelector("td:nth-child(5)").textContent.toLowerCase();
                    const shouldDisplay = names.includes(searchTerm) || lastNames.includes(searchTerm);

                    row.style.display = shouldDisplay ? "" : "none";
                });
            });
        });
    </script>
    </section>
    <footer>
        <a href="insertar_usuario.php" class="boton">Insertar usuarios</a>
    </footer>
</body>
</html>
