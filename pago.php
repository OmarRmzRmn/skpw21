<?php
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'templates/cabecera.php';

session_unset();
session_destroy();

$sql=$pdo->prepare("DELETE from compra;");
$sql->execute();

include 'templates/pie.php';
?>