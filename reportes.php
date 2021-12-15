<?php 
    ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Study Drink</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body >
<?php
include 'global/conexion_2.php';

$sentenciaSQL = $conexion->prepare("SELECT * FROM compra");
$sentenciaSQL->execute();
$compra=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

include 'carrito.php';
include 'global/config.php';
include 'global/conexion.php';
?>
        <center>
<h1>RECIBO DE COMPRA<h1> 
        
<table class="table table-light table-bordered "  >
        <tbody>
            <tr>
                <th width=30%>PRODUCTO</th>
                <th width=30% class="text-center">CANTIDAD</th>
                <th width=30% class="text-center">PRECIO</th> 
            </tr>
            <?php foreach($_SESSION['CARRITO'] as $indice=>$producto){?>
            <tr>
                <td width=30%><?php echo $producto['NOMBRE']?></th>
                <td width=30% class="text-center"><?php echo $producto['CANTIDAD']?></th>
                <td width=30% class="text-center"><?php echo $producto['PRECIO']?></th>
                </form> 
            </tr>
            <?php } ?>
            <tr>
    </table>
    <footer>-------------Study Drink--derechos reservados 2021--Mauro Alejandro Rangel & Omar Ramirez-------------  </footer>
            </center>    
</body>

</html>

<?php 
    $html=ob_get_clean();
    

    require_once 'libreria/dompdf/autoload.inc.php';
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();


    $dompdf->loadHtml($html);
    $dompdf->setPaper('letter');

    $dompdf->render();
    $dompdf->stream("recibo.pdf", array("Attachment"=>false));
?>