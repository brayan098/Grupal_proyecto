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
    <title>administrador</title>
</head>
<body>
    
</body>
</html>