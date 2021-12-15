<?php
function connect(){
    $conn = null;
    $host = "localhost:3306"; 
    $db = "tienda";
    $user = "root"; 
    $pwd = ""; 

    try {
        $conn = new PDO('mysql:host='.$host.';dbname='.$db, $user, $pwd);
      }catch(PDOException $e){
        echo ' Conexion con la base de datos......fallida'.$e;
        exit;
      }
    return $conn;}
?>