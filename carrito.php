<?php
 require 'archivos/conexion.php';
 require 'global/conexion_2.php';
 session_start();

 $mensaje="";

 if(isset($_POST['btnAccion'])){
    switch($_POST['btnAccion']){

      case 'Agregar':

            if(is_numeric (openssl_decrypt($_POST['id'],COD,KEY))){
                $ID=openssl_decrypt($_POST['id'],COD,KEY);
                $mensaje.="ID Recibido".$ID."<br/>";
            }else{$mensaje.='ID Fallido'.$ID."<br/>";}//mensaje del ID

            if (is_string(openssl_decrypt($_POST['nombre'],COD,KEY))){
                 $NOMBRE=openssl_decrypt ($_POST['nombre'],COD,KEY);
                 $mensaje.="Nombre Recibido".$NOMBRE."<br/>"; 
            }else{ $mensaje.="Nombre Fallido"."<br/>"; break;}//mensaje del NOMBRE 
                
                
            if (is_numeric(openssl_decrypt($_POST['cantidad'],COD,KEY))){ 
                $CANTIDAD=openssl_decrypt($_POST['cantidad'],COD,KEY); 
                $mensaje.="Cantidad Recibida".$CANTIDAD."<br/>"; 
            }else{ $mensaje.="Cantidad Fallida"."<br/>"; break;}//mensaje de la CANTIDAD 
    
                
            if (is_numeric(openssl_decrypt($_POST['precio'],COD,KEY))){ 
                $PRECIO=openssl_decrypt($_POST['precio'],COD,KEY); 
                $mensaje.="Precio Recibido".$PRECIO."<br/>"; 
            }else{ $mensaje.="Precio Fallido"."<br/>"; break;}//mensaje del PRECIO
//esto se hace por cada columna de la tabla del carrito------------------------------------------------------------------------------

                
            if(!isset($_SESSION['CARRITO'])){
                $producto=array('ID'=>$ID,'NOMBRE'=>$NOMBRE,'CANTIDAD'=>$CANTIDAD,'PRECIO'=>$PRECIO);
                $_SESSION['CARRITO'][0]=$producto;
                $sql=$pdo->prepare("INSERT INTO compra (id,nombre,precio,cantidad) VALUES ('$ID','$NOMBRE','$PRECIO','$CANTIDAD');");
                $sql->execute();
                echo "<script>alert('Bebida Agregada')</script>";//script de alerta
                //Finaliza la parte de agregar al codigo

            } else{
                 $idProductos=array_column($_SESSION['CARRITO'],"ID");
                 if(in_array($ID, $idProductos)){
                    $producto=array('ID'=>$ID,'NOMBRE'=>$NOMBRE,'CANTIDAD'=>$CANTIDAD,'PRECIO'=>$PRECIO);
                    $_SESSION['CARRITO'][$ID]=$producto;
                    $sql=$pdo->prepare("UPDATE compra SET cantidad='$CANTIDAD' WHERE id='$ID';");
                    $sql->execute();
                    echo "<script>alert('La bebida que solicito ya fue agregada')</script>";
                }
                //sirve para cuando el producto ya esta en el carrito

                else{
                  $NumeroProductos=count($_SESSION['CARRITO']);
                  $producto=array('ID'=>$ID,'NOMBRE'=>$NOMBRE,'CANTIDAD'=>$CANTIDAD,'PRECIO'=>$PRECIO);
                  $_SESSION['CARRITO'][$NumeroProductos]=$producto;
                  $sql=$pdo->prepare("INSERT INTO compra (id,nombre,precio,cantidad) VALUES ('$ID','$NOMBRE','$PRECIO','$CANTIDAD');");
                  $sql->execute();
                  echo "<script>alert('Bebida agregada')</script>";
                }
            }

               
            break;

            case "Eliminar":
                $servidor="mysql:dbname=".BD.";host=".SERVIDOR;
                try{
                    $pdo= new PDO($servidor,USUARIO,PASSWORD,
                    array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8") );
                    

                }catch(PDOException $e){
                  
                }


                if(is_numeric (openssl_decrypt($_POST['id'],COD,KEY))){
                    $ID=openssl_decrypt($_POST['id'],COD,KEY);

                   foreach($_SESSION['CARRITO'] as $indice=>$producto){
                       if($producto['ID']==$ID){
                           unset($_SESSION['CARRITO'][$indice]);
                           echo "<script>alert('Compra eliminada');</script>";
                       }
                   }

                   $elim=$pdo->prepare("DELETE FROM `compra` WHERE `ID` = '$ID'");//elimina el producto de la tabla de las compras
                   $elim->execute();

                }else{      
                    $mensaje.='ID Erroneo'.$ID."<br/>";
                }
                break;

                case "PagarCompra":

                    $conexion=conectar();
                    $numero_producto=array();

                foreach ($_SESSION['CARRITO'] as $indice => $objetoid) {
                    array_push($numero_producto, $objetoid['ID']);}

                for ($i=0; $i < count($numero_producto); $i++){ 
                    $update="UPDATE tblproductos SET EXISTENCIA = EXISTENCIA - (SELECT CANTIDAD FROM compra WHERE ID = '$numero_producto[$i]') WHERE ID = '$numero_producto[$i]';";
                    $queryup=mysqli_query($conexion,$update);
                }
            break;  

        }
    }


?>