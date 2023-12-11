<?php
$conexion= mysqli_connect("localhost", "root", "", "empleado_rol");

if(isset($_POST['registrar'])){

    if(strlen($_POST['nombre_empleado']) >=1 && strlen($_POST['apellido_empleado'])  >=1 
    && strlen($_POST['documento_empleado'])  >=1 && strlen($_POST['correo_empleado'])  >=1 
    && strlen($_POST['telefono_empleado'])  >=1 ){

    $nombre = trim($_POST['nombre_empleado']);
    $apellido = trim($_POST['apellido_empleado']);
    $documento = trim($_POST['documento_empleado']);
    $correo = trim($_POST['correo_empleado']);
    $telefono = trim($_POST['telefono_empleado']);
    

    $consulta= "INSERT INTO empleado (nombre_empleado, apellido_empleado, documento_empleado, correo_empleado, telefono_empleado)
    VALUES ('$nombre', '$apellido','$documento', '$correo', '$telefono')";

    mysqli_query($conexion, $consulta);
    mysqli_close($conexion);

    header('Location: ../administrador.php');
  }
}









?>