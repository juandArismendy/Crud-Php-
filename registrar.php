<?php include 'templates/header.php' ?>
<?php include 'templates/footer.php' ?>


<?php

if(empty($_POST['oculto'])  || empty($_POST['txtNombre']) || empty($_POST['txtEdad']) || empty($_POST['txtSigno'])){
    header('Location: index.php?mensaje=falta');
    exit();
}

include_once 'models/conexion.php';
$nombre = $_post['txtNombre'];
$edad = $_post['txtEdad'];
$signo = $_post['txtSigno'];

$sentencia = $bd->prepare("INSERT INTO persona (nombre,edad,signo) VALUES (?,?,?);");
$resultado = $sentencia->execute([$nombre, $edad,$signo]);

if ($resultado === true) {
    header("Location: index.php?mensaje=registrado");
} else {
    header("Location: index.php?mensaje=error");
    exit();
}


?>