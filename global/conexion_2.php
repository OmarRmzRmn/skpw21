<?php
    $host="localhost";
    $bd="tienda";
    $usuario="root";
    $contra="";

    try{
        $conexion=new PDO("mysql:host=$host;dbname=$bd",$usuario,$contra);
    if($conexion){}
    } catch(Exception $ex){
        echo $ex->getMessage();
    }